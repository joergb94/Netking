<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
  public function user()
    {
        return $this->belongsTo('App\User','user_id','id')->withTrashed();
    }

  protected $table='audits';

  protected $primaryKey="id";

  protected $fillable=[
      'user_id',
      'event',
      'auditable_type',
      'auditable_id',
      'old_values',
      'new_values',
      'updated_at',
      'user_agent',
      'ip_address'
  ];
}