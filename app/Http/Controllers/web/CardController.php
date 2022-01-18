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
use App\Models\Cards_items;
use App\Models\Card_detail;
use App\Models\NetworkSocial;
use App\Models\Cards_style_detail;
use App\Models\Card_detail_network;
use App\Models\User;
use App\Models\Background_image;
use App\Models\Card;
use App\Models\text_style;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CardController extends Controller
{
    public function __construct(CardsRepository $CardsRepository, GeneralRepository $GeneralRepository)
    {
        $this->CardsRepository = $CardsRepository;
        $this->GeneralRepository = $GeneralRepository;
        $this->menu_id = 3;
        $this->module_name = 'Card';
        $this->text_module = ['Created', 'Updated', 'Deleted', 'Restored', 'Actived', 'Deactived'];
    }

    public function index(CardsRequest $request)
    {
        $search = trim($request->search);
        $criterion = trim($request->criterion);
        $status = ($request->status) ? $request->status : 1;
        $location = ($request->location > 0) ? $request->location : 'all';
        $data = $this->CardsRepository->getSearchPaginated($criterion, $search, $status);
        $sts = $this->GeneralRepository->card_max();
        $items = Cards_items::all();

        if ($request->ajax()) {
            return view('Cards.items.table', ['data' => $data, 'status' => $status]);
        }
        return view('Cards.index', ['data' => $data,'items'=>$items, 'dm' => accesUrl(Auth::user(), $this->menu_id), 'status' => $sts]);
    }

    public function create(CardsRequest $request)
    {
        if ($request->ajax()) {
            $status = $this->GeneralRepository->card_max();
            if ($status) {
                $background = Background_image::all();
                $user = User::find(Auth::user()->id);
                $ns = NetworkSocial::all();
                $text_styles = text_style::all();
                $cardItems = Cards_items::all();
                return view('Cards.create', ['cardItems'=>$cardItems,'backgrounds' => $background, 'user' => $user, 'ns' => $ns, 'text_styles' => $text_styles]);
            }
        }
    }

    public function store(CardsStoreRequest $request)
    {

        if ($request->ajax()) {
            $status = $this->GeneralRepository->card_max();
            if ($status) {
                if ($request['image']) {
                    $image = $request->file('image');
                    $nameImg = time() . $image->getClientOriginalName();
                    $file_path = '/images/card/profile/';
                    $image->move(public_path() . '/images/card/profile/', $nameImg);
                } else {
                    $nameImg = 'clase.png';
                    $file_path = '/images/clases';
                }
                $data = $this->CardsRepository->create($request->input(), 1, $nameImg, $file_path);
                return response()->json(Answer(
                    $data['id'],
                    $this->module_name,
                    $this->text_module[0],
                    "success",
                    'green',
                    '1'
                ));
            }
        }
    }
    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $nsInUse = [];
            $cardItemsDetail =[];
            $data = $this->CardsRepository->show($id);
            $actual_bg = $data->background_image->description;
            $background = Background_image::all();
            $card_style = Cards_style_detail::where('card_id', $id)->first();
            $user = User::find($data['user_id']);
            $nsFree = NetworkSocial::all();
            $cardItems = Cards_items::all();
            $text_styles = text_style::all();

            foreach ($nsFree as $ns) {
                $inUse = Card_detail_network::where('network_social_id', $ns['id'])
                    ->where('card_id', $data['id'])
                    ->first();
                array_push($nsInUse, ['nsData' => $ns, 'nsUser' => $inUse,'card_id'=>$id]);
            }

            foreach ($cardItems as $ci) {
                $card_detail = Card_detail::where('card_item_id', $ci['id'])
                    ->where('card_id', $data['id'])
                    ->first();
                if($card_detail){
                    array_push($cardItemsDetail, ['item' => $ci, 'card_detail' => $card_detail]);
                }
               
            }
         
            return view('Cards.edit', [
                'cardItems'=>$cardItemsDetail,
                'data' => $data,
                'backgrounds' => $background,
                'actual_bg' => $actual_bg,
                'user' => $user,
                'card_style' => $card_style,
                'ns' => $nsInUse,
                'text_styles' => $text_styles
            ]);
        }
    }
    public function update(CardsStoreRequest $request, $id)
    {
        if ($request->ajax()) {
            $card = Card::where('id', $id)->first();
            if ($request['image']) {
                $image = $request->file('image');
                $nameImg = time() . $image->getClientOriginalName();
                $file_path = '/images/card/profile/';
                $image->move(public_path() . '/images/card/profile/', $nameImg);
            } else {
                $nameImg = $card->img_name;
                $file_path = $card->img_path;
            }
            $data = $this->CardsRepository->update($id, 1, $request->input(), $nameImg, $file_path);
            return response()->json(Answer(
                $data['id'],
                $this->module_name,
                $this->text_module[1],
                "success",
                'yellow',
                '1'
            ));
        }
    }
    public function detail(Request $request, $id)
    {       $idStr =explode("?", $id);
        
            if(Card::where('id',$idStr[0])->exists()){
                $nsInUse = [];
                $cardItemsDetail =[];
                $data = $this->CardsRepository->show($idStr[0]);
                $actual_bg = $data->background_image->description;
                $card_style = Cards_style_detail::where('card_id', $idStr[0])->first();
                $user = User::find($data['user_id']);
                $nsFree = NetworkSocial::all();
                $text_styles = text_style::all();
                $cardItems = Cards_items::all();
                $text_styles = text_style::all();
    
                foreach ($nsFree as $ns) {
                    $inUse = Card_detail_network::where('network_social_id', $ns['id'])
                        ->where('card_id', $data['id'])
                        ->first();
                    array_push($nsInUse, ['nsData' => $ns, 'nsUser' => $inUse]);
                }
    
                foreach ($cardItems as $ci) {
                    $card_detail = Card_detail::where('card_item_id', $ci['id'])
                        ->where('card_id', $data['id'])
                        ->first();
                    if($card_detail){
                        array_push($cardItemsDetail, ['item' => $ci, 'card_detail' => $card_detail]);
                    }
                   
                }

                return view('Cards.card', [
                    'cardItems'=>$cardItemsDetail,
                    'data' => $data,
                    'actual_bg' => $actual_bg,
                    'user' => $user,
                    'card_style' => $card_style,
                    'ns' => $nsInUse,
                    'text_styles' => $text_styles
                ]);

            }
          
           

    }

    public function deleteOrResotore(Request $request, $id)
    {
        if ($request->ajax()) {
            $state = $this->CardsRepository->deleteOrResotore($id);
            return response()->json(Answer(
                $request['id'],
                $this->module_name,
                $this->text_module[$state - 1],
                "success",
                $state == 4 ? 'green' : 'red',
                $state == 4 ? '1' : 'D'
            ));
        }
    }
    public function getBG(Request $request, $id)
    {
        if ($request->ajax()) {
            $bg = Background_image::find($id);
            return response()->json($bg);
        }
    }

    public function get_create_card(Request $request)
    {
        if ($request->ajax()) {
            $status = $this->GeneralRepository->card_max();
            return response()->json($status);
        }
    }

    public function update_card_item(Request $request,$id)
    {
        if ($request->ajax()) {
            $card_item = Card_detail::find($id);
            $card_item->update([
                    'name'=>$request->name,
                    'description'=>$request->description,
             ]);
           
            if(Card::where('id',$card_item['card_id'])->exists()){
                        $nsInUse = [];
                        $cardItemsDetail =[];
                        $background = Background_image::all();
                        $data = $this->CardsRepository->show($card_item['card_id']);
                        $actual_bg = $data->background_image->description;
                        $card_style = Cards_style_detail::where('card_id', $card_item['card_id'])->first();
                        $user = User::find($data['user_id']);
                        $nsFree = NetworkSocial::all();
                        $text_styles = text_style::all();
                        $cardItems = Cards_items::all();
                        $text_styles = text_style::all();
            
                        foreach ($nsFree as $ns) {
                            $inUse = Card_detail_network::where('network_social_id', $ns['id'])
                                ->where('card_id', $data['id'])
                                ->first();
                            array_push($nsInUse, ['nsData' => $ns, 'nsUser' => $inUse]);
                        }
            
                        foreach ($cardItems as $ci) {
                            $card_detail = Card_detail::where('card_item_id', $ci['id'])
                                ->where('card_id', $data['id'])
                                ->first();
                            if($card_detail){
                                array_push($cardItemsDetail, ['item' => $ci, 'card_detail' => $card_detail]);
                            }
                        
                        }
        
                        return view('Cards.itemsUpdate.keypl', [
                            'cardItems'=>$cardItemsDetail,
                            'data' => $data,
                            'backgrounds' => $background,
                            'actual_bg' => $actual_bg,
                            'user' => $user,
                            'card_style' => $card_style,
                            'ns' => $nsInUse,
                            'text_styles' => $text_styles
                        ]);
        
            }
        }
    }

    public function update_asinc(Request $request, $id)
    {
        if ($request->ajax()) {
            $card = Card::where('id', $id)->first();
            if ($request['image']) {
                $image = $request->file('image');
                $nameImg = time() . $image->getClientOriginalName();
                $file_path = '/images/card/profile/';
                $image->move(public_path() . '/images/card/profile/', $nameImg);
            } else {
                $nameImg = $card->img_name;
                $file_path = $card->img_path;
            }
            $data = $this->CardsRepository->update_asinc($id, $request->input(), $nameImg, $file_path);
            if(Card::where('id',$data['id'])->exists()){
                $nsInUse = [];
                $cardItemsDetail =[];
                $background = Background_image::all();
                $data = $this->CardsRepository->show($data['id']);
                $actual_bg = $data->background_image->description;
                $card_style = Cards_style_detail::where('card_id', $data['id'])->first();
                $user = User::find($data['user_id']);
                $nsFree = NetworkSocial::all();
                $text_styles = text_style::all();
                $cardItems = Cards_items::all();
                $text_styles = text_style::all();
    
                foreach ($nsFree as $ns) {
                    $inUse = Card_detail_network::where('network_social_id', $ns['id'])
                        ->where('card_id', $data['id'])
                        ->first();
                    array_push($nsInUse, ['nsData' => $ns, 'nsUser' => $inUse]);
                }
    
                foreach ($cardItems as $ci) {
                    $card_detail = Card_detail::where('card_item_id', $ci['id'])
                        ->where('card_id', $data['id'])
                        ->first();
                    if($card_detail){
                        array_push($cardItemsDetail, ['item' => $ci, 'card_detail' => $card_detail]);
                    }
                
                }

                return view('Cards.itemsUpdate.keypl', [
                    'cardItems'=>$cardItemsDetail,
                    'data' => $data,
                    'backgrounds' => $background,
                    'actual_bg' => $actual_bg,
                    'user' => $user,
                    'card_style' => $card_style,
                    'ns' => $nsInUse,
                    'text_styles' => $text_styles
                ]);

            }
        }
    }

    public function create_item(Request $request)
    { 
        if($request->ajax()){

            $cd = Card_detail::create([
                'card_id'=>$request->card_id,
                'card_item_id'=>$request->card_item_id,
                'name'=>'Example',
                'description'=>'Example',
            ]);

            if($cd){
                $data['item'] = Cards_items::find($cd['card_item_id']);
                $data['card_detail'] = Card_detail::find($cd['id']);
                return view('Cards.addItem',['data'=>$data]);
    
            }else{
                return response()->json($cd);
            }
            
        }    
    }
}
