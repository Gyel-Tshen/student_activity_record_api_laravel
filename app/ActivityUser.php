<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Activity extends Model
{
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    public $table = 'activity_user';
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $fillable = [
        'user_id','activity_id'
    ];

}
