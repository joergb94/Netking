<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];

    public function users()
    {
        return $this->hasMany('App\Models\User','user_id','id');
    }

    public function background_image()
    {
        return $this->hasOne('App\Models\Background_image','id','background_image_id');
    }
    public function card_network()
    {
        return $this->hasMany('App\Models\Card_detail_network','card_id','id');
    }

  
}
