<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    public $table ="participants";
    protected $fillable = [
        'user_id', 'act_id'
    ];
    public $timestamps = false;
}
