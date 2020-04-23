<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoutOut extends Model
{
    protected $fillable = [
        'content','owner_id','owner_name'
    ];

}
