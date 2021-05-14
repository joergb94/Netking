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
        return $this->hasMany(' App\Models\User','user_id','id');
    }

  
}
