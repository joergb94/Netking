<?php
namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Card;
use App\Models\Card_detail;
use App\Models\Card_detail_network;
use App\Models\Cards_style_detail;
use App\Models\CardUserDetail;
use App\Models\Membership;
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
        $membership = Membership::where('user_id',Auth::user()->id)
            ->where('type_user_id',Auth::user()->type_users->id)
            ->first();
        $extra = Membership::where('user_id',Auth::user()->id)
            ->where('type_membership_id',2)
            ->get();
        $extra_quantity = 0;
        if(isset($extra)){
            foreach($extra as $item)
            {
                $extra_quantity += $item->quantity;
            }    
            $total = $membership->quantity + $extra_quantity;
            $total_cards = Card::where('user_id',Auth::user()->id)->count();
            $status = ($total_cards >= $total)? false : true;
            return $status;
        }
        $total_cards = Card::where('user_id',Auth::user()->id)->count();
        $status = ($total_cards >= $membership->quantity)? false : true;
        return $status;
    }
}