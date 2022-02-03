<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Card_detail;
use App\Mail\contactUs;
use Illuminate\Support\Facades\Mail;

class contacUsController extends Controller
{
    public function __construct()
    {
    }

    public function send_mail(Request $request,$id){
        if($request->ajax())
        {
            $mail = new contactUs($id,$request->input());
            $dataTo = Card_detail::find($id);
            Mail::to($dataTo->description)->send($mail);

            return response()->json(['flag'=>true]);
        }
    }
}
