@extends('layouts.master')
@section('title') @lang('translation.FMDQ-PenCom_Transactions') @endsection
@section('css')
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') FMDQ-PenCom @endslot
@slot('title') FMDQ-PenCom Market Activity Report @endslot
@endcomponent

<link href="{{ URL::asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    
        <!-- Responsive datatable examples -->
        <link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">


<div class="row" id="contactList">
    <div class="col-lg-12">
        <div class="card">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <div class="flex-grow-1">
                                <button class="btn btn-primary add-btn" data-bs-toggle="modal"
                                    data-bs-target="#showModal"><i
                                        class="ri-add-fill me-1 align-bottom"></i>Change Trade Date And Status</button>
                                        @if (\Session::has('success'))
                            <div><div class="alert alert-primary alert-dismissible shadow fade show" permission="alert">
                <strong> {{ \Session::get('success') }} </strong> </b> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div></div>
            @endif
    
                         @if (count($errors) > 0)
                            <div><div class="alert alert-primary alert-dismissible shadow fade show" permission="alert">
                            <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div></div>
            @endif
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
           
            
            <div class="card-body">
               {{-- {{$data->datefrom}} --}}
              
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
                                                    <th>Trade Type</th>
                                                    <th>Customer<br> Action</th>
                                                    <th>Dealer<br> Action</th>
                                                    <th>Settlement<br> Date</th>
                                                    <th>Settlement<br> Value</th>
                                                    <th>Discount<br> Rate/Price (%)</th>
                                                    <th>Accrued<br> Interest</th>
                                                    <th>Settlement<br> Price</th>
                                                    <th>Status</th>
                                                    <th>Last Updated</th>
                                                  
                                                </tr>
                                            </thead>
                                          <tbody>
                                            
                                            @inject('institutionCustomer', 'App\Helpers\InstitutionHelper')

                                            {{-- @inject('institutionDealer', 'App\Helpers\InstitutionHelper')
                                            @inject('security', 'App\Helpers\InstitutionHelper')
                                            @inject('Transtatus', 'App\Helpers\InstitutionHelper') --}}
                                            
                                          

                                            @foreach ($trade_report as $pendealer)
                                            <tr>
                                                    
                                                    <td>{{$pendealer->RefNo}}</td>
                                                    <td>
                                                        @php 
                                                    $SecurityCode = $pendealer->SecurityCode;
                                                    @endphp
                                                     {{ $institutionCustomer->getSecurityName($SecurityCode)}} </td>
                                                    
                                                  
                                                    <td>
                                                        @php 
                                                        $DealerCode = $pendealer->DealerCode;
                                                        @endphp
                                                       {{ $institutionCustomer->getInstitutionNameCustomer($DealerCode)}} </td>

                                                       
                                                    <td>
                                                        @php 
                                                        $CounterPartyCode = $pendealer->CounterPartyCode;
                                                        @endphp
                                                        
                                                        {{ $institutionCustomer->getInstitutionNameDealer($CounterPartyCode)}}</td>
                                                    <td>{{$pendealer->FaceValue}}</td>
                                                    <td> 
                                                        {{ $institutionCustomer->getProductCode($SecurityCode)}}</td>
                                                    <td>{{$pendealer->DealerAction}}</td>
                                                    <td>{{$pendealer->CounterPartyAction}}</td>
                                                    <td>{{$pendealer->SettlementDate}}</td>
                                                    <td>{{$pendealer->SettlementValue}}</td>
                                                    <td>{{$pendealer->DealRate}}</td>
                                                    <td>{{$pendealer->AccruedInterest}}</td>
                                                    <td>{{$pendealer->SettPrice}}</td>
                                                    <td> 
                                                        @php 
                                                        $status = $pendealer->tranStatus;
                                                        @endphp
                                                        {{ $institutionCustomer->getTranStatus($status)}}
                                                    </td>
                                                    <td>{{$pendealer->Timestamp}}</td>
                                                  
                                                    
                                                </tr>
                                                @endforeach
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


   <!-- ADD USER MODAL -->
   <div class="modal fade" id="showModal" tabindex="-1"
   aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content border-0">
         
           <div class="modal-header bg-soft-info p-3">
               <h5 class="modal-title" id="exampleModalLabel">Change Trade Date And Status</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal"
                   aria-label="Close" id="close-modal"></button>
           </div>
           {!! Form::open(array('route' => 'pendealertransearch','method'=>'POST')) !!}
               <div class="modal-body">
                   <input type="hidden" id="id-field" />
                   <div class="row g-3">
                    <div class="col-lg-12">
                        <div>
                            <label for="name-field"
                                class="form-label">Enter Date From (Settlement Date)</label>
                                <input required type="text"  name="datefrom" class="form-control" placeholder="Enter Date"
                                onfocus="(this.type='date')">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div>
                            <label for="company_name-field"
                                class="form-label">Enter Date To (Settlement Date)</label>
                            <input required type="text" name="dateto"  id="company_name-field"
                                class="form-control"
                                placeholder="Enter Date"
                                onfocus="(this.type='date')"  />
                        </div>
                    </div>
                    <div class="col-lg-12">
                     <div>
                         <label for="email_id-field" class="form-label">Trade Status</label>
                         <select required name="transtatus" class="form-control  ">
                             <option>Select Trade Status</option>
                          @foreach($TranStatus as $status)
                          <option   value="{{ $status->StatusRef }}">
                              {{$status->StatusCode }}</option>
                              @endforeach
                          </select>

                      
                     </div>
                    </div>

                </div>
               </div>
               <div class="modal-footer">
                   <div class="hstack gap-2 justify-content-end">
                       <button type="button" class="btn btn-light"
                           data-bs-dismiss="modal">Close</button>
                       <button type="submit" class="btn btn-primary"
                           id="add-btn">Submit</button>
                     
                   </div>
               </div>
               {!! Form::close() !!}
       </div>
   </div>
</div>
<!--end add modal-->

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
