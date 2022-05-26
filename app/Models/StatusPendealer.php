<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class StatusPendealer extends Model
{
    

    protected $connection = 'sqlsrv2';

    protected $table = 'tblTransactionStatus';
}
