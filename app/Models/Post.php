<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Post extends Model
{
  // use Loggable;

    protected $fillable = [
        'title',
        'body',
    ];
}
