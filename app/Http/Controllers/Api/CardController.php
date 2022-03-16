<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Card_detail;
use App\Models\Cards_items;
use App\Repositories\CardsRepository;
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
    public function __construct(CardsRepository $repository)
    {
       $this->repository = $repository;
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
        ]);
        return response()->json($card_detail, 201);
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
    
                return response()->json($this->CardsRepository->get_data_keypl($idStr[0]), 200);

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
}
