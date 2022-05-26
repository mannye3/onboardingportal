@extends('layouts.master')
@section('title') @lang('translation.FMDQ Q-Deal_Transactions') @endsection
@section('css')
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') FMDQ Q-Deal @endslot
@slot('title') FMDQ Q-Deal Transactions @endslot
@endcomponent

<link href="{{ URL::asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    
        <!-- Responsive datatable examples -->
        <link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">


<div class="row" id="contactList">
    <div class="col-lg-12">
        <div class="card">
           
            
            <div class="card-body">
               
              
                 <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table id="datatable-buttons" class="table table-striped table-bordered  nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                <th>Deal Ref</th>
                                                    <th>Security</th>
                                                    <th>Customer</th>
                                                    <th>Dealer</th>
                                                    <th>Face Value <br>(₦'mm)</th>
                                                    <th>Customer<br> Action</th>
                                                    <th>Dealer<br> Action</th>
                                                    <th>Settlement<br> Date</th>
                                                    <th>Settlement<br> Value</th>
                                                    <th>Discount<br> Rate/Price (%)</th>
                                                    <th>Accrued<br> Interest</th>
                                                    <th>Settlement<br> Price</th>
                                                    <th>Best<br> rate</th>
                                                    <th>Status</th>
                                                    <th>Last Updated</th>
                                                    <th>Trade Type</th>
                                                </tr>
                                            </thead>
                                          <tbody>
                                                
                                          <tr>
                                                    
                                                    <td>18765</td>
                                                    <td>NGBIDF</td>
                                                    <td>UNITED BANK FOR AFRICA</td>
                                                    <td>Veritas</td>
                                                    <td>FG BOND</td>
                                                    <td>SELL</td>
                                                    <td>01/11/2022</td>
                                                    <td>2,000,0000,000</td>
                                                    <td>7999</td>
                                                    <td>15.90</td>
                                                    <td>0.00000</td>
                                                    <td>9000</td>
                                                    <td>1000</td>
                                                    <td>goo</td>
                                                    <td>18/99/00</td>
                                                    <td>Bond</td>
                                                    
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </div>

                                    </div>
                                </div>
                            </div> 
            </div>
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->

@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/list.js/list.js.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>

<script src="{{ URL::asset('/assets/js/pages/crypto-orders.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="assets/libs/jquery/jquery.min.js"></script>
    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
       <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
       <!-- Buttons examples -->
       <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
       <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
       <script src="assets/libs/jszip/jszip.min.js"></script>
       <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
       <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
       <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
       <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
       <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
       <!-- Responsive examples -->
       <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
       <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

       <!-- Datatable init js -->
       <script src="assets/js/pages/datatables.init.js"></script> 

       <script src="assets/js/app.js"></script>
@endsection
