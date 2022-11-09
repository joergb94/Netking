<?php

namespace App\Http\Controllers\ApiAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\LoginRepository;

class LoginApiController extends Controller
{
    public function __construct(LoginRepository $LoginRepository)
    {
        $this->LoginRepository = $LoginRepository;
    }

    function loginDevice(Request $request) 
    {
        $data = $this->LoginRepository->login($request);
        return response()->json($data, 201);
    }

    function test(Request $request){
        return response()->json(true);
    }
}
