<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ActivityUser extends Model
{
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    public $table = 'activity_user';

    protected $fillable = ['user_id', 'activity_id'];

    public $timestamps = false;
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */

}
