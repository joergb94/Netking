<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Membership;
use App\Models\Friends;
use App\Models\Type_membership;
use App\Repositories\ProfileRepository;
use App\Repositories\GeneralRepository;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct(ProfileRepository $repository, GeneralRepository $generalRepository)
    {
        $this->repository = $repository;
        $this->generalRepository =$generalRepository;
        $this->menu_id = 4;
        $this->module_name = 'Profile';
        $this->text_module = ['Created', 'Updated', 'Deleted', 'Restored', 'Actived', 'Deactived'];
    }

    public function index(Request $request)
    {
        $data = $this->repository->getSearchPaginated(Auth::user()->id);
        if($request->ajax())
        {
            return view('Profile.index',['data' => $data, 'dm' => accesUrl(Auth::user(), $this->menu_id)]);
        }
        return view('Profile.index',['data' => $data, 'dm' => accesUrl(Auth::user(), $this->menu_id)]);
    }
    public function show_membership(Request $request)
    {
        if($request->ajax())
        {
            $memberships = Type_membership::all();
            return view('Profile.membershipModal',['memberships'=>$memberships]);
        }
    }

    public function purchase(Request $request, $id)
    {
        if($request->ajax())
        {
            $data = $this->generalRepository->purchase_transaction($request->status,$id,Auth::user()->id);
            return response()->json(Answer(
                1,
                $this->module_name,
                $this->text_module[1],
                "success",
                'yellow',
                '1'
            ));
        }
    }
    public function purchase_extra(Request $request, $id)
    {
        if($request->ajax())
        {
            $data = $this->generalRepository->purchase_extra_transaction($request->status,$id,Auth::user());
            return response()->json(Answer(
                1,
                $this->module_name,
                $this->text_module[1],
                "success",
                'yellow',
                '1'
            ));
        }
    }

    public function edit(Request $request)
    {
        if($request->ajax())
        {
            $user = Auth::user();
            return response()->json(['user'=>$user]);
        }
    }

    public function update(Request $request,$id)
    {
       if($request->ajax())
       {
        $user = User::find($id);
        if ($request['image']) {
            $image = $request->file('image');
            $nameImg = $image->getClientOriginalName();
            $file_path = '/images/user/profile/';
            $image->move(public_path() . '/images/user/profile/', $nameImg);
        } else {
            $nameImg = $user->img_name;
            $file_path = $user->img_path;
        }
        $data = $this->repository->update($request->input(),$id,$nameImg,$file_path);
        $membership = Membership::where('user_id',$id)->with('type_memberships')->get();
        return response()->json(['user'=>$data,'memberships'=>$membership,'answer'=>Answer(
            $data['id'],
            $this->module_name,
            $this->text_module[1],
            "success",
            'yellow',
            '1'
        )]);
       }
    }
    public function get_user(Request $request,$id)
    {
        if($request->ajax())
        {
            $membership = Membership::where('user_id',$id)->with('type_memberships')->get();
            $user = User::find($id);
            return response()->json(['user'=>$user,'memberships'=>$membership]);
        }
    }
}