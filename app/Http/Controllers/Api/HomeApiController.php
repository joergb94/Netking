<?php

namespace App\Http\Controllers\Api;

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

class HomeApiController extends Controller
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

   
    public function index(Request $request)
    {   
            $search = trim($request->search);
            $criterion = trim($request->criterion);
            $status = ($request->status)? $request->status : 1;

        return response()->json($this->HomeRepository->getSearchPaginated($criterion, $search, $status));
    }
}
