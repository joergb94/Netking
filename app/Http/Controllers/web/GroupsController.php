<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Exceptions\GeneralException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\GeneralRepository;
use App\Repositories\GroupsRepository; 
use App\Repositories\FriendsGroupRepository; 
use App\Models\Group;
use App\Models\FriendsGroup;
use App\Models\Friends;

class GroupsController extends Controller
{   
        /**
         * UserController constructor.
         *
         * @param GroupsRepository $GroupsRepository
         */
        public function __construct(GroupsRepository $GroupsRepository,FriendsGroupRepository $FriendsGroupRepository)
        {
            $this->GruposRepository = $GroupsRepository;
            $this->FriendsGroupRepository = $FriendsGroupRepository;
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
        public function create(Request $request){

            $data['user'] = Auth::user();
            $data['friends'] = Friends::where('user_id',Auth::user()->id)->get();

            return view('Friends.createGroup', ['data' => $data]);
        }

        public function store(Request $request){
            $data = $this->GruposRepository->create($request->input());
            return response()->json(Answer(
                $data['id'],
                $this->module_name,
                $this->text_module[1],
                "success",
                'yellow',
                '1'
            ));
        }

        public function edit(Request $request){

            $data['user'] = Auth::user();
            $data['group'] = Group::find($request->id);
            $data['friendsGroups'] =  $this->FriendsGroupRepository::getFriendsGroup($data['group']->id);
            return view('Friends.editGroup', ['data' => $data]);
        }

        public function update(Request $request){
            $data = $this->GruposRepository->update($request->id,$request->input());
            return response()->json(Answer(
                $data['id'],
                $this->module_name,
                $this->text_module[1],
                "success",
                'yellow',
                '1'
            ));
        }

        public function delete(Request $request,$id){

            $state=  $this->FriendsGroupRepository::deleteOrResotore($id);
            $msg = Answer(
                $id,
                $this->module_name,
                $this->text_module[$state - 1],
                "success",
                $state == 4 ? 'green' : 'red',
                $state == 4 ? '1' : 'D'
            ) ;
            return response()->json([
                'msg'=>$msg,
                'id'=>$id
            ]);
        }

        public function add_to_group(Request $request,$Group_id){

            $data['user'] = Auth::user();
            $data['group'] = Group::find($Group_id);
            $data['friends'] = $this->GruposRepository->get_friends_without_group($Group_id);

            return view('Friends.addGroup', ['data' => $data]);
        }

        public function store_to_group(Request $request,$Group_id){
            foreach ($request->friends as $friend) {
                $this->FriendsGroupRepository->create([
                    'group_id'=>$Group_id,
                    'friend_id'=>$friend
                ]);
            }

            $data['group'] = Group::find($Group_id);
            $data['friendsGroups'] =  $this->FriendsGroupRepository::getFriendsGroup($Group_id);
            return view('Friends.items.edit.list', ['data' => $data]);
        }
}
