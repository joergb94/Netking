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
        return $this->hasMany('App\Models\User','user_id','id');
    }

    public function friends()
    {
        return $this->hasMany('App\Models\User','user_friend_id	','id');
    }


}
