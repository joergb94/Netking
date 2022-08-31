<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Exceptions\GeneralException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CardsRepository;
use App\Repositories\FriendsRepository;
use App\Repositories\GeneralRepository;
use App\Repositories\MetricsRepository;
use App\Repositories\ResgisterUserRepository;
use App\Http\Requests\Cards\CardsRequest;
use App\Http\Requests\Cards\CardsIdRequest;
use App\Http\Requests\Cards\CardsUpdateRequest;
use App\Http\Requests\Cards\CardsStoreRequest;
use App\Models\Themes;
use App\Models\Friends;
use App\Models\Theme_detail;
use App\Models\Cards_items;
use App\Models\ViewCardDetail;
use App\Models\Card_detail;
use App\Models\NetworkSocial;
use App\Models\Cards_style_detail;
use App\Models\Card_detail_network;
use App\Models\User;
use App\Models\Background_image;
use App\Models\Card;
use App\Models\text_style;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GraphicsController extends Controller
{
    public function __construct(MetricsRepository $MetricsRepository, CardsRepository $CardsRepository, FriendsRepository $FriendsRepository, GeneralRepository $GeneralRepository,ResgisterUserRepository $ResgisterUserRepository)
    {
        $this->MetricsRepository = $MetricsRepository;
        $this->CardsRepository = $CardsRepository;
        $this->FriendsRepository = $FriendsRepository;
        $this->GeneralRepository = $GeneralRepository;
        $this->ResgisterUserRepository = $ResgisterUserRepository;
        $this->menu_id = 3;
        $this->module_name = 'Card';
        $this->text_module = ['Created', 'Updated', 'Deleted', 'Restored', 'Actived', 'Deactived'];
        $this->buttons = ['','btn-fab-r','btn-rounded',''];
        $this->themes = [9,3, 7,0, 9];
    }

    public function get_data_chart(Request $request)
    {   
        $search = trim($request->search);
        $data = $this->MetricsRepository->getSearch($search);
        return response()->json(['data' => $data,'account'=>Auth::user(),'dm' => accesUrl(Auth::user(), $this->menu_id)], 201);
    }

    public function get_data_chart_json(Request $request)
    {
        $data = [];
        $allData = Card::where('user_id',Auth::user()->id)->get();

        foreach ($allData as $key => $card) {
            $card = $this->CardsRepository->show($card->id);
            $graphics = $this->CardsRepository->get_data_chart($card->id);
            array_push($data,['graphics'=>$graphics,'card'=>$card]);
        }

        return response()->json($data, 201);
    } 
}
