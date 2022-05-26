<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    

    protected $table = 'log_activity';

    protected $fillable = [
        'subject', 'url', 'method', 'ip', 'agent', 'user_id'
    ];
}
