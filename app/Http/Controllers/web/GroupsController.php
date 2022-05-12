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
}
