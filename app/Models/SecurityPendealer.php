<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class SecurityPendealer extends Model
{
    

    protected $connection = 'sqlsrv2';

    protected $table = 'tblSecurity';
}
