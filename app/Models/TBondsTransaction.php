<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class TBondsTransaction extends Model
{
    

    protected $connection = 'sqlsrv2';
    protected $table = 'vwTBondsTransactions';

    
}
