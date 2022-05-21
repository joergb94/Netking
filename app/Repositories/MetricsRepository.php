<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Repositories\ResgisterUserRepository;
use App\Repositories\CardsRepository;
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
class MetricsRepository 
{
    /**
     * ProviderRepository constructor.
     *
     * @param  Providers  $model
     */
    public function __construct(Card $model, ViewCardDetail $ViewCardDetail ,Friends $Friends, Card_detail_network $card_detail_network,ViewCards $view_cards,ResgisterUserRepository $ResgisterUserRepository,CardsRepository $CardsRepository)
    {
        $this->model = $model;
        $this->views = $view_cards;
        $this->ViewCardDetail = $ViewCardDetail;
        $this->CardsRepository = $CardsRepository;
        $this->Friends = $Friends;
        $this->card_detail_network = $card_detail_network;
        $this->ResgisterUserRepository = $ResgisterUserRepository;
        $this->buttons = ['','btn-fab-r','btn-rounded',''];
        $this->themes = [9,3, 7,0, 9];
        $this->months = array(1 => 'Jan.', 2 => 'Feb.', 3 => 'Mar.', 4 => 'Apr.', 5 => 'May', 6 => 'Jun.', 7 => 'Jul.', 8 => 'Aug.', 9 => 'Sep.', 10 => 'Oct.', 11 => 'Nov.', 12 => 'Dec.');
    }


    public function getSearch($search)
    {
        $data = [];
        $allData = Card::where('user_id',Auth::user()->id);
        
                if(strlen($search) > 0) {

                    $allData->where('title', 'like', '%'. $search . '%');
                }
               $rg =  $allData->get();

        foreach ($rg as $key => $card) {
            $card = $this->CardsRepository->show($card->id);
            $graphics = $this->CardsRepository->get_data_chart($card->id);
            array_push($data,['graphics'=>$graphics,'card'=>$card]);
        }
        return $data;
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