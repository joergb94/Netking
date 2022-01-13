<?php
namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Card;
use App\Models\Card_detail;
use App\Models\Card_detail_network;
use App\Models\Cards_style_detail;
use App\Models\CardUserDetail;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileRepository {
    public function __construct(User $model, Membership $membership)
    {
        $this->model = $model;
        $this->membership = $membership;
    }

    public function getSearchPaginated($id)
    {
        $membership = $this->membership->where('user_id',$id)->get();
        return $membership;
    }
}