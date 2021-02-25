<?php
# @Date:   2021-02-03T13:45:56+00:00
# @Last modified time: 2021-02-21T15:26:45+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


public function todos()
{
  return $this->hasMany('App\Models\Todo');
}

}
