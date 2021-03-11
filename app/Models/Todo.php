<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id');
  }

public function event()
{
  return $this->belongsTo('App\Models\Event', 'event_id');
}


}
