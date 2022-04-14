<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Card_detail;
use App\Models\Cards_items;
use App\Repositories\CardsRepository;
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
    public function __construct(CardsRepository $repository,HomeRepository $homeRepository)
    {
       $this->repository = $repository;
       $this->homeRepository = $homeRepository;
    }

    public function get_keypls(Request $request){
        $data = $this->repository->get_keypls($request->user());
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
        $data = $this->repository->get_data_keypl($id);
        return response()->json($data,200);
    }

    public function update_card_item(Request $request,$id){
        $data = $this->repository->update_card_detail_item($id,$request->input());
        return response()->json($data, 201);
    }
    public function create_detail(Request $request,$id){
        $card = Card::find($id);
        $card_detail = Card_detail::create([
            'card_id'=> $id,
            'card_item_id'=>$request->card_item_id,
            'name' => (strlen($request->name)>0)?$request->name:'',
            'description' => (strlen($request->description)>0)?$request->description:'',
            'order'=> (int)$request->order,
        ]);
        return response()->json($card_detail, 201);
    }

    public function detail(Request $request, $id)
    {       $idStr =explode("?", $id);
        
            if(Card::where('id',$idStr[0])->exists()){
                if (Auth::guest()){
                    $this->repository->create_views($id,2);

                    }else{
                        $user = Auth::user();
                        $check = Card::find($id);
                        if($user->id !==  $check->user_id){
                            $this->repository->create_views($id,2);
                        }
                   }
    
                return response()->json($this->repository->get_data_keypl($idStr[0]), 200);

            }  

    }

    public function deleteOrResotore(Request $request,$Card_id)
    {    
        $Bval = Card_detail::withTrashed()->find($Card_id)->trashed();

        return DB::transaction(function () use ($Bval,$Card_id) {
         
          if($Bval){
            $Card = Card_detail::withTrashed()->find($Card_id)->restore();
            $b=4;
        }else{
            $Card = Card_detail::find($Card_id)->delete();
            $b=3;
        }

        if ($b) {
            return $b;
        }

        throw new GeneralException(__('Error deleteOrResotore of Card.'));

      });
      return response()->json(['data'=>'gola'], 201);
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
            $card = $this->repository->show($card->id);
            $graphics = $this->repository->get_data_chart($card->id);
            array_push($data,['graphics'=>$graphics,'card'=>$card]);
        }
        
        return view('Cards.metricas',['data'=>$data]);
    }

    
    public function get_data_metricas_json(Request $request){
        $data = [];
        
        $allData = Card::where('user_id',$request->id)->get();
        foreach ($allData as $key => $card) {
            $card = $this->repository->show($card->id);
            $graphics = $this->repository->get_data_chart_api($card->id,$request->id);
            array_push($data,['graphics'=>$graphics,'card'=>$card]);
        }
        return response()->json($data);
    }

}
