<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class text_style extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

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
