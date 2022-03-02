<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Card;
use App\Models\ViewCards;
use App\Models\ViewCardDetail;
use App\Models\Card_detail;
use App\Models\Card_items;
use App\Models\Card_detail_network;
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
    public function __construct(Card $card,ViewCards $view_cards,Card_detail_network $Card_detail_network,ViewCardDetail $ViewCardDetail)
    {
        $this->card = $card;
        $this->views = $view_cards;
        $this->Card_detail_network = $Card_detail_network;
        $this->ViewCardDetail = $ViewCardDetail;

    }

    public function keypls($search){
            $user = Auth::user();

            $card_details =Card_detail::where('card_item_id',1)->get(); 

            $data = $this->card->select(DB::raw("(SELECT card_details.item_data FROM card_details
                                                        WHERE card_details.card_id = cards.id
                                                        AND card_details.card_item_id = 1
                                                        LIMIT 1) as img"),
                                        DB::raw("(scan_qr + get_link) as views"),
                                        'id','title', 'subtitle');
            if(strlen($search) > 0) {

                    $data->where('title', 'like', '%'. $search . '%');
            }
        
            $rg =$data->where('user_id','!=',$user->id)->orderBy('views', 'desc')->paginate(10);

            return $rg;

        
    }

    public function keyplsViews($user){
            $views =[];
            $keypls = $this->card->where('user_id',$user->id)->get();
            foreach ($keypls as $key => $value) {
                array_push($views, $this->views->where('card_id',$value->id)->count());
            }

            return $views;
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
                    $data['qr_views'] = $this->views->where('user_id',$user->id)->where('type',1)->count();
                    $data['link_views'] = $this->views->where('user_id',$user->id)->where('type',2)->count();
                    $data['keypls'] = HomeRepository::keypls($search);
                    $data['keypls_views']=HomeRepository::keyplsViews($user);
    
            return $data;
    }

    public function keypls_ids($user){
        $dataids = [];
        $keypls = $this->card->where('user_id',$user->id)->get();
        foreach ($keypls as $keypl) {
                array_push($dataids,$keypl['id']);
        }

        return $dataids;
    }

    public function keyplsSocialViews($user){
        $views_socials = [];
        $labels = [];

        $socialsviews = $this->Card_detail_network->whereIn('card_id',HomeRepository::keypls_ids($user))->get();

        foreach ($socialsviews as $value) {
                $no = $this->ViewCardDetail->where('card_detail_network_id',$value->id)->count();
                array_push($views_socials,$no);  
                array_push($labels,$value['social_network']['name']);  
        }


        return ['views'=>$views_socials,'labels'=>$labels];
     }

}
