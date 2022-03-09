<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Card;
use App\Models\Membership;
use App\Models\Friends;
use App\Models\Type_membership;
use App\Repositories\ProfileRepository;
use App\Repositories\GeneralRepository;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct(ProfileRepository $ProfileRepository, GeneralRepository $generalRepository)
    {
        $this->ProfileRepository = $ProfileRepository;
        $this->generalRepository =$generalRepository;
        $this->menu_id = 4;
        $this->module_name = 'Profile';
        $this->text_module = ['Created', 'Updated', 'Deleted', 'Restored', 'Actived', 'Deactived'];
    }

    public function index(Request $request)
    {
        $data = $this->ProfileRepository->getSearchPaginated(Auth::user()->id);
        $follow = $this->ProfileRepository->getfriends();
        $keypls = $this->ProfileRepository->get_user();

        if($request->ajax())
        {
            return view('Profile.items.contentProfile',['data' => $data,
                                                        'follow'=>$follow, 
                                                        'keypls'=>$keypls,
                                                        'dm' => accesUrl(Auth::user(), $this->menu_id)
                                                    ]);
        }

        return view('Profile.index',['data' => $data,
                                     'follow'=>$follow,
                                     'keypls'=>$keypls,
                                     'dm' => accesUrl(Auth::user(), $this->menu_id)]);
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
            return view('Profile.edit',$this->ProfileRepository->get_user());
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
            $nameImg = $user->image;
            $file_path = $user->path;
        }
        $data = $this->ProfileRepository->update($request->input(),$id,$nameImg,$file_path);
        $membership = Membership::where('user_id',$id)->with('type_memberships')->get();
        return response()->json(Answer(
            $data['id'],
            $this->module_name,
            $this->text_module[1],
            "success",
            'yellow',
            '1'
        ));
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

    public function renovate(Request $request,$id)
    {
        $data = $this->generalRepository->renovate($id);
        return response()->json($data);
    }
}
