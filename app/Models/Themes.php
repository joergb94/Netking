<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Themes extends Model
{
    use HasFactory;
    protected $guarded=[];


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
