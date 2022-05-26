<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class TBillsTransaction extends Model
{
    
    protected $connection = 'sqlsrv2';
    protected $table = 'vwTBillsTransactions';

    
}
