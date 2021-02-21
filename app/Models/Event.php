<?php
# @Date:   2021-02-03T13:45:56+00:00
# @Last modified time: 2021-02-07T12:54:31+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


public function todos()
{
  return $this->hasMany('App\Models\Todo', 'user_id');
}

public function users()
{
    return $this->belongsToMany('App\Models\User', 'user_event');
}
}
