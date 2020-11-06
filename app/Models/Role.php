<?php
# @Date:   2020-11-06T14:16:17+00:00
# @Last modified time: 2020-11-06T14:31:44+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


    //the users that belong to the role
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
