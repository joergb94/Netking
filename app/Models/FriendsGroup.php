<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;


class FriendsGroup extends Model implements Auditable
{   
    
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    protected $guarded=[];
    
    public function groups()
    {
        return $this->hasMany('App\Models\Group','id','group_id');
    }

    public function friends()
    {
        return $this->hasOne('App\Models\User','id','friend_id');
    }

      /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param $query
     * @param bool $status
     *
     * @return mixed
     */
    public function scopeActive($query, $status = true)
    {
        //changed 'active' to 'status'
        return $query->where('active', $status);
    }
}
