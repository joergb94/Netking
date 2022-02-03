<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Card;
use App\Models\ViewCards;
use App\Models\Card_detail;
use App\Models\Card_items;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProviderRepository.
 */
class HomeRepository 
{
    /**
     * ProviderRepository constructor.
     *
     * @param  Providers  $model
     */
    public function __construct(Card $card,ViewCards $view_cards)
    {
        $this->card = $card;
        $this->views = $view_cards;
    }

    public function keypls($search){
            $data = $this->card->select(DB::raw("(scan_qr + get_link) as views"),'id','title', 'subtitle');
            if(strlen($search) > 0) {

                    $data->where('title', 'like', '%'. $search . '%');
            }
          
            $rg = $data->orderBy('views', 'desc')->paginate(10);

            return $rg;

        
    }

          /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getSearchPaginated($search)
    {
                    $user = Auth::user();
                    $data['cards'] = $this->card->where('user_id',$user->id)->count();
                    $data['qr_views'] = $this->views->where('user_id',$user->id)->count();
                    $data['link_views'] = $this->views->where('user_id',$user->id)->count();
                    $data['keypls'] = HomeRepository::keypls($search);
            return $data;
    }



}
