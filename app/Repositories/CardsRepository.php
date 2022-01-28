<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Card;
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
class CardsRepository 
{
    /**
     * ProviderRepository constructor.
     *
     * @param  Providers  $model
     */
    public function __construct(Card $model, Card_detail_network $card_detail_network)
    {
        $this->model = $model;
        $this->card_detail_network = $card_detail_network;
        $this->buttons = ['','btn-fab-r','btn-rounded',''];
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
              ? $this->model->where($criterion, 'like', '%'. $search . '%')->where('user_id',Auth::user()->id)
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
    public function create(array $data,$location,$image,$path): Card
    {
        return DB::transaction(function () use ($data,$location,$image,$path) {
            $Card = $this->model::create([
                'location' => $location,
                'title' => $data['title'],
                'subtitle' => $data['subtitle'],
                'large_text' => $data['large_text'],
                'background_image_id' => $data['background'],
                'color' =>$data['color'],
                'img_name' => $image,
                'img_path' => $path,
            ]);
            $Card_style = Cards_style_detail::create([
                'card_id'=>$Card->id,
                'shape_image'=>$data['shape_image'],
                'head_orientation'=>$data['head_orientation'],
                'shape'=>0,
                'outline'=>0
            ]);
            $Card_user_Detail = CardUserDetail::create([
                'card_id' =>$Card->id,
                'about_me' => $data['description'],
                'phone' => $data['phone'],
                'cell_phone' => $data['cellphone'],
                'business' => $data['business'],
                'scholarship' => $data['scholarship'],
            ]);
            if(isset($data['networks']))
            {
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

            if ($Card) {
                return $Card;
            }

            throw new GeneralException(__('There was an error created the Card.'));
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

    public function update_asinc($Card_id, array $data,$image,$path)
    {  
        $Card = $this->model->find($Card_id);
        $Card_style = Cards_style_detail::where('card_id',$Card_id)->first();
        
        return DB::transaction(function () use ($Card, $data,$Card_style,$Card_id,$image,$path) {
            if ($Card->update([
                'location' => $data['location']?$data['location']:null,
                'themes_id' => $data['theme']?$data['theme']:$Card['themes_id'],
                'large_text' => $data['large_text']?$data['large_text']:null,
                'text_style_id'=>$data['text_style_id']?$data['text_style_id']:1,
                'background_image_id' =>$data['background'],
                'background_image_color' =>$data['background_image_color']?$data['background_image_color']:'#000000',
                'color' => $data['color']?$data['color']:'#fff',
                'img_name' => $image?$image:null,
                'img_path' => $path?$path:null,
                'img_base_64'=>$data['img_base_64']?$data['img_base_64']:$Card['img_base_64']
            ])) {
                $Card_style->update([
                'shape_image'=>$data['shape_image']?$data['shape_image']:0,
                'divs_shape'=>$data['divs_shape']?$data['divs_shape']:0,
                'buttons_shape'=>$data['buttons_shape']?$data['buttons_shape']:0,
                'head_orientation'=>$data['head_orientation']?$data['head_orientation']:0,
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

    /*
     * @param Providers $Provider
     * @param      $status
     *
     * @throws GeneralException
     * @return Provider
     */
     
    public function updateStatus($Card_id): Card
    {
        $Card = $this->model->find($Card_id);

        switch ($Card->active) {
            case 0:
                $Card->active = 1;
            break;
            case 1:
                $Card->active = 0;  
            break;
        }

        if ($Card->save()) {
            return $Card;
        }

        throw new GeneralException(__('Error updateStatus of Card.'));
    }

    public function deleteOrResotore($Card_id)
    {    
        $Bval = Card::withTrashed()->find($Card_id)->trashed();

        return DB::transaction(function () use ($Bval,$Card_id) {
         
          if($Bval){
            $Card = Card::withTrashed()->find($Card_id)->restore();
            $b=4;
        }else{
            $Card = Card::find($Card_id)->delete();
            $b=3;
        }

        if ($b) {
            return $b;
        }

        throw new GeneralException(__('Error deleteOrResotore of Card.'));

      });
    }
    public function show($id)
    {
        $Card = $this->model->find($id);
        return $Card;
    }

    public function get_data_keypl($id)
    {

                $nsInUse = [];
                $cardItemsDetail =[];
                $data = $this->model->find($id);
                $actual_bg = $data->background_image->description;
                $background = Background_image::all();
                $themes = Themes::all();
                $card_style = Cards_style_detail::where('card_id', $id)->first();
                $btn_shape = $this->buttons[$card_style->buttons_shape];
                $user = User::find($data['user_id']);
                $nsFree = NetworkSocial::all();
                $cardItems = Card_detail::where('card_id', $data['id'])->get();
                $text_styles = text_style::all();
                $text_font = text_style::find($data['text_style_id']);

                foreach ($nsFree as $ns) {
                    $inUse = Card_detail_network::where('network_social_id', $ns['id'])
                        ->where('card_id', $data['id'])
                        ->first();
                    array_push($nsInUse, ['nsData' => $ns, 'nsUser' => $inUse,'card_id'=>$id]);
                }

                foreach ($cardItems as $ci) {
                    $card_item = Cards_items::where('id', $ci['card_item_id'])->first();
                    if($card_item){
                        array_push($cardItemsDetail, ['item' => $card_item, 'card_detail' => $ci]);
                    }
                
                }
            
                return  [
                            'cardItems'=>$cardItemsDetail,
                            'data' => $data,
                            'backgrounds' => $background,
                            'actual_bg' => $actual_bg,
                            'user' => $user,
                            'card_style' => $card_style,
                            'ns' => $nsInUse,
                            'text_styles' => $text_styles,
                            'btn_shape'=>$btn_shape, 
                            'text_font'=>$text_font,
                            'themes'=>$themes,
                        ];
    }

    public function update_card_detail_item($id,$data)
    {
            $card_item = Card_detail::find($id);

            return DB::transaction(function () use ($card_item,$data) {
                if($card_item->update([
                        'name'=>$data['name'],
                        'description'=>$data['description'],
                        'item_data'=>$data['item_data'],
                ])){
                    return $card_item;
                }
                throw new GeneralException(__('Error update of keypl detail.'));

            });

    }
   

    public function delete_item($id)
    {
            return DB::transaction(function () use ($id) {
                $card_item = Card_detail::find($id)->delete();
                $b=3;
                return $id;

                throw new GeneralException(__('Error update of keypl detail.'));

            });
    }

}