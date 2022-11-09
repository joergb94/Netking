<?php
namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\GeneralRepository;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UserIdRequest;
use App\Http\Requests\User\UserPassRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\User\UserStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
   /**
    * A constructor function. It is called when the class is instantiated.
    * 
    * @param UserRepository UserRepository This is the repository class that will be used to retrieve
    * the data.
    * @param GeneralRepository GeneralRepository This is the repository that will be used to get the
    * data from the database.
    */
    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
        $this->menu_id =2;
        $this->module_name ='User';
        $this->text_module = ['Created','Updated','Update Password','Deleted','Restored','Actived','Deactived'];
    }

    /**
     * It returns a view with a table of users, and a list of user types.
     * 
     * @param UserRequest request The request object.
     * @param location is the id of the location
     * 
     * @return The view is being returned.
     */
    public function index(UserRequest $request){

        
            $search = trim($request->search);
            $criterion = trim($request->criterion);
            $status = ($request->status)? $request->status : 1;
            $data = $this->UserRepository->getSearchPaginated($criterion, $search,$status);
            
            if ($request->ajax()) { 
                return view('Users.items.table',['data'=>$data,'dm' => accesUrl(Auth::user(), $this->menu_id)]);
            }
                return view('Users.index',['data'=>$data,'dm' => accesUrl(Auth::user(), $this->menu_id)]);
    }

   
   /**
    * The function is called when the user clicks on the button "Add User" in the view "Users.index"
    * and it returns the view "Users.create" with the data of the table "Type_user" and "Location"
    * 
    * @param UserRequest request The request object.
    * @param location The location of the user
    */
    public function create(UserRequest $request)
    {   
        if ($request->ajax()) {
            return view('Users.create');
        }
    }

   /**
    * It creates a new user and returns a json response.
    * </code>
    * 
    * @param UserStoreRequest request The request object.
    * @param location the location of the user
    */
    public function store(UserStoreRequest $request){
        $data = $this->UserRepository->create($request->input());

        return response()->json(Answer( $data['id'],
                                        $this->module_name,
                                        $this->text_module[0],
                                        "success",
                                        'green',
                                        '1'));
    }

    
   /**
    * It's a function that returns a view with a variable called data that contains the data of the
    * user with the id that was passed to the function
    * 
    * @param Request request The request object.
    * @param location the location of the view file
    * @param id The id of the user you want to retrieve.
    * 
    * @return The view is being returned.
    */
    public function detail(Request $request,$id)
    {   
        if ($request->ajax()) {
            $data = User::withTrashed()->find($id);
            return view('Users.detail',['data'=>$data]);
        }
    }

   
   /**
    * It takes the id of the user and the location id and returns the view with the data of the user
    * and the locations.
    * </code>
    * 
    * @param Request request The request object.
    * @param location the location of the user
    * @param id The id of the user you want to edit
    * 
    * @return The view is being returned.
    */
    public function edit(Request $request,$id)
    {   
        if ($request->ajax()) { 
            $data = User::find($id);
            return view('Users.update',['data'=>$data]);
        }
    }

   
   /**
    * It updates a user in the database
    * 
    * @param UserUpdateRequest request The request object.
    * @param location The location of the user
    * @param id The id of the user you want to update
    */
    public function update(UserUpdateRequest $request,$id){ 

        $data = $this->UserRepository->update($id, $request->only(
            'name',
            'occupation',
            'phone',
            'email',
            'street',
        ));
        return response()->json(Answer( $data['id'],
                                        $this->module_name,
                                        $this->text_module[1],
                                        "success",
                                        'yellow',
                                        '1'));
    }

   /**
    * It returns a view with the data from the database
    * 
    * @param Request request The request object.
    * @param location The location of the view file.
    * @param id The id of the user you want to edit
    * 
    * @return The view is being returned.
    */
    public function editPassword(Request $request,$id)
    {   
        if ($request->ajax()) {
           
            $data = User::where('id',$id)->first();
         
            return view('Users.password',['data'=>$data]);
        }
    }

   /**
    * It updates the password of a user.
    * 
    * @param UserPassRequest request The request object.
    * @param location the location of the user (admin, client, etc)
    * @param id The id of the user you want to update
    */
    public function updatePassword(UserPassRequest $request,$id){ 

        $data = $this->UserRepository->updatePass($id, $request->only(
                    'password',
                ));

        return response()->json(Answer( $data['id'],
                                        $this->module_name,
                                        $this->text_module[2],
                                        "success",
                                        'yellow',
                                        '1'));
    }

    /**
     * It takes a request, a location, and an id, and returns a json response
     * 
     * @param UserIdRequest request The request object.
     * @param location The location of the resource.
     * @param id The id of the user you want to change the status of.
     */
    public function change_status(UserIdRequest $request,$id)
    {
        return response()->json($this->UserRepository->updateStatus($request->id));
    } 

   /**
    * It deletes or restores a user from the database
    * 
    * @param Request request The request object.
    * @param location the location of the module in the system
    * @param id the id of the record
    */
    public function deleteOrResotore(Request $request,$id)
    {    
        $state = $this->UserRepository->deleteOrResotore($id);
        return response()->json(Answer( $id,
                                        $this->module_name,
                                        $this->text_module[$state],
                                        "success",
                                        $state==4?'green':'red',
                                        $state==4?'1':'D'));
    }

    /**
     * It returns the user object of the currently logged in user
     * 
     * @param Request request The request object.
     * 
     * @return The user object.
     */
    public function get_User(Request $request){
        return response()->json(Auth::user());
    }
}