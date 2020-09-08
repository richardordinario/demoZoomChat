<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = [
        'meeting_uuid',
        'meeting_id',
        'topic',
        'agenda',
        'start_time',
        'join_url',
        'start_url',
    ];
}
