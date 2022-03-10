<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    protected $guarded=[];

    public function users()
    {
        return $this->hasMany('App\Models\User','id','user_id');
    }

    public function background_image()
    {
        return $this->hasOne('App\Models\Background_image','id','background_image_id');
    }

    public function card_network()
    {
        return $this->hasMany('App\Models\Card_detail_network','card_id','id');
    }

    public function card_styles()
    {
        return $this->hasMany('App\Models\Cards_style_detail','card_id','id');
    }

    public function card_user_details()
    {
        return $this->hasOne('App\Models\CardUserDetail','card_id','id');
    }
}
