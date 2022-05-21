<?php
namespace App\Repositories;

use App\Exceptions\GeneralExeption;
use App\Models\Card;
use App\Models\Friends;
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
                'name'=>$data['name'],
                'last_name'=>$data['last_name'],
                'street'=>$data['street'],
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

    
    public function update_start(array $data,$id,$image,$path)
    {   
        $user = User::find($id);
        return DB::transaction(function () use($data,$user,$image,$path){

                if($user->update([
                        'name' => $data['name'],
                        'occupation'=>$data['occupation'],
                        'image'=>$image,
                        'path'=>$path
                    ])){
               
                        return $user;
                }
                
                
            });
    }
  

    public function get_user(){
        $user = Auth::user();
        $maxCard = Membership::where('user_id',Auth::user()->id)->sum('quantity');
        $total_cards = Card::where('user_id',Auth::user()->id)->count();
        $total_keypls = $maxCard - $total_cards;

       return ['data'=>$user, 'freeKeypls'=>$total_keypls, 'myKeypls'=>$total_cards];
    }



    public function getfriends()
    {
        $following = Friends::where('user_id',Auth::user()->id)->get();
        $followers = Friends::where('user_friend_id',Auth::user()->id)->get();

        $data = [
            'followers'=>[
                'people'=>$followers,
                'quantity'=>count($followers),
            ],
            'following'=>[
                'people'=>$following,
                'quantity'=>count($following),
            ],
        ];

        return $data;
    }
}