<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Membership;
use App\Models\Friends;
use App\Repositories\ProfileRepository;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct(ProfileRepository $repository)
    {
        $this->repository = $repository;
        $this->menu_id = 4;
        $this->module_name = 'Profile';
        $this->text_module = ['Created', 'Updated', 'Deleted', 'Restored', 'Actived', 'Deactived'];
    }

    public function index(Request $request)
    {
        $data = $this->repository->getSearchPaginated(Auth::user()->id);
        if($request->ajax())
        {
            return response()->json($data);
        }
        return response()->json($data);
    }
}
