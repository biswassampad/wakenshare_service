<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoutOutCommentsLikes extends Model
{
    protected $fillable=[
        'comment_id','owner_id','owner_name'
    ];
}
