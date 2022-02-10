<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cards_items;
use App\Repositories\CardsRepository;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Auth;

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
}
