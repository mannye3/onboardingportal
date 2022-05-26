<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class InstitutionPendealer extends Model
{
    
    protected $connection = 'sqlsrv2';

    protected $table = 'tblInstitution';


    public function institutiontype()
    {
        // $this->hasOne('App\Phone', 'foreign_key', 'local_key');

      return $this->belongsTo('App\Models\InstitutionTypePendealer', 'InstitutionType', 'InstTypeRef');
      //    $this->hasMany(InstitutionPendealer::class, 'InstitutionCode', 'DealerCode');
      //    $this->belongsTo(InstitutionPendealer::class, 'DealerCode' , 'InstitutionCode',);
      //  return $this->belongsTo('App\Models\InstitutionPendealer', 'InstitutionCode', 'DealerCode');
    }

    
}
