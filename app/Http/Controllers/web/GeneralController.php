<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Repositories\HomeRepository;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    public function get_user(Request $request){

        if($request->ajax()){
            return response()->json(['user'=>Auth::user()]);
        }
    }

    public function get_start(Request $request){
        return view('getstart.index');
    }
}
