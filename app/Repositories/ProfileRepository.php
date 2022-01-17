<?php
namespace App\Repositories;

use App\Exceptions\GeneralExeption;
use App\Models\Card;
use App\Models\Card_detail;
use App\Models\Card_detail_network;
use App\Models\Cards_style_detail;
use App\Models\CardUserDetail;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileRepository {
    public function __construct(User $model, Membership $membership)
    {
        $this->model = $model;
        $this->membership = $membership;
    }

    public function getSearchPaginated($id)
    {
        $membership = $this->membership->where('user_id',$id)->get();
        return $membership;
    }

    public function update(array $data,$id,$image,$path)
    {
        $user = User::find($id);
        return DB::transaction(function () use($data,$user,$image,$path){
            if($user->update([
                'email'=>$data['email'],
                'nickname'=>$data['nickname'],
                'phone'=>$data['phone'],
                'image'=>$image,
                'path'=>$path
            ])){
                return $user;
            }
            throw new GeneralExeption(__('Hubo un error actualizando el usuario'));
        });
    }
}