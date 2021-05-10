<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    public $table ="participations";

    protected $fillable = ['user_id', 'activity_id'];

    public $timestamps = false;

    //protected $guarded = [];


}
