<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'message',
        'image',
        'fk_poster_id',
        'name',
        'start_date',
        'end_date',
        'facebook',
        'slack',
        'google_calendar'
    ];
}
