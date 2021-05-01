<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public $table ="activities";

    protected $fillable = ['activity_name', 'activity_type','activity_category', 'activity_year', 'activity_semester'];

    public $timestamps = false;

    protected $guarded = [];

    public function users(){
        return $this->belongsToMAny('App\User');
    }
}
