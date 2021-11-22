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

class CardController extends Controller
{
    public function __construct(CardsRepository $CardsRepository){
        $this->CardsRepository = $CardsRepository;
        $this->menu_id=1;
        $this->module_name ='Cards';
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
            return view('Cards.create');
        }
    }
}
