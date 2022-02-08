<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CardsRepository;
use App\Repositories\GeneralRepository;
use App\Repositories\ResgisterUserRepository;
use App\Http\Requests\Cards\CardsRequest;
use App\Http\Requests\Cards\CardsIdRequest;
use App\Http\Requests\Cards\CardsUpdateRequest;
use App\Http\Requests\Cards\CardsStoreRequest;
use App\Models\Cards;
use App\Models\Themes;
use App\Models\Theme_detail;
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
    public function __construct(CardsRepository $CardsRepository, GeneralRepository $GeneralRepository,ResgisterUserRepository $ResgisterUserRepository)
    {
        $this->CardsRepository = $CardsRepository;
        $this->GeneralRepository = $GeneralRepository;
        $this->ResgisterUserRepository = $ResgisterUserRepository;
        $this->menu_id = 3;
        $this->module_name = 'Card';
        $this->text_module = ['Created', 'Updated', 'Deleted', 'Restored', 'Actived', 'Deactived'];
        $this->buttons = ['','btn-fab-r','btn-rounded',''];
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

                $themes = Themes::all();
                return view('Cards.create',['themes'=>$themes]);
            
        }
    }

    public function qrGenerator(CardsRequest $request)
    {
 
            return view('Cards.qrGenerator',['dm' => accesUrl(Auth::user(), $this->menu_id)]);

    }
    public function store(CardsStoreRequest $request)
    {
        $status = $this->GeneralRepository->card_max();
        if ($status) {
            $User = User::find(Auth::user()->id);
            $data = $this->ResgisterUserRepository->create_only_card($User);
            return view('Cards.create', $this->CardsRepository->get_data_keypl($data['id']));
        }
    }

    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {


            return view('Cards.edit', $this->CardsRepository->get_data_keypl($id));
        }
    }

    public function update_theme(Request $request, $id)
    {
        if ($request->ajax()) {


            return view('Cards.itemsUpdate.cardForm', $this->CardsRepository->get_data_keypl($id));
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
                if (Auth::guest()){
                    $this->CardsRepository->create_views($id,2);

                    }else{
                        $user = Auth::user();
                        $check = Card::find($id);
                        if($user->id !==  $check->user_id){
                            $this->CardsRepository->create_views($id,2);
                        }
                   }
    
                return view('Cards.card',$this->CardsRepository->get_data_keypl($idStr[0]));

            }  

    }

    public function detail_qr(Request $request, $id)
    {       $idStr =explode("?", $id);
        
            if(Card::where('id',$idStr[0])->exists()){

                
                if (Auth::guest()){
                    $this->CardsRepository->create_views($id,1);

                    }else{
                        $user = Auth::user();
                        $check = Card::find($id);
                        if($user->id !==  $check->user_id){
                            $this->CardsRepository->create_views($id,1);
                        }
                   }
    
                return view('Cards.card',$this->CardsRepository->get_data_keypl($idStr[0]));

            }  

    }
    
    public function show_qr(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = $this->CardsRepository->show($id);
            
            return view('Cards.show',['data'=>$data]);
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
                    'item_data'=>$request->item_data?$request->item_data:NULL,
             ]);
           
            if(Card::where('id',$card_item['card_id'])->exists()){
        
                return view('Cards.itemsUpdate.keypl', 
                            $this->CardsRepository->get_data_keypl($card_item['card_id']));
        
            }
        }
    }

    public function update_card_item_file(Request $request,$id)
    {
        if ($request->ajax()) {
            $detail = Card_detail::find($id);
    
            if ($request['file']) {
                $image = $request->file('file');
                $nameImg = time() . $image->getClientOriginalName();
                $file_path = '/images/keypls/';
                $image->move(public_path() . '/images/keypls/', $nameImg);
                $full_path = $file_path.$nameImg;
            } else if($detail->item_data) {
                $full_path = strlen($detail->item_data) > 0?$detail->item_data:'img/profile.jpg';
            }else{
                $full_path = 'img/profile.jpg';
            }
            $dataItem =$detail['card_item_id'] == 1
                        ?['name'=> $request->name,'description'=>$request->description, 'item_data'=>$full_path]
                        :['name'=> $request->name,'description'=>$file_path.$nameImg, 'item_data'=>$full_path];

            $card_item = $this->CardsRepository->update_card_detail_item($id,$dataItem);

            if(Card::where('id',$card_item['card_id'])->exists()){
                       
                return view('Cards.itemsUpdate.keypl',$this->CardsRepository->get_data_keypl($card_item['card_id']));
        
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

            if(strlen($request['theme']) > 0 && $request['theme'] != $card['themes_id']){
                $theme = Theme_detail::find($request['theme']);
                $dataTheme =  [
                    'shape_image' => $theme['shape_image'],
                    'head_orientation' => $theme['head_orientation'],
                    'divs_shape' => $theme['divs_shape'],
                    'buttons_shape' => $theme['buttons_shape'],
                    'color' => $theme['color'],
                    'background_image_color' =>$theme['background_image_color'],
                    'large_text' => $theme['large_text'],
                    'text_style_id' => $theme['text_style_id'],
                    'theme' => $request['theme'],
                    'background' => $theme['background_image_id'],
                    'background_color' => $theme['background_color'],
                    'location' => $request['location'],
                    'img_base_64' =>$request['img_base_64'],
                    'networks' =>$request['networks']
                ];

                $data = $this->CardsRepository->update_asinc($id,$dataTheme,$nameImg, $file_path);
            }else{
               
                $data = $this->CardsRepository->update_asinc($id, $request->input(), $nameImg, $file_path);
            }
           
            if(Card::where('id',$data['id'])->exists()){
   
                return view('Cards.itemsUpdate.keypl',$this->CardsRepository->get_data_keypl($data['id']));

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

    public function delete_item(Request $request,$id){
        $data_id = $this->CardsRepository->delete_item($id);
        return response()->json($data_id);
    }
}
