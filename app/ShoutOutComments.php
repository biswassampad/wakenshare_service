<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoutOutComments extends Model
{
    protected $fillable=[
        'comment','content_id','owner_id','owner_name'
    ];
}
