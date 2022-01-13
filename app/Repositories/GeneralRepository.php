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
        $maxCard = Membership::where('user_id',Auth::user()->id)->sum('quantity');
        $total_cards = Card::where('user_id',Auth::user()->id)->count();
        $status = ($total_cards >= $maxCard)? false : true;
        
        return $status;
    }
}