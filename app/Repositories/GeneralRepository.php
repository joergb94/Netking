<?php
namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Card;
use App\Models\Card_detail;
use App\Models\Card_detail_network;
use App\Models\Cards_style_detail;
use App\Models\CardUserDetail;
use App\Models\Membership;
use App\Models\Type_membership;
use App\Models\Type_user;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GeneralRepository {
   public function  __construct(Card $Card, Card_detail $Card_detail)
    {
        $this->Card = $Card;
        $this->Card_detail = $Card_detail;
    }

    public function card_max()
    {
        $maxCard = Membership::where('user_id',Auth::user()->id)->sum('quantity');
        $total_cards = Card::where('user_id',Auth::user()->id)->count();
        $status = ($total_cards >= $maxCard)? false : true;
        
        return $status;
    }
    public function purchase_transaction($transaction,$new_membership,$id)
    {
        $status = (isset($transaction))? $transaction : false;
        if($status)
        {
            $change = Membership::where('user_id',$id)
                ->whereNotIn('type_membership_id',[2])
                ->first();
            $num_cards = Type_membership::find($new_membership);
               return DB::transaction(function () use ($change, $new_membership,$num_cards){
                    if(
                        $change->update([
                            'quantity' => $num_cards->quantity,
                            'type_membership_id' => $new_membership
                        ])
                    ){
                        return true;
                    }
                    throw new GeneralException(__('There was an error updating the Membership.'));
                });
        }
    }
    public function purchase_extra_transaction($transaction,$new_membership,$user)
    {
        $status = (isset($transaction))? $transaction : false;
        if($status)
        {
            $num_cards = Type_membership::find($new_membership);
               return DB::transaction(function () use ($new_membership,$num_cards,$user){
                    if(
                        Membership::create([
                            'user_id'=> $user->id,
                            'type_user_id' => $user->type_users->id,
                            'quantity' => $num_cards->quantity,
                            'type_membership_id' => $new_membership
                        ])
                    ){
                        return true;
                    }
                    throw new GeneralException(__('There was an error updating the Membership.'));
                });
        }
    }
}