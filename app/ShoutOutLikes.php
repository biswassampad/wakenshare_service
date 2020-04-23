<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoutOutLikes extends Model
{
    protected $fillable=[
        'content_id','owner_id','owner_name'
    ];
}
