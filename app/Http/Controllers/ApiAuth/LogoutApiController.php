<?php

namespace App\Http\Controllers\ApiAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutApiController extends Controller
{
    public function logoutDevice(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json('The Token has been delete');
    }
}
