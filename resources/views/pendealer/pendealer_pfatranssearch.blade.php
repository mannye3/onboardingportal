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
                                {!! Form::open(array('route' => 'pendealer_pfaTran_search','method'=>'POST')) !!}
                                <div class="row">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>PFA :</label>
                                            <select name="pfacode" class="form-select">
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
                                            <select name="counterpartycode" class="form-select">
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
                                            <input name="datefrom" type="date" class="form-control" >
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>.</label></label>
                                            <button type="submit" class="btn btn-primary w-100">
                                                Submit</button>
                                        </div>
                                    </div><!-- end col -->

                                </div>
                                {!! Form::close() !!}

                               <div id="content"></div>

                            
                            </div>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="FGNBONDS" role="tabpanel">
                           
                            <br>
                            <center><h2>PFA Transactions - Bonds</h2></center>
                           
                            <div class="p-3">
                                {!! Form::open(array('route' => 'pendealer_pfaTran_search','method'=>'POST')) !!}
                                <div class="row">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>PFA :</label>
                                            <select name="pfacode" class="form-select">
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
                                            <select name="counterpartycode" class="form-select">
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
                                            <input name="datefrom" type="date" class="form-control" >
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>.</label></label>
                                            <button type="submit" class="btn btn-primary w-100">
                                                Submit</button>
                                        </div>
                                    </div><!-- end col -->

                                </div>
                                {!! Form::close() !!}
                                
                             
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
                                            <label>Counterparty :</label>
                                            <select class="form-select">
                                                @foreach($counterparties as $counterparty)
                                                <option   value="{{ $counterparty->InstitutionName }}">
                                                    {{$counterparty->InstitutionName }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div><!-- end col -->


                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label>Security :</label>
                                            <select class="form-select">
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
                                            <input type="text" class="form-control" >
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
        <!--end col-->
    </div>
    <!--end row-->

    {{-- <div class="card" id="marketList">
        <div class="card-header border-bottom-dashed">
            <div class="row align-items-center">
                <div class="col-3">
                    <h5 class="card-title mb-0">Markets</h5>
                </div>
                <!--end col-->
                <div class="col-auto ms-auto">
                    <div class="d-flex gap-2">
                        <button class="btn btn-success"><i
                                class="ri-equalizer-line align-bottom me-1"></i> Filters</button>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end card-header-->
        <div class="card-body p-0 border-bottom border-bottom-dashed">
            <div class="search-box">
                <input type="text" class="form-control search border-0 py-3"
                    placeholder="Search to currency...">
                <i class="ri-search-line search-icon"></i>
            </div>
        </div>
        <!--end card-body-->
        <div class="card-body">
            <div class="table-responsive table-card">
                <table class="table align-middle table-nowrap" id="customerTable">
                    <thead class="table-light text-muted">
                        <tr>
                            <th class="sort" data-sort="currency_name" scope="col">Currency</th>
                            <th class="sort" data-sort="current_value" scope="col">Price</th>
                            <th class="sort" data-sort="pairs" scope="col">Pairs</th>
                            <th class="sort" data-sort="high" scope="col">24 High</th>
                            <th class="sort" data-sort="low" scope="col">24 Low</th>
                            <th class="sort" data-sort="market_cap" scope="col">Market Volume</th>
                            <th class="sort" data-sort="valume" scope="col">Volume %</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <!--end thead-->
                    <tbody class="list form-check-all">
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ001</a></td>
                            <td>
                                <div class="d-flex align-items-center fw-medium">
                                    <img src="{{ URL::asset('assets/images/svg/crypto-icons/btc.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    <a href="javascript:void(0);" class="currency_name">Bitcoin
                                        (BTC)</a>
                                </div>
                            </td>
                            <td class="current_value">$47,071.60</td>
                            <td class="pairs">BTC/USD</td>
                            <td class="high">$28,722.76</td>
                            <td class="low">$68,789.63</td>
                            <td class="market_cap">$888,411,910</td>
                            <td class="valume">
                                <h6 class="text-success fs-13 mb-0"><i
                                        class="mdi mdi-trending-up align-middle me-1"></i>1.50%</h6>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-soft-info">Trade Now</button>
                            </td>
                        </tr>
                        <!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ002</a></td>
                            <td>
                                <div class="d-flex align-items-center fw-medium">
                                    <img src="{{ URL::asset('assets/images/svg/crypto-icons/eth.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    <a href="javascript:void(0);" class="currency_name">Ethereum
                                        (ETH)</a>
                                </div>
                            </td>
                            <td class="current_value">$3,813.14</td>
                            <td class="pairs">ETH/USDT</td>
                            <td class="high">$4,036.24</td>
                            <td class="low">$3,588.14</td>
                            <td class="market_cap">$314,520,675</td>
                            <td class="valume">
                                <h6 class="text-danger fs-13 mb-0"><i
                                        class="mdi mdi-trending-down align-middle me-1"></i>0.42%</h6>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-soft-info">Trade Now</button>
                            </td>
                        </tr>
                        <!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ003</a></td>
                            <td>
                                <div class="d-flex align-items-center fw-medium">
                                    <img src="{{ URL::asset('assets/images/svg/crypto-icons/ltc.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    <a href="javascript:void(0);" class="currency_name">Litecoin
                                        (LTC)</a>
                                </div>
                            </td>
                            <td class="current_value">$149.65</td>
                            <td class="pairs">LTC/USDT</td>
                            <td class="high">$412.96</td>
                            <td class="low">$104.33</td>
                            <td class="market_cap">$314,520,675</td>
                            <td class="valume">
                                <h6 class="text-success fs-13 mb-0"><i
                                        class="mdi mdi-trending-up align-middle me-1"></i>0.89%</h6>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-soft-info">Trade Now</button>
                            </td>
                        </tr>
                        <!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ004</a></td>
                            <td>
                                <div class="d-flex align-items-center fw-medium">
                                    <img src="{{ URL::asset('assets/images/svg/crypto-icons/xmr.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    <a href="javascript:void(0);" class="currency_name">Monero (XMR)</a>
                                </div>
                            </td>
                            <td class="current_value">$17,491.16</td>
                            <td class="pairs">XRM/USDT</td>
                            <td class="high">$31,578.35</td>
                            <td class="low">$8691.75</td>
                            <td class="market_cap">$9,847,327</td>
                            <td class="valume">
                                <h6 class="text-success fs-13 mb-0"><i
                                        class="mdi mdi-trending-up align-middle me-1"></i>1.92%</h6>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-soft-info">Trade Now</button>
                            </td>
                        </tr>
                        <!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ005</a></td>
                            <td>
                                <div class="d-flex align-items-center fw-medium">
                                    <img src="{{ URL::asset('assets/images/svg/crypto-icons/sol.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    <a href="javascript:void(0);" class="currency_name">Solana (SOL)</a>
                                </div>
                            </td>
                            <td class="current_value">$172.93</td>
                            <td class="pairs">SOL/USD</td>
                            <td class="high">$178.37</td>
                            <td class="low">$172.3</td>
                            <td class="market_cap">$40,559,274</td>
                            <td class="valume">
                                <h6 class="text-danger fs-13 mb-0"><i
                                        class="mdi mdi-trending-down align-middle me-1"></i>2.87%</h6>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-soft-info">Trade Now</button>
                            </td>
                        </tr>
                        <!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ006</a></td>
                            <td class="currency_name">
                                <div class="d-flex align-items-center fw-medium">
                                    <img src="{{ URL::asset('assets/images/svg/crypto-icons/ant.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    <a href="javascript:void(0);" class="currency_name">Aragon (ANT)</a>
                                </div>
                            </td>
                            <td class="current_value">$13.31</td>
                            <td class="pairs">ANT/USD</td>
                            <td class="high">$13.85</td>
                            <td class="low">$12.53</td>
                            <td class="market_cap">$156,209,195.18</td>
                            <td class="valume">
                                <h6 class="text-success fs-13 mb-0"><i
                                        class="mdi mdi-trending-up align-middle me-1"></i>3.96%</h6>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-soft-info">Trade Now</button>
                            </td>
                        </tr>
                        <!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ007</a></td>
                            <td>
                                <div class="d-flex align-items-center fw-medium">
                                    <img src="{{ URL::asset('assets/images/svg/crypto-icons/fil.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    <a href="javascript:void(0);" class="currency_name">Filecoin
                                        (FIL)</a>
                                </div>
                            </td>
                            <td class="current_value">$35.21</td>
                            <td class="pairs">FIL/USD</td>
                            <td class="high">$36.41</td>
                            <td class="low">$35.03</td>
                            <td class="market_cap">$374,618,945.51</td>
                            <td class="valume">
                                <h6 class="text-danger fs-13 mb-0"><i
                                        class="mdi mdi-trending-down align-middle me-1"></i>0.84%</h6>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-soft-info">Trade Now</button>
                            </td>
                        </tr>
                        <!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ008</a></td>
                            <td>
                                <div class="d-flex align-items-center fw-medium">
                                    <img src="{{ URL::asset('assets/images/svg/crypto-icons/aave.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    <a href="javascript:void(0);" class="currency_name">Aave (AAVE)</a>
                                </div>
                            </td>
                            <td class="current_value">$275.47</td>
                            <td class="pairs">AAVE/USDT</td>
                            <td class="high">$277.11</td>
                            <td class="low">$255.01</td>
                            <td class="market_cap">$156,209,195.18</td>
                            <td class="valume">
                                <h6 class="text-success fs-13 mb-0"><i
                                        class="mdi mdi-trending-up align-middle me-1"></i>8.20%</h6>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-soft-info">Trade Now</button>
                            </td>
                        </tr>
                        <!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ009</a></td>
                            <td class="currency_name">
                                <div class="d-flex align-items-center fw-medium">
                                    <img src="{{ URL::asset('assets/images/svg/crypto-icons/ada.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    <a href="javascript:void(0);" class="currency_name">Cardano
                                        (ADA)</a>
                                </div>
                            </td>
                            <td class="current_value">$1.35</td>
                            <td class="pairs">ADA/USD</td>
                            <td class="high">$1.39</td>
                            <td class="low">$1.32</td>
                            <td class="market_cap">$880,387,980.14</td>
                            <td class="valume">
                                <h6 class="text-danger fs-13 mb-0"><i
                                        class="mdi mdi-trending-down align-middle me-1"></i>0.42%</h6>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-soft-info">Trade Now</button>
                            </td>
                        </tr>
                        <!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ010</a></td>
                            <td class="currency_name">
                                <div class="d-flex align-items-center fw-medium">
                                    <img src="{{ URL::asset('assets/images/svg/crypto-icons/dot.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    <a href="javascript:void(0);" class="currency_name">Polkadot
                                        (DOT)</a>
                                </div>
                            </td>
                            <td class="current_value">$28.88</td>
                            <td class="pairs">DOT/USD</td>
                            <td class="high">$30.56</td>
                            <td class="low">$28.66</td>
                            <td class="market_cap">$880,387,980.14</td>
                            <td class="valume">
                                <h6 class="text-success fs-13 mb-0"><i
                                        class="mdi mdi-trending-up align-middle me-1"></i>1.03%</h6>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-soft-info">Trade Now</button>
                            </td>
                        </tr>
                        <!--end tr-->
                    </tbody>
                </table>
                <!--end table-->
                <div class="noresult" style="display: none">
                    <div class="text-center">
                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                            colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
                        </lord-icon>
                        <h5 class="mt-2">Sorry! No Result Found</h5>
                        <p class="text-muted mb-0">We've searched more than 150+ Currencies We did not
                            find any
                            Currencies for you search.</p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <div class="pagination-wrap hstack gap-2">
                    <a class="page-item pagination-prev disabled" href="#">
                        Previous
                    </a>
                    <ul class="pagination listjs-pagination mb-0"></ul>
                    <a class="page-item pagination-next" href="#">
                        Next
                    </a>
                </div>
            </div>
        </div>
        <!--end card-body-->
    </div> --}}
    <!--end card-->
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/list.js/list.js.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <script src="{{ URL::asset('/assets/js/pages/crypto-buy-sell.init.js') }}"></script>
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

       <script>
           $.ajax({
        type: 'get',
        url: "http://127.0.0.1:8000/pendealer_pfaTran_result",
        dataType: 'json',
        success: function(data) {
            $("#content").val(data.data_generated);
        },
    });
       </script>
@endsection
