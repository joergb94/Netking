<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Card;
use App\Models\ViewCards;
use App\Models\ViewCardDetail;
use App\Models\NetworkSocial;
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
        $this->colors = ['#3b5998','#3b5998',];

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
            $qr = $this->views->where('user_id',$user->id)->where('card_id',$value->id)->where('type',1)->count();
            $link = $this->views->where('user_id',$user->id)->where('card_id',$value->id)->where('type',2)->count();
            array_push($views,['qr'=>$qr,'link'=>$link,'keypl'=>$value->title]);
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

    public function keypls_network_ids($user){
        $dataids = [];
        $keypls = $this->Card_detail_network
                  ->whereIn('card_id',HomeRepository::keypls_ids($user))
                  ->get();
                  
        foreach ($keypls as $keypl) {
                array_push($dataids,$keypl['network_social_id']);
        }

        $result =array_unique($dataids);

        return $result;
    }

    public function keyplsSocialViews($user){
        $data = [];
        $keypls = $this->card->where('user_id',$user->id)->get();
        $networks = NetworkSocial::whereIn('id',HomeRepository::keypls_network_ids($user))->get();
        foreach ($keypls as $keypl) {

                $views_socials = [];
                $labels = [];
                foreach ($networks as $net) {
                  $netcard = $this->Card_detail_network->where('card_id',$keypl->id)->where('network_social_id',$net->id)->first();
                  $no = isset($netcard->id)?$this->ViewCardDetail->where('card_detail_network_id',$netcard->id)->count():0; 
                  array_push($views_socials,$no);

                }
                array_push($data,['cards'=>$keypl->title, 'views'=>$views_socials]); 
              
         }

         $result = ['data'=>$data, 'networks'=>$networks];

        return $result;
     }

}
