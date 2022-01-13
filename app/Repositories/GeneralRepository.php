<?php
namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Card;
use App\Models\Card_detail;
use App\Models\Card_detail_network;
use App\Models\Cards_style_detail;
use App\Models\CardUserDetail;
use App\Models\Membership;
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
    public function purchase_transaction($transaction,$new_membership,$old_membershit,$id,$type_user_id)
    {
        $status = (isset($transaction))? $transaction : false;
        if($status)
        {
            $change = Membership::where('user_id',$id)
                ->where('type_membershit',$old_membershit)
                ->first();
            $type_user = Type_user::find($type_user_id);
               return DB::transaction(function () use ($change, $new_membership,$type_user){
                    if(
                        $change->update([
                            'type_user_id' => $type_user->id,
                            'quantity' => $type_user->max_cards,
                            'type_membership_id' => $new_membership
                        ])
                    ){}
                });
        }
    }
}