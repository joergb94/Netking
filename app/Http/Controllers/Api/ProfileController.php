<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Profile\UpdateProfileRequest;
use App\Models\User;
use App\Models\Card;
use App\Models\Membership;
use App\Models\Friends;
use App\Models\Type_membership;
use App\Repositories\ProfileRepository;
use App\Repositories\GeneralRepository;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct(ProfileRepository $ProfileRepository, GeneralRepository $generalRepository)
    {
        $this->ProfileRepository = $ProfileRepository;
        $this->generalRepository =$generalRepository;
        $this->menu_id = 4;
        $this->module_name = 'Profile';
        $this->text_module = ['Created', 'Updated', 'Deleted', 'Restored', 'Actived', 'Deactived'];
    }

    public function index(Request $request)
    {
        $data = $this->ProfileRepository->getSearchPaginated(Auth::user()->id);
        $follow = $this->ProfileRepository->getfriends();
        $keypls = $this->ProfileRepository->get_user();

        return response()->json(['data' => $data,
                                     'follow'=>$follow, 
                                     'keypls'=>$keypls,
                                      'dm' => accesUrl(Auth::user(), $this->menu_id)]);
        
    }
    public function show_membership(Request $request)
    {
            $data = Type_membership::all();
            return response()->json($data);
        
    }

    public function purchase(Request $request)
    {
            $data = $this->generalRepository->purchase_transaction($request->status,$request->id,Auth::user()->id);
            return response()->json($data);
    }

    public function purchase_extra(Request $request)
    {
            $data = $this->generalRepository->purchase_extra_transaction($request->status,$request->id,Auth::user());
            return response()->json($data);
    }

    public function edit(Request $request)
    {
       $data = $this->ProfileRepository->get_user();
       return response()->json($data);
    }

    public function update(UpdateProfileRequest $request)
    {
    
        $user = User::find($request->id);
        if (isset($request['image'])) {
            $image = $request->file('image');
            $nameImg = $image->getClientOriginalName();
            $file_path = '/images/user/profile/';
            $image->move(public_path() . '/images/user/profile/', $nameImg);
        } else {
            $nameImg = isset($user->image)? $user->image : NULL;
            $file_path = isset($user->path)? $user->path : NULL;
        }
        $data['profile'] = $this->ProfileRepository->update($request->input(),$request->id,$nameImg,$file_path);
        $data['membership'] = Membership::where('user_id',$request->id)->with('type_memberships')->get();

        return response()->json($data);

    }

    public function update_start(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request['image']) {
            $image = $request->file('image');
            $nameImg = $image->getClientOriginalName();
            $file_path = '/images/user/profile/';
            $image->move(public_path() . '/images/user/profile/', $nameImg);
        } else {
            $nameImg = $user->image;
            $file_path = $user->path;
        }

        $data = $this->ProfileRepository->update_start($request->input(),$user->id,$nameImg,$file_path);
        return response()->json($data);
    }


    public function get_user(Request $request,$id)
    {
        if($request->ajax())
        {
            $membership = Membership::where('user_id',$id)->with('type_memberships')->get();
            $user = User::find($id);
            return response()->json(['user'=>$user,'memberships'=>$membership]);
        }
    }

    public function renovate(Request $request,$id)
    {
        $data = $this->generalRepository->renovate($id);
        return response()->json($data);
    }
}
