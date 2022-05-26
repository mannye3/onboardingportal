@extends('layouts.master')
@section('title') @lang('FMDQ-PenCom_Transactions') @endsection
@section('css')
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') FMDQ-PenCom @endslot
@slot('title') FMDQ-PenCom  PFA Transactions @endslot
@endcomponent

<link href="{{ URL::asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    
        <!-- Responsive datatable examples -->
        <link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    {{-- <div class="row"> 
        <div class="col-xl-3 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="text-muted mb-3">Total Buy</h6>
                            <h2 class="mb-0">$<span class="counter-value"
                                    data-target="243"></span><small
                                    class="text-muted fs-13">.10k</small></h2>
                        </div>
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-soft-danger text-danger fs-22 rounded">
                                <i class="ri-shopping-bag-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xl-3 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="text-muted mb-3">Total Sell</h6>
                            <h2 class="mb-0">$<span class="counter-value"
                                    data-target="658"></span><small
                                    class="text-muted fs-13">.00k</small></h2>
                        </div>
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-soft-info text-info fs-22 rounded">
                                <i class="ri-funds-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xl-3 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="text-muted mb-3">Today's Buy</h6>
                            <h2 class="mb-0">$<span class="counter-value"
                                    data-target="104"></span><small
                                    class="text-muted fs-13">.85k</small></h2>
                        </div>
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-soft-warning text-warning fs-22 rounded">
                                <i class="ri-arrow-left-down-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xl-3 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="text-muted mb-3">Today's Sell</h6>
                            <h2 class="mb-0">$<span class="counter-value" data-target="87"></span><small
                                    class="text-muted fs-13">.35k</small></h2>
                        </div>
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-soft-success text-success fs-22 rounded">
                                <i class="ri-arrow-right-up-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div> --}}
    <!--end row-->

    <div class="row">
        
        <!--end col-->
        <div class="col-xxl-3">
            <div class="card card-height-100">
                <div class="card-header">
                   
                    <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#Tbills" role="tab">
                                T-Bills
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#FGNBONDS" role="tab">
                                FGN BONDS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#RFQMonitor" role="tab">
                                RFQ Monitor
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#RFQSentFrequency" role="tab">
                                RFQ Sent Frequency
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#RFQDealtFrequency" role="tab">
                                RFQ Dealt Frequency
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-0">
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="Tbills" role="tabpanel">
                         
                            <br>
                            <center><h2>PFA Transactions - Treasury Bills</h2></center>
                           
                            <div class="p-3">
                               
                                
                                <div class="row">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>PFA :</label>
                                            <select required id="pfacodeTbills" name="pfacodeTbills" class="form-select">
                                                <option>Select PFA</option>
                                                @foreach($pfas as $pfa)
                                                <option   value="{{ $pfa->InstitutionCode }}">
                                                    {{$pfa->InstitutionName }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>Counterparty :</label>
                                            <select required id="counterpartycodeTbills" name="counterpartycodeTbills" class="form-select">
                                                <option>Select Counterparty</option>
                                                @foreach($counterparties as $counterparty)
                                                <option    value="{{ $counterparty->InstitutionCode }}">
                                                    {{$counterparty->InstitutionName }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>Date :</label>
                                            <input class="form-control" required id="datefromTbills" name="datefromTbills" type="text" placeholder="Enter Date"
                                            onfocus="(this.type='date')">
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>.</label></label>
                                            <button id="but_fetchallTbills"  class="btn btn-primary w-100">
                                                Submit</button>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="table-responsive">
                                <table  id="empTableTbills"   class="table nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; display: none">
                                <thead>
                                    <tr>
                                        <th>DealDate</th>
                                        <th>PFA</th>
                                        <th>Action</th>
                                        <th>CounterParty</th>
                                        <th>Action</th>
                                        <th>Instrument</th>
                                        <th>Deal Rate</th>
                                        <th>Yield</th>
                                        <th>Best Rate</th>
                                        <th>Sett. Date</th>
                                        <th>Sett. Value</th>
                                        <th>Sett.Price</th>
                                        <th>Face Value (₦'mm)</th>
                                        <th>Trade Type</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                </table>
                                    </div>

    

                                </div>
                           

                            
                                                                    
                             
                            </div>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="FGNBONDS" role="tabpanel">
                           
                            <br>
                            <center><h2>PFA Transactions - Bonds</h2></center>
                           
                            <div class="p-3">
                               
                                
                                <div class="row">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>PFA :</label>
                                            <select required id="pfacodeBonds" name="pfacodeBonds" class="form-select">
                                                <option>Select PFA</option>
                                                @foreach($pfas as $pfa)
                                                <option   value="{{ $pfa->InstitutionCode }}">
                                                    {{$pfa->InstitutionName }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>Counterparty :</label>
                                            <select required id="counterpartycodeBonds" name="counterpartycodeBonds" class="form-select">
                                                <option>Select Counterparty</option>
                                                @foreach($counterparties as $counterparty)
                                                <option   value="{{ $counterparty->InstitutionCode }}">
                                                    {{$counterparty->InstitutionName }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>Date :</label>
                                            <input required id="datefromBonds" name="datefromBonds" type="date" class="form-control" placeholder="Enter Date"
                                            onfocus="(this.type='date')"  >
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>.</label></label>
                                            <button id="but_fetchallBonds"  class="btn btn-primary w-100">
                                                Submit</button>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="table-responsive">
                                <table  id="empTableBonds"   class="table nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; display: none">
                                <thead>
                                    <tr>
                                        <th>DealDate</th>
                                        <th>PFA</th>
                                        <th>Action</th>
                                        <th>CounterParty</th>
                                        <th>Action</th>
                                        <th>Instrument</th>
                                        <th>Deal Rate</th>
                                        <th>Yield</th>
                                        <th>Best Rate</th>
                                        <th>Sett. Date</th>
                                        <th>Sett. Value</th>
                                        <th>Sett.Price</th>
                                        <th>Face Value (₦'mm)</th>
                                        <th>Trade Type</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                </table>
                                    </div>

    

                                </div>
                           

                            
                                                                    
                             
                            </div>
                        </div>
                        <div class="tab-pane" id="RFQMonitor" role="tabpanel">
                           
                            <br>
                            <center><h2>PFA Transactions - RFQ Monitor</h2></center>
                           
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>PFA :</label>
                                            <select required id="pfaRFA" name="pfaRFA" class="form-select">
                                                <option>Select PFA</option>
                                                @foreach($pfas as $pfa)
                                                <option   value="{{ $pfa->InstitutionCode }}">
                                                    {{$pfa->InstitutionName }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>Counterparty :</label>
                                            <select required name="counterpartyRFA" id="counterpartyRFA" class="form-select">
                                                <option>Select Counterparty</option>
                                                @foreach($counterparties as $counterparty)
                                                <option   value="{{ $counterparty->InstitutionCode }}">
                                                    {{$counterparty->InstitutionName }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div><!-- end col -->


                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>Security :</label>
                                            <select required name="SecurityCodeRFA" id="SecurityCodeRFA" class="form-select">
                                                <option>Select Security</option>

                                                @foreach($securities as $security)
                                                <option   value="{{ $security->SecurityCode }}">
                                                    {{$security->SecurityCode }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>RfQNo :</label>
                                            <input required placeholder="Enter RFQ Number" name="RfQRFA" id="RfQRFA" type="text" class="form-control" >
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>Date :</label>
                                            <input name="datefromRFA" id="datefromRFA" type="text" class="form-control" placeholder="Enter Date"
                                            onfocus="(this.type='date')"  >
                                        </div>
                                    </div><!-- end col -->



                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>.</label></label>
                                            <button id="but_fetchallRFA" class="btn btn-primary w-100">
                                                Submit</button>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="table-responsive">
                                        <table  id="empTableRFA"   class="table nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; display: none">
                                        <thead>
                                            <tr>
                                               
                                                <th>RfQ Ref. No</th>
                                                <th>Deal Date</th>
                                                <th>PFA</th>
                                                <th>CounterParty</th>
                                                <th>Instrument</th>
                                                <th>Face Valus</th>
                                                <th>Bid</th>
                                                <th>Offer</th>
                                                <th>Deal Rate</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                        </table>
                                            </div>

                                </div><!-- end row -->
                                
                             
                            </div>
                        </div>
                        <div class="tab-pane" id="RFQSentFrequency" role="tabpanel">
                           
                            <br>
                            <center><h2>PFA Transactions - RFQ Sent Frequency</h2></center>
                           
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>PFA :</label>
                                            <select class="form-select">
                                                @foreach($pfas as $pfa)
                                                <option   value="{{ $pfa->InstitutionName }}">
                                                    {{$pfa->InstitutionName }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>Start Date :</label>
                                            <input type="date" class="form-control" >
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>End Date :</label>
                                            <input type="date" class="form-control" >
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>.</label></label>
                                            <button type="button" class="btn btn-primary w-100">
                                                Submit</button>
                                        </div>
                                    </div><!-- end col -->

                                </div><!-- end row -->
                                
                             
                            </div>
                        </div>
                        <div class="tab-pane" id="RFQDealtFrequency" role="tabpanel">
                           
                            <br>
                            <center><h2>PFA Transactions - RFQ Dealt Frequency</h2></center>
                           
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>PFA :</label>
                                            <select class="form-select">
                                                @foreach($pfas as $pfa)
                                                <option   value="{{ $pfa->InstitutionName }}">
                                                    {{$pfa->InstitutionName }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>Start Date :</label>
                                            <input type="date" class="form-control" >
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>End Date :</label>
                                            <input type="date" class="form-control" >
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>.</label></label>
                                            <button type="button" class="btn btn-primary w-100">
                                                Submit</button>
                                        </div>
                                    </div><!-- end col -->

                                </div><!-- end row -->
                                
                             
                            </div>
                        </div>
                        <!--end tab-pane-->
                    </div>
                </div>

                
            </div>
        </div>
    
    </div>

    
  
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
   
    <script src="{{ URL::asset('/assets/libs/list.js/list.js.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></>
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <script src="{{ URL::asset('/assets/js/pages/crypto-buy-sell.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
       <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
      
       <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
       <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
       <script src="assets/libs/jszip/jszip.min.js"></script>
       <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
       <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
       <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
       <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
       <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
     
       <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
       <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

     
       <script src="assets/js/pages/datatables.init.js"></script> 
       <script src="assets/js/app.js"></script>
    
  

    <script type='text/javascript'>
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $(document).ready(function(){
 
      // Fetch all records Tbills
      $('#but_fetchallTbills').click(function(){
        var pfacodeTbills = $('#pfacodeTbills').val().trim();
        var counterpartycodeTbills = $('#counterpartycodeTbills').val().trim();
        var datefromTbills = $('#datefromTbills').val().trim();
       
 
         // AJAX GET request
         $.ajax({
           url: `pendealer_pfaTran_tbil?pfacodeTbills=${pfacodeTbills}&counterpartycodeTbills=${counterpartycodeTbills}&datefromTbills=${datefromTbills}`,
           type: 'get',
           dataType: 'json',
           success: function(response){
 
              createRows(response);
 
           }
         });
      });
   });
 
 
   function createRows(response){
      var len = 0;
      $('#empTableTbills tbody').empty(); // Empty <tbody>
      if(response['data'] != null){
         len = response['data'].length;
      }
 
      if(len > 0){
        for(var i=0; i<len; i++){
        
           var SettlementDate = response['data'][i].SettlementDate;
           var DealerCode = response['data'][i].DealerCode;
           var DealerAction = response['data'][i].DealerAction;
           var CounterpartyCode = response['data'][i].CounterpartyCode;
           var CounterPartyAction = response['data'][i].CounterPartyAction;
           var SecurityCode = response['data'][i].SecurityCode;
           var SecurityRef = response['data'][i].SecurityRef;
           var Yield = response['data'][i].Yield;
           var SecurityRef = response['data'][i].SecurityRef;
           var SettlementDate = response['data'][i].SettlementDate;
           var SettlementValue = response['data'][i].SettlementValue;
           var SettlementPrice = response['data'][i].SettlementPrice;
           var FaceValue = response['data'][i].FaceValue;
           var TradeType = response['data'][i].TradeType;
           
 
           var tr_str = "<tr>" +
            
            "<td align='center'>" + SettlementDate + "</td>" +
             "<td align='center'>" + DealerCode + "</td>" +
             "<td align='center'>" + DealerAction + "</td>" +
             "<td align='center'>" + CounterpartyCode + "</td>" +
             "<td align='center'>" + CounterPartyAction + "</td>" +
             "<td align='center'>" + SecurityCode + "</td>" +
             "<td align='center'>" + SecurityRef + "</td>" +
             "<td align='center'>" + Yield + "</td>" +
             "<td align='center'>" + SecurityRef + "</td>" +
             "<td align='center'>" + SettlementDate + "</td>" +
             "<td align='center'>" + SettlementValue + "</td>" +
             "<td align='center'>" + SettlementPrice + "</td>" +
             "<td align='center'>" + FaceValue + "</td>" +
             "<td align='center'>" + TradeType + "</td>" +
           "</tr>";
           $("table").show();
           $("#empTableTbills tbody").append(tr_str);

        }
      }else{
         var tr_str = "<tr>" +
           "<center><td align='center' colspan='4'>No record found.</td></center>" +
         "</tr>";
         $("table").show();
         $("#empTableTbills tbody").append(tr_str);
      }
   } 
   </script>





   <script type='text/javascript'>
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $(document).ready(function(){
 
      // Fetch all records Tbills
      $('#but_fetchallBonds').click(function(){
        var pfacodeBonds = $('#pfacodeBonds').val().trim();
        var counterpartycodeBonds = $('#counterpartycodeBonds').val().trim();
        var datefromBonds = $('#datefromBonds').val().trim();
       
 
         // AJAX GET request
         $.ajax({
           url: `pendealer_pfaTran_bond?pfacodeBonds=${pfacodeBonds}&counterpartycodeBonds=${counterpartycodeBonds}&datefromBonds=${datefromBonds}`,
           type: 'get',
           dataType: 'json',
           success: function(response){
 
              createRowsBonds(response);
 
           }
         });
      });
   });
 
 
   function createRowsBonds(response){
      var len = 0;
      $('#empTableBonds tbody').empty(); // Empty <tbody>
      if(response['data1'] != null){
         len = response['data1'].length;
      }
 
      if(len > 0){
        for(var i=0; i<len; i++){
        
           var SettlementDateBonds = response['data1'][i].SettlementDate;
           var DealerCodeBonds = response['data1'][i].DealerCode;
           var DealerActionBonds = response['data1'][i].DealerAction;
           var CounterpartyCodeBonds = response['data1'][i].CounterpartyCode;
           var CounterPartyActionBonds = response['data1'][i].CounterPartyAction;
           var SecurityCodeBonds = response['data1'][i].SecurityCode;
           var SecurityRefBonds = response['data1'][i].SecurityRef;
           var YieldBonds = response['data1'][i].Yield;
           var SecurityRefBonds = response['data1'][i].SecurityRef;
           var SettlementDateBonds = response['data1'][i].SettlementDate;
           var SettlementValueBonds = response['data1'][i].SettlementValue;
           var SettlementPriceBonds = response['data1'][i].SettlementPrice;
           var FaceValueBonds = response['data1'][i].FaceValue;
           var TradeTypeBonds = response['data1'][i].TradeType;
           
 
           var tr_str = "<tr>" +
            
            "<td align='center'>" + SettlementDateBonds + "</td>" +
             "<td align='center'>" + DealerCodeBonds + "</td>" +
             "<td align='center'>" + DealerActionBonds + "</td>" +
             "<td align='center'>" + CounterpartyCodeBonds + "</td>" +
             "<td align='center'>" + CounterPartyActionBonds + "</td>" +
             "<td align='center'>" + SecurityCodeBonds + "</td>" +
             "<td align='center'>" + SecurityRefBonds + "</td>" +
             "<td align='center'>" + YieldBonds + "</td>" +
             "<td align='center'>" + SecurityRefBonds + "</td>" +
             "<td align='center'>" + SettlementDateBonds + "</td>" +
             "<td align='center'>" + SettlementValueBonds + "</td>" +
             "<td align='center'>" + SettlementPriceBonds + "</td>" +
             "<td align='center'>" + FaceValueBonds + "</td>" +
             "<td align='center'>" + TradeTypeBonds + "</td>" +
           "</tr>";
           $("table").show();
           $("#empTableBonds tbody").append(tr_str);

        }
      }else{
         var tr_str = "<tr>" +
           "<center><td align='center' colspan='4'>No record found.</td></center>" +
         "</tr>";
         $("table").show();
         $("#empTableBonds tbody").append(tr_str);
      }
   } 
   </script>















   <script type='text/javascript'>
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $(document).ready(function(){
 
      // Fetch all records Tbills
      $('#but_fetchallRFA').click(function(){
        var pfaRFA = $('#pfaRFA').val().trim();
        var counterpartyRFA = $('#counterpartyRFA').val().trim();
        var SecurityCodeRFA = $('#SecurityCodeRFA').val().trim();
        var RfQRFA = $('#RfQRFA').val().trim();
        var datefromRFA = $('#datefromRFA').val().trim();
       
 
         // AJAX GET request
         $.ajax({
           url: `pendealer_pfaTran_frq?pfaRFA=${pfaRFA}&counterpartyRFA=${counterpartyRFA}&SecurityCodeRFA=${SecurityCodeRFA}&RfQRFA=${RfQRFA}&datefromRFA=${datefromRFA}`,
           type: 'get',
           dataType: 'json',
           success: function(response){
           
              createRowsRFA(response);
 
           }
         });
      });
   });
 
 
   function createRowsRFA(response){
      var len = 0;
      $('#empTableRFA tbody').empty(); // Empty <tbody>
      if(response['data_RFA'] != null){
         len = response['data_RFA'].length;
      }
 
      if(len > 0){
        for(var i=0; i<len; i++){
            
           var RfQRefRFA = response['data_RFA'][i].RfQRef;
           var ActionDateRFA = response['data_RFA'][i].ActionDate;
           var DealerIDRFA = response['data_RFA'][i].DealerID;
           var CounterPartyIDRFA = response['data_RFA'][i].CounterPartyID;
           var SecurityCodeRFA = response['data_RFA'][i].SecurityCode;
           var FaceValueRFA = response['data_RFA'][i].FaceValue;
           var BidRFA = response['data_RFA'][i].Bid;
           var AskRFA = response['data_RFA'][i].Ask;
           var DealRateRFA = response['data_RFA'][i].DealRate;
           
           
 
           var tr_str = "<tr>" +
            "<td align='center'>" + RfQRefRFA + "</td>" +
            "<td align='center'>" + ActionDateRFA + "</td>" +
             "<td align='center'>" + DealerIDRFA + "</td>" +
             "<td align='center'>" + CounterPartyIDRFA + "</td>" +
             "<td align='center'>" + SecurityCodeRFA + "</td>" +
             "<td align='center'>" + FaceValueRFA + "</td>" +
             "<td align='center'>" + BidRFA + "</td>" +
             "<td align='center'>" + AskRFA + "</td>" +
             "<td align='center'>" + DealRateRFA + "</td>" +
            
           "</tr>";
           $("table").show();
           $("#empTableRFA tbody").append(tr_str);

        }
      }else{
         var tr_str = "<tr>" +
           "<center><td align='center' colspan='4'>No record found.</td></center>" +
         "</tr>";
         $("table").show();
         $("#empTableRFA tbody").append(tr_str);
      }
   } 
   </script>
@endsection
