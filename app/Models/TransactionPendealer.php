<?php

namespace App\Models;

use App\Models\InstitutionPendealer;
use Illuminate\Database\Eloquent\Model;


class TransactionPendealer extends Model
{
   

    protected $connection = 'sqlsrv2';

    protected $table = 'tblTransaction';



    public function test()
    {
        return $this->belongsTo('App\Models\InstitutionPendealer', 'DealerCode', 'institutionCode' );
    }

    // public function scopeDealerCode($Dealercode)
    // {
    //     return InstitutionPendealer::where('institutionCode', $Dealercode)->first()->name;
    // }


    // public function menuMenuCategories(){
    //     // if GS_menu_menu_categories has "the_id" instead of "id" as pk
    //     return $this->hasMany('MenuMenuCategory','item_id', 'the_id');
    // }


}
