<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Exceptions\GeneralException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CardsRepository;
use App\Repositories\FriendsRepository;
use App\Repositories\GeneralRepository;
use App\Repositories\ResgisterUserRepository;
use App\Http\Requests\Cards\CardsRequest;
use App\Http\Requests\Cards\CardsIdRequest;
use App\Http\Requests\Cards\CardsUpdateRequest;
use App\Http\Requests\Cards\CardsStoreRequest;
use App\Models\Themes;
use App\Models\Friends;
use App\Models\Theme_detail;
use App\Models\Cards_items;
use App\Models\ViewCardDetail;
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
    public function __construct(CardsRepository $CardsRepository, FriendsRepository $FriendsRepository, GeneralRepository $GeneralRepository,ResgisterUserRepository $ResgisterUserRepository)
    {
        $this->CardsRepository = $CardsRepository;
        $this->FriendsRepository = $FriendsRepository;
        $this->GeneralRepository = $GeneralRepository;
        $this->ResgisterUserRepository = $ResgisterUserRepository;
        $this->menu_id = 3;
        $this->module_name = 'Card';
        $this->text_module = ['Created', 'Updated', 'Deleted', 'Restored', 'Actived', 'Deactived'];
        $this->buttons = ['','btn-fab-r','btn-rounded',''];
        $this->themes = [9,3, 7,0, 9];
    }

    public function index(CardsRequest $request)
    {   
        $cards = Card::where('user_id',Auth::user()->id)->withTrashed()->count();
        if($cards > 0){
            $search = trim($request->search);
            $criterion = trim($request->criterion);
            $status = ($request->status) ? $request->status : 1;
            $location = ($request->location > 0) ? $request->location : 'all';
            $data = $this->CardsRepository->getSearchPaginated($criterion, $search, $status);
            $sts = $this->GeneralRepository->card_max();
            $items = Cards_items::whereNotIn('id',[1,2])->get();
    
            if ($request->ajax()) {
                return view('Cards.items.table', ['data' => $data, 'status' => $status]);
            }
            return view('Cards.index', ['data' => $data,'items'=>$items,'account'=>Auth::user(),'dm' => accesUrl(Auth::user(), $this->menu_id), 'status' => $sts]);
        }else{
            return redirect('/MyFirstKeypl');
        }
       
    }


    public function create_first(CardsRequest $request)
    {
        $cards = Card::where('user_id',Auth::user()->id)->withTrashed()->count();
        if($cards == 0){
            $items = Cards_items::all();
            $themes = Themes::all();
            return view('firstCard.index',['themes'=>$themes,'items'=>$items,'dm' => accesUrl(Auth::user(), $this->menu_id),'quantityCards'=>$cards]);
        }else{
            return redirect('/myKepls');
        }
       
            
    }

    public function edit_first(Request $request, $id){
        if ($request->ajax()) {
                return view('firstCard.edit', $this->CardsRepository->get_data_keypl($id));
        }
    }
    public function create(CardsRequest $request)
    {
        if ($request->ajax()) {
                $cards = Card::where('user_id',Auth::user()->id)->withTrashed()->count();
                $themes = Themes::all();
                return view('Cards.create',['themes'=>$themes,'quantityCards'=>$cards]);
            
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
            $theme = Theme_detail::find($request['theme']);
            $data =  [
                'user_id'=>Auth::user()->id,
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
            $result = $this->CardsRepository->create($data,null,null);
            return $result;
        }else{
            return response()->json($status);
        }
    }

    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            
                return view('Cards.edit', $this->CardsRepository->get_data_keypl($id));
        }
    }

    public function edit_detail(Request $request, $id)
    {
        if ($request->ajax()) {

            $nsInUse = [];
            $detail = Card_detail::find($id);
            if($detail['card_item_id'] == 2){
                $nsFree = NetworkSocial::all();
                foreach ($nsFree as $ns) {
                    $inUse = Card_detail_network::where('network_social_id', $ns['id'])
                        ->where('card_id', $detail['card_id'])
                        ->first();
                    array_push($nsInUse, ['nsData' => $ns, 'nsUser' => $inUse,'card_id'=>$id]);
                }
            }
               
                return view('Cards.itemsUpdate.TypeForms.form'.$detail['card_item_id'], ['data'=>$detail, 'ns' => $nsInUse,]);
        }
    }

    public function update_asinc_network(Request $request, $id)
    {
        if ($request->ajax()) {
            $detail = Card_detail::find($id);
            $card = Card::where('id', $detail['card_id'])->first();
            $ns =json_decode($request['networks']);
            $check = 0;
            foreach ($ns as $key) {
                if($key->link != ''){
                  $check += 1;
                }
               }
            if($check > $this->themes[$card['themes_id']]){
                return response()->json(['errors' => ['erro'=>'you selected the maximum of social networks']], 422);
                
            }else{
                if (isset($request['image'])) {
                    $image = $request->file('image');
                    $nameImg = time() . $image->getClientOriginalName();
                    $file_path = '/images/card/profile/';
                    $image->move(public_path() . '/images/card/profile/', $nameImg);
                } else {
                    $nameImg = $card->img_name;
                    $file_path = $card->img_path;
                }
                $data = $this->CardsRepository->update_asinc($detail['card_id'], $request->input(), $nameImg, $file_path);
        
            
                if(Card::where('id',$data['id'])->exists()){
    
                    return view('Cards.itemsUpdate.keypl',$this->CardsRepository->get_data_keypl($data['id']));

                }
                
            }
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
            if (isset($request['image'])) {
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
    
                return view('Keypls.index',$this->CardsRepository->get_data_keypl($idStr[0]));

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
    
                   return view('Keypls.index',$this->CardsRepository->get_data_keypl($idStr[0]));


            }  

    }
    
    public function show_qr(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = $this->CardsRepository->show($id);
            $user = User::find($data['user_id']);
            return view('Cards.show',['data'=>$data, 'user'=>$user]);
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
            if (isset($request['image'])) {
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
                    'networks' =>$request['networks'],
                    'button_style'=>$request['button_style'],
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
            
            $cd = $this->CardsRepository->create_item($request->input());
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

    public function friendship(Request $request,$id){
        $cardData = Card::find($id);
        $friends = Friends::withTrashed()
                            ->where('card_id',$cardData['id'])
                            ->where('user_id',Auth::user()->id)
                            ->first();

         $validateFollow = isset($friends)?true:false;                

        if($validateFollow == false){
            $data = $this->FriendsRepository->create($id);
            $result['label'] = '<span ><i class="fas fa-user-check"></i></span>';
            $result['add'] = true;
        }else{
            
           $data = $this->FriendsRepository->delete_item($id);
           $result['label'] = $data == 3?'<span"><i class="fas fa-user-plus"></i></span>'
                                        :'<span ><i class="fas fa-user-check"></i></span>';
           $result['add'] = $data == 3? false
                                      : true;
        }

        return response()->json($result);
        
    }

    public function view_card_details_link(Request $request,$id){
          
            $data = $this->CardsRepository->create_views_details($id,$request->input());
            return response()->json($data);
    }

    public function get_data_chart(Request $request,$id){
        $this->CardsRepository->get_data_chart(1);
    }
}
