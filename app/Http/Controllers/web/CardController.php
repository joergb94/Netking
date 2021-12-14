<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CardsRepository;
use App\Repositories\GeneralRepository;
use App\Http\Requests\Cards\CardsRequest;
use App\Http\Requests\Cards\CardsIdRequest;
use App\Http\Requests\Cards\CardsUpdateRequest;
use App\Http\Requests\Cards\CardsStoreRequest;
use App\Models\Cards;
use App\Models\User;
use App\Models\Background_image;

class CardController extends Controller
{
    public function __construct(CardsRepository $CardsRepository){
        $this->CardsRepository = $CardsRepository;
        $this->menu_id=1;
        $this->module_name ='Card';
        $this->text_module = ['Created','Updated','Deleted','Restored','Actived','Deactived'];
    }

    public function index(CardsRequest $request)
    {
        $search = trim($request->search);
        $criterion = trim($request->criterion);
        $status = ($request->status)? $request->status : 1;
        $location = ($request->location >0)? $request->location : 'all';
        $data = $this->CardsRepository->getSearchPaginated($criterion,$search,$status);
        
        if ($request->ajax()) { 
            return view('Cards.items.table',['data'=>$data]);
        }
        return view('Cards.index',['data'=>$data,'dm'=>accesUrl(Auth::user(),$this->menu_id)]);
    }

    public function create(CardsRequest $request)
    {
        if ($request->ajax()) {
            $background = Background_image::all();
            $user = User::find(Auth::user()->id);
            return view('Cards.create',['backgrounds'=>$background, 'user'=>$user]);
        }
    }

    public function store(Request $request)
    {   
        
        if ($request->ajax()) {
            $data = $this->CardsRepository->create($request->input(),1);
            return response()->json(Answer( $data['id'],
                                        $this->module_name,
                                        $this->text_module[0],
                                        "success",
                                        'green',
                                        '1'));
        }
    }
    public function edit(Request $request,$id)
    {
        if ($request->ajax()) {
            $data = $this->CardsRepository->show($id);
            $actual_bg = $data->background_image->description;
            $background = Background_image::all();
            $user = User::find($data['user_id']);
            return view('Cards.edit',['data'=>$data,
                                      'backgrounds'=>$background,
                                      'actual_bg'=>$actual_bg,
                                      'user'=>$user]);
        }
    }
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = $this->CardsRepository->update($id,1,$request->input());
            return response()->json(Answer( $data['id'],
            $this->module_name,
            $this->text_module[1],
            "success",
            'yellow',
            '1'));
        }
    }
    public function deleteOrResotore(Request $request,$id)
    {
        if ($request->ajax()) {
            $state = $this->CardsRepository->deleteOrResotore($id);
            return response()->json(Answer( $request['id'],
            $this->module_name,
            $this->text_module[$state-1],
            "success",
            $state==4?'green':'red',
            $state==4?'1':'D'));
        }
    }
    public function getBG(Request $request,$id)
    {
        if($request->ajax()){
            $bg = Background_image::find($id);
            return response()->json($bg);
        }
    }
}
