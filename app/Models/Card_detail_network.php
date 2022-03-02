<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Card_detail_network extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $guarded=[];


    public function cards()
    {
        return $this->hasMany('App\Models\Card','id','card_id');
    }

    public function social_network()
    {
        return $this->hasOne('App\Models\NetworkSocial','id','network_social_id');
    }
    /**
    * @return bool
    */
   public function isActive()
   {
       return $this->status;
   }

   /**
    * @param $query
    * @param bool $status
    *
    * @return mixed
    */
   public function scopeActive($query, $status = true)
   {
       return $query->where('status', $status);
   }
}
