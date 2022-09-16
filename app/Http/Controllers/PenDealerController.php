<?php

namespace App\Http\Controllers;

use session;
use DateTime;
use Carbon\Carbon;
use App\Models\User;
use App\Models\RfQMonitor;
use Illuminate\Http\Request;
use App\Models\StatusPendealer;
use App\Models\SecurityPendealer;
use App\Models\TBillsTransaction;
use App\Models\TBondsTransaction;
use App\Helpers\InstitutionHelper;
use Illuminate\Support\Facades\DB;
use App\Models\InstitutionPendealer;
use App\Models\TransactionPendealer;


class PenDealerController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:post-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:post-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }

   
    public function index(InstitutionHelper $InstitutionHelper)

    {

      



         $product =  DB::connection('sqlsrv2')->table('tblTransaction')
        ->join('tblSecurity', 'tblTransaction.SecurityCode', '=', 'tblSecurity.SecurityRef')
        ->join('tblProduct', 'tblSecurity.SecurityType', '=', 'tblProduct.ProductRef')
        ->select('tblProduct.ProductCode')
        ->selectRaw("COUNT(*) as count")
        ->groupBy('tblSecurity.SecurityType',  'tblProduct.ProductCode')
       // ->where('tblTransaction.SecurityCode', $value)
        ->get();


            $prod_name = [];
            $prod_value = [];

        foreach ($product as $key => $value) {
        // $value->SecurityCode;
        array_push($prod_name,$value->ProductCode);
        array_push($prod_value,$value->count);
        }

    




          $run =  DB::connection('sqlsrv2')->table('tblTransaction')
        ->join('tblSecurity', 'tblTransaction.SecurityCode', '=', 'tblSecurity.SecurityRef')
        ->select('tblTransaction.SecurityCode', 'tblSecurity.SecurityCode')
        ->selectRaw("COUNT(*) as count")
        ->orderBy('count', 'desc')
        ->groupBy('tblTransaction.SecurityCode', 'tblSecurity.SecurityCode')
        ->limit(10)
        ->get();


                    $sec_name = [];
                    $sec_value = [];

                foreach ($run as $key => $value) {
                // $value->SecurityCode;
                array_push($sec_name,$value->SecurityCode);
                array_push($sec_value,$value->count);
                }

      

        
      

      



 


        
        $start_of_year = date('Y-m-d',strtotime('first day of january'));
        $current_year_date = date('Y-m-d');

        $total_stettvalue = TransactionPendealer::sum('SettlementValue');
        $total_stettvalueYTD = TransactionPendealer::whereBetween('Timestamp', [$start_of_year, $current_year_date])->sum('SettlementValue');

       

                

                 $top_securities = DB::connection('sqlsrv2')->select("SELECT tblTransaction.SecurityCode ,COUNT(*) AS Security_count
                                    FROM tblTransaction
                                    GROUP BY tblTransaction.SecurityCode
                                    ORDER BY COUNT(*) DESC ");

      
        
            $pfachart =  DB::connection('sqlsrv2')->table('tblTransaction')
            ->join('tblInstitution', 'tblTransaction.DealerCode', '=', 'tblInstitution.InstitutionCode')
            ->join('tblInstitutionType', 'tblInstitutionType.InstTypeRef', '=', 'tblInstitution.InstitutionType')
            ->select( 'tblTransaction.Timestamp','tblTransaction.FaceValue', 'tblInstitution.InstitutionCode')
            ->where('tblInstitutionType.InstType', 'Pension Fund Administrators')
            ->get();


            // $users = TransactionPendealer::select(DB::raw("COUNT(*) as count"))
            //     ->whereYear('Timestamp', date('Y'))
            //     ->groupBy(DB::raw("Month(Timestamp)"))
            //     ->pluck('count');


     

        return view('pendealer.index', 
        compact('total_stettvalue','total_stettvalueYTD','top_securities','sec_name','sec_value', 'prod_name', 'prod_value','pfachart'));
    }



    public function pendealer_tran()
    
    {
      
        $TranStatus = StatusPendealer::all();
        $pendealers = TransactionPendealer::all();
        //$pendealers = TransactionPendealer::limit(200)->get();
        // $pendealers = TransactionPendealer->limit(10)->get();
        return view('pendealer.pendealer_trades', compact('pendealers','TranStatus'));
    }



     public function pendealer_tranresult(Request $request)
     {

         $TranStatus = StatusPendealer::all();

                    $datefrom = $request['datefrom'];
                    $dateto = $request['dateto'];
                    $status = $request['transtatus'];

                    session(['datefrom' => $datefrom]);
                    session(['dateto' => $dateto]);
                    session(['status' => $status]);

                $datefrom  =  session('datefrom');
                $dateto  =  session('dateto');
                $status  =  session('status');

                                   
                $trade_report = DB::connection('sqlsrv2')->select("SELECT TOP 200 RefNo, Timestamp , DealDate, DealerCode, DealerUser, DealerAction, CounterPartyCode, CounterPartyUser, CounterPartyAction, TradeTypeID, TransactionType, SecurityCode, FaceValue, Bid, Ask, DealRate, SettlementDateType, SettlementDate, Yield, AccruedInterest, 
                SettlementValue, SettPrice, Status AS tranStatus, ActionDate, ConfirmationID, Broker AS tranBroker, AppID, SettlementStatus
                FROM   tblTransaction
              
                WHERE  DealDate BETWEEN '$datefrom' AND '$dateto' AND Status = '$status'
               
                ");

                                   
   
                    return view('pendealer.pendealer_trades_search', compact('trade_report','TranStatus'));
    
                                 }

                                 public function pendealer_pfaTran()
    
                                 {

                                 



                                    $pfas = DB::connection('sqlsrv2')->select("SELECT *, tblInstitutionType.InstTypeRef, tblInstitutionType.InstType FROM tblInstitution 
                                    INNER JOIN  tblInstitutionType
                                    ON  tblInstitution.InstitutionType =  tblInstitutionType.InstTypeRef 
                                    WHERE InstitutionType = 3 AND status = 'A' ");

                                    $counterparties = DB::connection('sqlsrv2')->select("SELECT *, tblInstitutionType.InstTypeRef, tblInstitutionType.InstType FROM tblInstitution 
                                    INNER JOIN  tblInstitutionType
                                    ON  tblInstitution.InstitutionType =  tblInstitutionType.InstTypeRef 
                                    WHERE InstitutionType = 1 AND status = 'A' ");

                                
                                     $securities = SecurityPendealer::all();
                                     $pendealers = TransactionPendealer::all();
                                     
                                    
                                     
                                     return view('pendealer.pendealer_pfatrans', compact('pfas','counterparties','securities'));
                                 }




                    public function pendealer_pfaTran_tbil(Request $request)
                     {

                            $datefromTbills = $request['datefromTbills'];
                            $dateto = $request['dateto'];
                            $pfacodeTbills = $request['pfacodeTbills'];
                            $counterpartycodeTbills = $request['counterpartycodeTbills'];

                            $Tbills = TBillsTransaction::select("*")
                            ->where("SettlementDate", $datefromTbills)
                            ->where("DealerCode", $pfacodeTbills)
                            ->where("CounterpartyCode", $counterpartycodeTbills)
                            ->get();

                              $response['data'] = $Tbills;
                              return response()->json($response);
    
                                 }




                                 public function pendealer_pfaTran_bond(Request $request)
                                 {
            
                                        $datefromBonds = $request['datefromBonds'];
                                        $dateto = $request['dateto'];
                                        $pfacodeBonds = $request['pfacodeBonds'];
                                        $counterpartycodeBonds = $request['counterpartycodeBonds'];
            
                                        $Bonds = TBondsTransaction::select("*")
                                        ->where("SettlementDate", $datefromBonds)
                                        ->where("DealerCode", $pfacodeBonds)
                                        ->where("CounterpartyCode", $counterpartycodeBonds)
                                        ->get();
                                  
                                       
                                          $response['data1'] = $Bonds;
                                          return response()->json($response);
                
                                             }    
                                             

                                             public function pendealer_pfaTran_frq(Request $request)
                                             {
                        
                                                    $datefromRFA = $request['datefromRFA'];
                                                    $pfaRFA = $request['pfaRFA'];
                                                    $counterpartyRFA = $request['counterpartyRFA'];
                                                    $SecurityCodeRFA = $request['SecurityCodeRFA'];
                                                    $RfQRFA = $request['RfQRFA'];


                        
                                                    $RFA = RfQMonitor::select("*")
                                                    ->where("ActionDate", $datefromRFA)
                                                    ->where("DealerID", $pfaRFA)
                                                    ->where("CounterPartyID", $counterpartyRFA)
                                                    ->where("SecurityCode", $SecurityCodeRFA)
                                                    ->where("RfQRef", $RfQRFA)
                                                    ->get();
                        
                                                      $response['data_RFA'] = $RFA;
                                                      return response()->json($response);
                            
                                                         }
                                             

              public function apichart()
               {
               

                 

              //    return  $test->toDateString();

                //return new DateTime();

                //->groupBy(DB::raw("Month(Timestamp)"))
                 $pfachart_sec =  DB::connection('sqlsrv2')->table('tblTransaction')
                ->join('tblInstitution', 'tblTransaction.DealerCode', '=', 'tblInstitution.InstitutionCode')
                ->join('tblInstitutionType', 'tblInstitutionType.InstTypeRef', '=', 'tblInstitution.InstitutionType')
                ->select('tblTransaction.Timestamp','tblTransaction.FaceValue','tblTransaction.DealerCode')
                ->where('tblInstitutionType.InstTypeRef', 3)
                ->get();


                $chart1 = [];
                $chart2 = [];

                foreach  ($pfachart_sec as $pfachart)
               {

                
                 $date = strtotime($pfachart->Timestamp);
                 $usi = (int)$pfachart->FaceValue;
                 $dealer = $pfachart->DealerCode;
               
                  $date *= 1000;
                   $chart2[] = [$date , $usi, $dealer];
                  //  //array_push($chart1, $chart2);
                  // $count = 0;
                  // $chart1[$count] = $chart2;

                  // $count ++;
                   

               }

               //$response['data'] = $chart2;
               return response()->json($chart2);
                       
              
                  

              }

                             
}