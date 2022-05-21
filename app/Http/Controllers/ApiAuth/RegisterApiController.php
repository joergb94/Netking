<?php

namespace App\Http\Controllers\ApiAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ResgisterUserRepository;


class RegisterApiController extends Controller
{
    public function __construct(ResgisterUserRepository $ResgisterUserRepository)
    {
        
        $this->ResgisterUserRepository = $ResgisterUserRepository;
    }

    public function create(Request $request)
    {
        $data = ['name' => $request->name, 'email' => $request->email, 'password'=> $request->password];
        $user = $this->ResgisterUserRepository->create($data);
        return response()->json(['user'=>$user,'token' => $user->createToken('null')->plainTextToken]);
    }
    
}
