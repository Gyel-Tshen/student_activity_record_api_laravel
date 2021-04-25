<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    public $table ="participants";
    protected $fillable = [
        'name', 'email', 'course', 'student_no','activity_name', 'activity_type','activity_category', 'activity_date'
    ];
    public $timestamps = false;
}
