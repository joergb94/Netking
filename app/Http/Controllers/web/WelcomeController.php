<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index(Request $request){
        if (Auth::guest()){
            return view('welcome');
        }else{
            return view('welcome',['dm'=>accesUrl(Auth::user(),1)]);
        } 
    }
}
