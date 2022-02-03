<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Http\Requests\User\CardRequest;
//use App\Http\Requests\Card\CardIdRequest;
//use App\Http\Requests\Card\CardPassRequest;
//use App\Http\Requests\Card\CardUpdateRequest;
//use App\Http\Requests\Card\CardStoreRequest;
use App\Models\Card;
use App\Repositories\HomeRepository;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HomeRepository $HomeRepository)
    {
        $this->middleware('auth');
        $this->HomeRepository = $HomeRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {    
        $search = trim($request->search);
        $data = $this->HomeRepository->getSearchPaginated($search);
       if(!$request->ajax()) return view('home.index',['dm'=>accesUrl(Auth::user(),1),'data'=>$data]);
    }

    public function deleteOrResotore(Request $request){
        return response()->json($this->HomeRepository->deleteOrResotore($request['id']));
    }
}
