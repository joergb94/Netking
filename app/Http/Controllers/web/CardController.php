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
use App\Models\NetworkSocial;
use App\Models\Cards_style_detail;
use App\Models\Card_detail_network;
use App\Models\User;
use App\Models\Background_image;
use App\Models\Card;
use App\Models\text_style;

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
            $ns = NetworkSocial::all();
            $text_styles = text_style::all();
            return view('Cards.create',['backgrounds'=>$background, 'user'=>$user, 'ns'=> $ns,'text_styles'=>$text_styles]);
        }
    }

    public function store(CardsStoreRequest $request)
    {   
        
        if ($request->ajax()) {
            if($request['image']){
                $image = $request->file('image');
                $nameImg = time().$image->getClientOriginalName();
                $file_path ='/images/card/profile/';
                $image->move(public_path().'/images/card/profile/',$nameImg);
            }else{
                $nameImg ='clase.png';
                $file_path ='/images/clases';
            }
            $data = $this->CardsRepository->create($request->input(),1,$nameImg,$file_path);
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
            $nsInUse =[];
            $data = $this->CardsRepository->show($id);
            $actual_bg = $data->background_image->description;
            $background = Background_image::all();
            $card_style = Cards_style_detail::where('card_id',$id)->first();
            $user = User::find($data['user_id']);
            $nsFree = NetworkSocial::all();
            $text_styles = text_style::all();
            foreach ($nsFree as $ns) {
                $inUse = Card_detail_network::where('network_social_id',$ns['id'])
                                    ->where('card_id',$data['id'])
                                    ->first();
                array_push($nsInUse,['nsData'=>$ns,'nsUser'=>$inUse]);
            }

            
            return view('Cards.edit',['data'=>$data,
                                      'backgrounds'=>$background,
                                      'actual_bg'=>$actual_bg,
                                      'user'=>$user,
                                      'card_style'=> $card_style,
                                      'ns'=> $nsInUse,
                                      'text_styles'=>$text_styles
                                    ]);
        }
    }
    public function update(CardsStoreRequest $request, $id)
    {
        if ($request->ajax()) {
            $card = Card::where('id',$id)->first();
            if($request['image']){
                $image = $request->file('image');
                $nameImg = time().$image->getClientOriginalName();
                $file_path ='/images/card/profile/';
                $image->move(public_path().'/images/card/profile/',$nameImg);
            }else{
                $nameImg = $card->img_name;
                $file_path = $card->img_path;
            }
            $data = $this->CardsRepository->update($id,1,$request->input(),$nameImg,$file_path);
            return response()->json(Answer( $data['id'],
            $this->module_name,
            $this->text_module[1],
            "success",
            'yellow',
            '1'));
        }
    }
    public function detail(Request $request)
    {
        if($request->ajax())
        {
            return view('Cards.show');
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
