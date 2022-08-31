<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\Cards\updateItemRequest;
use App\Http\Requests\Api\Cards\storeItemRequest; 
use App\Http\Requests\Api\Cards\DeleteItemRequest;
use App\Http\Requests\Api\Cards\IdCardRequest;
use App\Http\Requests\Cards\CardsStoreRequest;
use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Card_detail;
use App\Models\Cards_items;
use App\Repositories\api\CardsRepository;
use App\Repositories\HomeRepository;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CardsRepository $CardRepository,HomeRepository $homeRepository)
    {
       $this->CardRepository = $CardRepository;
       $this->homeRepository = $homeRepository;
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

    public function get_keypls(Request $request){
        $data = $this->CardRepository->get_keypls($request->user());
    
        return response()->json($data,200);
    }

    public function card_item(Request $request)
    {
        $data = [];
        $card_detail = Cards_items::all();
        foreach($card_detail as $item){
            array_push($data,$item);
        }
        return json_encode($data);
    }

    public function get_data_keypl(Request $request,$id)
    {
        $data = $this->CardRepository->get_data_keypl($id);
        return response()->json($data,200);
    }

    public function update_card_item(updateItemRequest $request){
        $data = $this->CardRepository->update_card_detail_item($request->card_detail_id,$request->input());
        return response()->json($data, 201);
    }
    public function create_detail(storeItemRequest $request){
        $card = Card::find($request->card_id);
        $card_detail = Card_detail::create([
            'card_id'=> $request->card_id,
            'card_item_id'=>$request->card_item_id,
            'name' => (strlen($request->name)>0)?$request->name:'',
            'description' => (strlen($request->description)>0)?$request->description:'',
            'order'=> (int)$request->order,
        ]);
        return response()->json($card_detail, 201);
    }

    public function detail(IdCardRequest $request)
    {       
            $idStr =explode("?",$request->card_id);
        
            if(Card::where('id',$idStr[0])->exists()){
                if (Auth::guest()){
                    $this->CardRepository->create_views($id,2);

                    }else{
                        $user = Auth::user();
                        $check = Card::find($request->card_id);
                        if($user->id !==  $check->user_id){
                            $this->CardRepository->create_views($request->card_id,2);
                        }
                   }
    
                return response()->json($this->CardRepository->get_data_keypl($idStr[0]), 200);

            }  

    }

    public function deleteOrResotore(DeleteItemRequest $request)
    {    
        $data = $this->CardRepository->delete_item($request->card_detail_id);
        return response()->json([
                'msg'=>"deleted",
                'id'=>$request->card_detail_id
            ], 201);
    }

    public function metrics(Request $request)
    {
        $views =  $this->homeRepository->keyplsViews(Auth::user());
        $socialViews = $this->homeRepository->keyplsSocialViews(Auth::user());
        return response()->json(['views'=>$views,'social'=>$socialViews], 200);
    }

    public function image(Request $request){
        $user = Auth::user();
        $image = "{$user->path}"."{$user->image}";
        return response()->json(['image'=>$image], 201);
    }


    public function get_data_metricas(Request $request){
        $data = [];
        $allData = Card::where('user_id',Auth::user()->id)->get();

        foreach ($allData as $key => $card) {
            $card = $this->CardRepository->show($card->id);
            $graphics = $this->CardRepository->get_data_chart($card->id);
            array_push($data,['graphics'=>$graphics,'card'=>$card]);
        }
        return response()->json($data);
     
    }

    
    public function get_data_metricas_json(Request $request){
        $data = [];
        
        $allData = Card::where('user_id',$request->id)->get();
        foreach ($allData as $key => $card) {
            $card = $this->CardRepository->show($card->id);
            $graphics = $this->CardRepository->get_data_chart_api($card->id,$request->id);
            array_push($data,['graphics'=>$graphics,'card'=>$card]);
        }
        return response()->json($data);
    }

}
