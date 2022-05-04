<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Repositories\ResgisterUserRepository;
use App\Models\Card;
use App\Models\Friends;
use App\Models\ViewCards;
use App\Models\User;
use App\Models\NetworkSocial;
use App\Models\ViewCardDetail;
use App\Models\text_style;
use App\Models\Themes;
use App\Models\ThemeItems;
use App\Models\Card_detail;
use App\Models\Cards_items;
use App\Models\Card_detail_network;
use App\Models\Cards_style_detail;
use App\Models\CardUserDetail;
use App\Models\Background_image;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
    public function __construct(Card $model, ViewCardDetail $ViewCardDetail ,Friends $Friends, Card_detail_network $card_detail_network,ViewCards $view_cards,ResgisterUserRepository $ResgisterUserRepository)
    {
        $this->model = $model;
        $this->views = $view_cards;
        $this->ViewCardDetail = $ViewCardDetail;
        $this->Friends = $Friends;
        $this->card_detail_network = $card_detail_network;
        $this->ResgisterUserRepository = $ResgisterUserRepository;
        $this->buttons = ['','btn-fab-r','btn-rounded',''];
        $this->themes = [9,3, 7,0, 9];
        $this->months = array(1 => 'Jan.', 2 => 'Feb.', 3 => 'Mar.', 4 => 'Apr.', 5 => 'May', 6 => 'Jun.', 7 => 'Jul.', 8 => 'Aug.', 9 => 'Sep.', 10 => 'Oct.', 11 => 'Nov.', 12 => 'Dec.');
        $this->months = array(1 => 'Jan.', 2 => 'Feb.', 3 => 'Mar.', 4 => 'Apr.', 5 => 'May', 6 => 'Jun.', 7 => 'Jul.', 8 => 'Aug.', 9 => 'Sep.', 10 => 'Oct.', 11 => 'Nov.', 12 => 'Dec.');
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
      
              $rg = $this->model->select(DB::raw("(SELECT card_details.item_data FROM card_details
                                                WHERE card_details.card_id = cards.id
                                                AND card_details.card_item_id = 1
                                                LIMIT 1) as img"),
                                    DB::raw("(SELECT cards_style_details.background_color FROM cards_style_details
                                                WHERE cards_style_details.card_id = cards.id
                                                LIMIT 1) as background_color"),
                                    DB::raw("(scan_qr + get_link) as views"),
                                    'id',
                                    'title',
                                    'subtitle',
                                    'background_image_color',
                                    'img_name',
                                    'img_path')
                                    ->where('user_id',Auth::user()->id);

            if( (strlen($criterion) > 0 &&  strlen($search) > 0) ){
                $rg->where($criterion, 'like', '%'. $search . '%');
            }
              
            $Card = $rg->orderBy('id', 'desc')->paginate(5);
                    return $Card;
    }
    public function createCardDetail($id,$data){
        $theme_id = $data['theme']?$data['theme']:1;
        $datos = ThemeItems::where('theme_id',$theme_id)->get();
        return DB::transaction(function () use ($id,$datos) {
               

                    foreach ($datos  as $i => $detail) {
                        $Card =Card_detail::create([
                            'card_id'=>$id,
                            'card_item_id' =>$detail['item_id'],
                            'order'=>$detail['order'],
                        ]);
                    }
              
                    if(Card_detail::where('card_id',$id)->count() > 0){
                            return true;
                    }

                    throw new GeneralException(__('There was an error created the Card.'));


        });
    }
    /**
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return Providers
     */
    public function create(array $data,$image,$path)
    {
        return DB::transaction(function () use ($data,$image,$path) {
            $no = $this->model::where('user_id',$data['user_id'])->count();

            $Card = $this->model::create([
                'user_id' => $data['user_id'],
                'title' =>'Keypl'.($no+1),
                'location' => $data['location']?$data['location']:null,
                'themes_id' => $data['theme']?$data['theme']:1,
                'large_text' => $data['large_text']?$data['large_text']:null,
                'text_style_id'=>$data['text_style_id']?$data['text_style_id']:1,
                'background_image_id' =>$data['background'],
                'background_image_color' =>$data['background_image_color']?$data['background_image_color']:'#000000',
                'color' => $data['color']?$data['color']:'#fff',
                'img_name' => $image?$image:null,
                'img_path' => $path?$path:null,
                'img_base_64'=>$data['img_base_64']?$data['img_base_64']:NUll
            ]);
            if($Card) {
                    $Card_style = Cards_style_detail::create([
                        'card_id'=>$Card->id,
                        'shape_image'=>$data['shape_image']?$data['shape_image']:0,
                        'divs_shape'=>$data['divs_shape']?$data['divs_shape']:0,
                        'buttons_shape'=>$data['buttons_shape']?$data['buttons_shape']:0,
                        'head_orientation'=>$data['head_orientation']?$data['head_orientation']:0,
                        'shape'=>0,
                        'outline'=>0,
                        'background_color'=>strlen($data['background_color']) > 0?$data['background_color']:1
                    ]);

                    if($Card_style){

                            $CardDeatil = CardsRepository::createCardDetail($Card['id'],$data);
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
        
                            return $Card;
                    }

                throw new GeneralException(__('There was an error created the Card Style.'));
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
                'outline'=>0,
                'background_color'=>strlen($data['background_color']) > 0?$data['background_color']:1,
                'button_style'=>strlen($data['button_style']) > 0?$data['button_style']:0
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
                $friend = Auth::guest()
                        ?false
                        :$this->Friends::where('card_id',$id)
                              ->where('user_friend_id',$data['user_id'])
                              ->where('user_id',Auth::user()->id)
                              ->exists();
                              
                $actual_bg = $data->img_path.$data->img_name;
                $background = Background_image::all();
                $themes = Themes::all();
                $card_style = Cards_style_detail::where('card_id', $id)->first();
                $btn_shape = $this->buttons[$card_style->buttons_shape];
                $user = User::find($data['user_id']);
                $nsFree = NetworkSocial::all();
                $cardItems = Card_detail::where('card_id', $data['id'])->orderBy('order', 'asc')->get();
                $items = Cards_items::whereNotIn('id',[1,2,4,9])->get();
                $presentation = [];
                $text_styles = text_style::all();
                $text_font = text_style::find($data['text_style_id']);
                $ns_quantity = Card_detail_network::where('card_id', $data['id'])
                                                  ->where('deleted_at',null)
                                                  ->count();
                foreach ($nsFree as $ns) {
                    $inUse = Card_detail_network::where('network_social_id', $ns['id'])
                        ->where('card_id', $data['id'])
                        ->where('deleted_at',null)
                        ->first();
                    array_push($nsInUse, ['nsData' => $ns, 'nsUser' => $inUse,'card_id'=>$id]);
                }

                foreach ($cardItems as $ci) {
                    $card_item = Cards_items::where('id', $ci['card_item_id'])->exists()
                                    ?Cards_items::where('id', $ci['card_item_id'])->first()
                                    :NULL;
                    if($ci['card_item_id'] == 11){
                        array_push($presentation, $ci);
                    }else{
                        array_push($cardItemsDetail, ['item' =>$card_item, 'card_detail' => $ci]);
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
                            'ns_quantity'=>$ns_quantity,
                            'ns_default_free'=>$this->themes[$data['themes_id']],
                            'text_styles' => $text_styles,
                            'btn_shape'=>$btn_shape, 
                            'text_font'=>$text_font,
                            'themes'=>$themes,
                            'friend'=>$friend,
                            'items'=>$items,
                            'presentation'=>$presentation[0],
                            
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
                    if($card_item->card_item_id == 1){
                        $lastCard = $this->model->find($card_item->card_id);
                        $Card = $this->model->find($card_item->card_id)
                                ->update([
                                            'title' =>strlen($data['name']) > 0?$data['name']:$lastCard->title,
                                            'subtitle' =>$data['description']
                                        ]);

                        if($Card){
                            return $card_item;
                        }else{
                            throw new GeneralException(__('Error update of keypl detail.'));
                        }
                    }else{
                        return $card_item;  
                    }
                    
                }
                throw new GeneralException(__('Error update of keypl detail.'));

            });

    }

    public function update_card_detail_item_order($card_item_drag_id,$card_item_drop_id)
    {
            $card_item_drag = Card_detail::find($card_item_drag_id);
            $card_item_drop = Card_detail::find($card_item_drop_id);
            $last_order = $card_item_drag->order;
            $new_order = $card_item_drop->order;

            return DB::transaction(function () use ($card_item_drag,$card_item_drop,$new_order,$last_order) {
                if($card_item_drag->update([
                        'order'=>$new_order,
                ])){
                    if($card_item_drop->update([
                        'order'=>$last_order,
                     ])){
                         return $card_item_drag; 
                     }
                    
                }
                throw new GeneralException(__('Error update of keypl detail.'));

            });

    }
   
    public function update_card_detail_item_type($id,$item_id)
    {
            $card_item = Card_detail::find($id);
            $card_id = $card_item->card_id;
            return DB::transaction(function () use ($card_item,$item_id,$card_id) {
                if($card_item->update([
                        'card_item_id' =>$item_id,
                ])){
                        return $card_id;  
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

    public function create_views($id,$data)
    {
            return DB::transaction(function () use ($id,$data) {
                $cardData = $this->model->find($id);
                $views = $this->views::create([
                        'user_id'=>$cardData['user_id'],
                        'card_id'=>$id,
                        'type'=>$data,
                ]);

                if($views){

                    $qr = $this->views->where('card_id',$id)->where('type',1)->count();
                    $link = $this->views->where('card_id',$id)->where('type',2)->count();

                    $Card = $this->model->find($id)->update([
                        'scan_qr'=>$qr,
                        'get_link'=>$link,
                    ]);

                    if($Card){
                        return $Card;
                    }


                }
                throw new GeneralException(__('Error update of keypl detail.'));

            });

    }

    public function get_keypls($user)
    {
        $rg = $this->model->where('id','>',0)->where('user_id',$user->id)->where('deleted_at',NULL);
        $Card = $rg->orderBy('id', 'desc')->get();
        return $Card;
    }

    public function get_order($id){
       
       $order = Card_detail::where('card_id',$id)->orderBy('order', 'DESC')->get();
       $orderMax = Card_detail::where('card_id',$id)->count();
       $orderInuser = [];
       $orderFree = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
       $result =  [];
       foreach ($order as $o) {

            array_push($orderInuser,$o['order']);
          
       }

       foreach ($orderFree as $value){
                if(in_array($value, $orderInuser) == false){
                    array_push($result,$value);
                }
       }
       $dato = count($result) > 0? $result[0]:($orderMax+1);
       return $dato;
    }
    public function create_item($data){
        
        return DB::transaction(function () use ($data) {
           
            $cd = Card_detail::create([
                'card_id'=>$data['card_id'],
                'card_item_id'=>$data['card_item_id'],
                'name'=>'Example',
                'description'=>'Example',
                'order'=>CardsRepository::get_order($data['card_id']),
            ]);   

            if($cd){
                    return $cd;
            }   

            throw new GeneralException(__('Error create of keypl detail.'));

        });

    }

    public function create_views_details($id,$data)
    {
            return DB::transaction(function () use ($data) {
               
                $cardDetailData = Card_detail::find($data['id']);
                $cardData = $this->model::find($cardDetailData['card_id']);
                $views = $this->ViewCardDetail::create([
                        'user_id'=>$cardData['user_id'],
                        'card_id'=>$cardData['id'],
                        'card_detail_id'=>$data['id'],
                        'card_detail_network_id'=>$data['social']?$data['social']:NULL,
                ]);
         
                if($views){

                    if($data['id'] && $data['social']){
                        return [ 'result'=>Card_detail_network::find($data['social']), 'check' =>true];
                    }else{
                        return[ 'result'=>$cardDetailData, 'check' =>false];
                    }


                }
                throw new GeneralException(__('Error update of keypl detail.'));

            });

    }

    public function get_data_chart($id){

        $dataCharD = [];
        $dataCharW = [];
        $dataCharM = [];
        $dataCharY = [];
        $dataCharA = [];

        $dataLabelsD = [];
        $dataLabelsW = [];
        $dataLabelsM = [];
        $dataLabelsY = [];
        $dataLabelsA = [];
        
        $dbDate = Carbon::parse(Auth::user()->create_at);
        $diffYears = Carbon::now()->diffInYears($dbDate);

 

            //for day
            for ($i=0; $i < 24; $i++) { 
        
                    $hoursQ = Carbon::now()->startOfDay()->addHours($i)->addMinutes(59);
                    $hoursMQ =Carbon::now()->startOfDay()->addHours($i);
                    $quantity = $this->views::whereDate('created_at', '=',Carbon::now())
                                            ->whereTime('created_at', '<', $hoursQ )
                                            ->whereTime('created_at', '>',$hoursMQ)
                                            ->count();
                    
                    array_push($dataLabelsD,[$i+1]);
                    array_push($dataCharD,$quantity);
            }
            $day = ['labels'=>$dataLabelsD ,'data'=>$dataCharD, 'title'=>'Last 24 hours'];

            //for week
            for ($i=0; $i < 7; $i++) { 
                    $firstDate = Carbon::now()->startOfWeek()->addDays($i);
                    $quantity = $this->views::whereDate('created_at', '=', $firstDate)->count();
                    array_push($dataLabelsW,[substr($firstDate->format('l'),0,3)]);
                    array_push($dataCharW,$quantity);
            }
            $week = ['labels'=>$dataLabelsW ,'data'=>$dataCharW, 'title'=>'On Week'];

            //for month
            for ($i=0; $i < $dbDate->daysInMonth; $i++) { 
                        $firstDate = Carbon::now()->startOfMonth();
                        $dateQ = Carbon::now()->startOfMonth()->addDays($i);
                        $quantity = $this->views::whereDate('created_at', '=', $firstDate->addDays($i))->count();
                        array_push($dataLabelsM,[$i+1]);
                        array_push($dataCharM,$quantity);
            }
            $month = ['labels'=>$dataLabelsM ,'data'=>$dataCharM, 'title'=>'On '.Carbon::now()->format('F')];

            //for year
            for ($i=1; $i < $dbDate->month+1; $i++) { 
                    $quantity = $this->views::whereYear('created_at', '=', $dbDate->year)
                                            ->whereMonth('created_at', '=',$i)
                                            ->count();
                
                    array_push($dataLabelsY,[$this->months[$i]]);
                    array_push($dataCharY,$quantity);
            }
            $year = ['labels'=>$dataLabelsY ,'data'=>$dataCharY, 'title'=>'On '.Carbon::now()->year];
            
            //for all years
            for ($i=0; $i < $diffYears+1; $i++) {

                    $quantity = $this->views::whereYear('created_at', '=', $dbDate->year+$i)->count();
                    array_push($dataLabelsA,[$dbDate->year+$i]);
                    array_push($dataCharA,$quantity);
            }
            $all = ['labels'=>$dataLabelsA ,'data'=>$dataCharA, 'title'=>'All Years'];
            $result = [
                    'day'=>$day,
                    'week'=>$week,
                    'month'=>$month,
                    'year'=>$year,
                    'all'=>$all,
                ];
     
            return $result;
    }

    public function get_data_chart_api($id,$user){

        $dataCharD = [];
        $dataCharW = [];
        $dataCharM = [];
        $dataCharY = [];
        $dataCharA = [];

        $dataLabelsD = [];
        $dataLabelsW = [];
        $dataLabelsM = [];
        $dataLabelsY = [];
        $dataLabelsA = [];
        $userD = User::find($user);
        $dbDate = Carbon::parse($userD->create_at);
        $diffYears = Carbon::now()->diffInYears($dbDate);

 

            //for day
            for ($i=0; $i < 24; $i++) { 
        
                    $hoursQ = Carbon::now()->startOfDay()->addHours($i)->addMinutes(59);
                    $hoursMQ =Carbon::now()->startOfDay()->addHours($i);
                    $quantity = $this->views::whereDate('created_at', '=',Carbon::now())
                                            ->whereTime('created_at', '<', $hoursQ )
                                            ->whereTime('created_at', '>',$hoursMQ)
                                            ->count();
                    
                    array_push($dataLabelsD,[$i+1]);
                    array_push($dataCharD,$quantity);
            }
            $day = ['labels'=>$dataLabelsD ,'data'=>$dataCharD, 'title'=>'Last 24 hours'];

            //for week
            for ($i=0; $i < 7; $i++) { 
                    $firstDate = Carbon::now()->startOfWeek()->addDays($i);
                    $quantity = $this->views::whereDate('created_at', '=', $firstDate)->count();
                    array_push($dataLabelsW,[substr($firstDate->format('l'),0,3)]);
                    array_push($dataCharW,$quantity);
            }
            $week = ['labels'=>$dataLabelsW ,'data'=>$dataCharW, 'title'=>'On Week'];

            //for month
            for ($i=0; $i < $dbDate->daysInMonth; $i++) { 
                        $firstDate = Carbon::now()->startOfMonth();
                        $dateQ = Carbon::now()->startOfMonth()->addDays($i);
                        $quantity = $this->views::whereDate('created_at', '=', $firstDate->addDays($i))->count();
                        array_push($dataLabelsM,[$i+1]);
                        array_push($dataCharM,$quantity);
            }
            $month = ['labels'=>$dataLabelsM ,'data'=>$dataCharM, 'title'=>'On '.Carbon::now()->format('F')];

            //for year
            for ($i=1; $i < $dbDate->month+1; $i++) { 
                    $quantity = $this->views::whereYear('created_at', '=', $dbDate->year)
                                            ->whereMonth('created_at', '=',$i)
                                            ->count();
                
                    array_push($dataLabelsY,[$this->months[$i]]);
                    array_push($dataCharY,$quantity);
            }
            $year = ['labels'=>$dataLabelsY ,'data'=>$dataCharY, 'title'=>'On '.Carbon::now()->year];
            
            //for all years
            for ($i=0; $i < $diffYears+1; $i++) {

                    $quantity = $this->views::whereYear('created_at', '=', $dbDate->year+$i)->count();
                    array_push($dataLabelsA,[$dbDate->year+$i]);
                    array_push($dataCharA,$quantity);
            }
            $all = ['labels'=>$dataLabelsA ,'data'=>$dataCharA, 'title'=>'All Years'];
            $result = [
                    'day'=>$day,
                    'week'=>$week,
                    'month'=>$month,
                    'year'=>$year,
                    'all'=>$all,
                ];
     
            return $result;
    }
}