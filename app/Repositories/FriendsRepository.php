<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Repositories\ResgisterUserRepository;
use App\Models\Friends;
use App\Models\Card;
use App\Models\ViewCards;
use App\Models\User;
use App\Models\NetworkSocial;
use App\Models\text_style;
use App\Models\Themes;
use App\Models\Card_detail;
use App\Models\Cards_items;
use App\Models\Card_detail_network;
use App\Models\Cards_style_detail;
use App\Models\CardUserDetail;
use App\Models\Background_image;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProviderRepository.
 */
class FriendsRepository 
{
    /**
     * ProviderRepository constructor.
     *
     * @param  Providers  $model
     */
    public function __construct(Friends $model, Card $cards, Card_detail_network $card_detail_network,ViewCards $view_cards,ResgisterUserRepository $ResgisterUserRepository)
    {
        $this->model = $model;
        $this->cards = $cards;
        $this->views = $view_cards;
        $this->card_detail_network = $card_detail_network;
        $this->ResgisterUserRepository = $ResgisterUserRepository;
    }
    
    public function take_user_friend_ids($search){
        $users = User::where('name', 'like', '%'. $search . '%')->get();
        $ids = array();

        foreach ($users as $user) {
            array_push($ids,$user->id);
        }

        return $ids;
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getSearchPaginated($criterion, $search,$status): LengthAwarePaginator
    {
      
              $rg = (strlen($criterion) > 0 &&  strlen($search) > 0) 
              ? $this->model->whereIn('user_friend_id',FriendsRepository::take_user_friend_ids($search))->where('user_id',Auth::user()->id)
              : $this->model->where('id','>',0)->where('user_id',Auth::user()->id);
              
              switch ($status) {
                  case 1:
                      $rg;
                  break;
                  case 'D':
                      $rg->onlyTrashed();
                  break;
          } 

              $Card = $rg->orderBy('id', 'desc')->paginate(10);
                    return $Card;
    }
    /**
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return Providers
     */
    public function create($id)
    {
        $cardData = $this->cards->find($id);
        return DB::transaction(function () use ($cardData) {

            $friend = $this->model::create([
                'user_id' =>Auth::user()->id,
                'user_friend_id' =>$cardData['user_id'],
                'card_id' =>$cardData['id'],
            ]);
            if($friend) {
                   
                            return $friend;
            }

            throw new GeneralException(__('There was an error created the Card.'));
        });
    }

    public function delete_item($id)
    {       
        $cardData = $this->cards->find($id);
        
        return DB::transaction(function () use ($cardData) {
                    $Bval = Friends::withTrashed()
                                    ->where('card_id',$cardData['id'])
                                    ->where('user_id',Auth::user()->id)
                                    ->first()
                                    ->trashed();
                if($Bval){
                    $friend = $this->model::withTrashed()->where('card_id',$cardData['id'])
                                    ->where('user_friend_id',$cardData['user_id'])
                                    ->where('user_id',Auth::user()->id)
                                    ->restore();
                    $b=4;
                }else{
                    $friend = $this->model::where('card_id',$cardData['id'])
                                    ->where('user_friend_id',$cardData['user_id'])
                                    ->where('user_id',Auth::user()->id)
                                    ->delete();
                    $b=3;
                }
                return $b;

                throw new GeneralException(__('Error update of keypl detail.'));

        });
    }
    /**
     * @param Providers  $Provider
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Provider
     */
    public function update($Card_id,$location, array $data,$image,$path): Card
    { 
        $Card = $this->model->find($Card_id);
        $Card_style = Cards_style_detail::where('card_id',$Card_id)->first();
        return DB::transaction(function () use ($Card, $data,$location,$Card_style,$Card_id,$image,$path) {
            if ($Card->update([
                'location' => $location,
                'title' => $data['title'],
                'subtitle' => $data['subtitle'],
                'large_text' => $data['large_text'],
                'background_image_id' => $data['background'],
                'color' => $data['color'],
                'img_name' => $image,
                'img_path' => $path,
            ])) {
                $Card_style->update([
                'shape_image'=>$data['shape_image'],
                'head_orientation'=>$data['head_orientation'],
                'shape'=>0,
                'outline'=>0
                ]);
                if(isset($data['networks']))
                {
                    $Card_network = $this->card_detail_network::where('card_id', $Card_id)->delete();
                    foreach ((array)$data['networks'] as $network) {
                        $ns = json_decode($network);
                           foreach ($ns as $key) {
                            if($key->link != ''){
                                $Card_facebook = $this->card_detail_network::create([
                                    'card_id' => $Card->id,
                                    'network_social_id' => $key->ns_id,
                                    'url' => $key->link,
                                ]);
                            }
                           }
                    }
                    
                }

                return $Card;
            }

            throw new GeneralException(__('There was an error updating the Card.'));
        });
    }

  
}