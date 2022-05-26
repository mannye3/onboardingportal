<?php

namespace App\Helpers;

use App\Models\StatusPendealer;
use App\Models\SecurityPendealer;
use Illuminate\Support\Facades\DB;
use App\Models\InstitutionPendealer;

class InstitutionHelper {
	public function getInstitutionNameCustomer($Dealercode)
	{
      	$institutionCustomer = InstitutionPendealer::where('InstitutionCode', $Dealercode)->first();
		return $institutionCustomer->InstitutionName ?? 'NULL';
	}


    public function getInstitutionNameDealer($CounterPartyCode)
	{
      	$institutionDealer = InstitutionPendealer::where('InstitutionCode', $CounterPartyCode)->first();
		return $institutionDealer->InstitutionName ?? 'NULL';
	}



    public function getSecurityName($SecurityCode)
	{
      	$security = SecurityPendealer::where('SecurityRef', $SecurityCode)->first();
		return $security->SecurityCode ?? 'NULL';
	}



    public function getTranStatus($status)
	{
      	$Transtatus = StatusPendealer::where('StatusRef', $status)->first();
		return $Transtatus->StatusCode ?? 'NULL';
	}


   

    public function getProductCode($value)
	{

        $product =  DB::connection('sqlsrv2')->table('tblTransaction')
        ->join('tblSecurity', 'tblTransaction.SecurityCode', '=', 'tblSecurity.SecurityRef')
        ->join('tblProduct', 'tblSecurity.SecurityType', '=', 'tblProduct.ProductRef')
        ->select('tblTransaction.SecurityCode', 'tblSecurity.SecurityRef','tblProduct.ProductCode', 'tblSecurity.SecurityType')
        ->where('tblTransaction.SecurityCode', $value)
        ->first();

		return $product->ProductCode ?? 'NULL';
	}
}

