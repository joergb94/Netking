<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Friends extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $guarded=[];
    
    public function users()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function friends()
    {
        return $this->hasOne('App\Models\User','id','user_friend_id');
    }

    public function cards()
    {
        return $this->hasOne('App\Models\Card','id','card_id');
    }


}
