<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // protected $cast = ['daysOfWeek' => 'json'];
    protected $fillable = ['title', 'startRecur', 'endRecur', 'daysOfWeek'];
    // protected $guarded = [];
}
