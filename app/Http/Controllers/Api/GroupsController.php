<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Exceptions\GeneralException;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Friend\StoreGroupRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\GeneralRepository;
use App\Repositories\GroupsRepository; 
use App\Repositories\FriendsGroupRepository; 
use App\Repositories\FriendsRepository;
use App\Models\Group;
use App\Models\Card;
use App\Models\FriendsGroup;
use App\Models\Friends;

class GroupsController extends Controller
{   
        /**
         * UserController constructor.
         *
         * @param GroupsRepository $GroupsRepository
         */
        public function __construct(GroupsRepository $GroupsRepository,FriendsGroupRepository $FriendsGroupRepository, FriendsRepository $FriendsRepository)
        {
            $this->GruposRepository = $GroupsRepository;
            $this->FriendsGroupRepository = $FriendsGroupRepository;
            $this->FriendsRepository = $FriendsRepository;
            $this->menu_id = 3;
            $this->module_name ='Conection';
            $this->text_module = [  
                                    'Creado',
                                    'Actualizado',
                                    'Contraseña Actualizada',
                                    'Eliminado',
                                    'Recuperado',
                                    'Activado',
                                    'Desactivado'
                                ];
        }

        public function friendship(Request $request)
        {
            $cardData = Card::find($request->card_id);
            $friends = Friends::withTrashed()
                                ->where('card_id',$request->card_id)
                                ->where('user_id',Auth::user()->id)
                                ->first();
    
             $validateFollow = isset($friends)?true:false;                
    
            if($validateFollow == false){
                $data = $this->FriendsRepository->create($request->card_id);
                $result['add'] = true;
            }else{
                
               $data = $this->FriendsRepository->delete_item($request->card_id);
               $result['add'] = $data == 3? false
                                          : true;
            }
    
            return response()->json($result);
            
        }
        public function create(Request $request){

            $data['user'] = Auth::user();
            $data['friends'] = Friends::where('user_id',Auth::user()->id)->get();

            return response()->json($data);
        }

        public function store(StoreGroupRequest $request){
            $data = $this->GruposRepository->create($request->input());
            return response()->json($data);
        }

        public function edit(Request $request){

            $data['user'] = Auth::user();
            $data['group'] = Group::find($request->group_id);
            $data['friendsGroups'] =  $this->FriendsGroupRepository::getFriendsGroup($data['group']->id);
            return response()->json($data);
        }

        public function update(Request $request){
            $data = $this->GruposRepository->update($request->id,$request->input());
            return response()->json($data);
        }

        public function delete(Request $request){

            $state=  $this->FriendsGroupRepository::deleteOrResotore($request['friend_group_id']);
          
            return response()->json([
                'msg'=>"deleted",
                'id'=>$request['friend_group_id']
            ]);
        }

        public function add_to_group(Request $request){

            $data['user'] = Auth::user();
            $data['group'] = Group::find($request->group_id);
            $data['friends'] = $this->GruposRepository->get_friends_without_group($request->group_id);

            return response()->json($data);
        }

        public function store_to_group(Request $request){
            foreach ($request->friends as $friend) {
                $this->FriendsGroupRepository->createMemberGroup([
                    'group_id'=>$request->group_id,
                    'friend_id'=>$friend
                ]);
            }

            $data['group'] = Group::find($request->group_id);
            $data['friendsGroups'] =  $this->FriendsGroupRepository::getFriendsGroup($request->group_id);
            return response()->json($data);
        }
}
