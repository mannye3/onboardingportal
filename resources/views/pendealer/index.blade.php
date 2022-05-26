@extends('layouts.master')
@section('title') @lang('translation.projects') @endsection
@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Market @endslot
        @slot('title') FMDQ-PenCom  @endslot
    @endcomponent
 @include('layouts.chart')
    <div class="row project-wrapper">
        <div class="col-xxl-8">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span
                                        class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                        <i data-feather="users" class="text-primary"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 overflow-hidden ms-3">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                       Total  Users</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <h4 class="fs-4 flex-grow-1 mb-0"><span
                                                class="counter-value" data-target="{{ \App\Models\ProfilePendealer::all()->count() }}">0</span></h4>
                                       
                                    </div>
                                    
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span
                                        class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                        <i data-feather="activity" class="text-primary"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                  </a><p class="text-uppercase fw-medium text-muted mb-3"> <a href="{{route('pendealer_tran')}}" >Transactions</a></p>
                                    <div class="d-flex align-items-center mb-3">
                                        <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                data-target="{{ \App\Models\TransactionPendealer::all()->count() }}">0</span></h4>
                                      
                                    </div>
                                    
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span
                                        class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                        <i data-feather="briefcase" class="text-primary"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-medium text-muted mb-3">Securities Traded</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                data-target="{{ \App\Models\SecurityPendealer::all()->count() }}">0</span></h4>
                                      
                                    </div>
                                    
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">10 Top Traded Securities</h4>
                        </div><!-- end card header -->
        
                        <div class="card-body">
                            <div id="bar_chart" data-colors='["--vz-primary"]' class="apex-charts" dir="ltr"></div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Products Traded</h4>
                        </div><!-- end card header -->
        
                        <div class="card-body">
                            <div id="bar_chart1" data-colors='["--vz-primary"]' class="apex-charts" dir="ltr"></div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Transaction Overview</h4>
                            
                        </div><!-- end card header -->

                        <div class="card-header p-0 border-0 bg-soft-light">
                            <div class="row g-0 text-center">
                                <div class="col-6 col-sm-6">
                                    <div class="p-3 border border-dashed border-start-0">
                                        <h5 class="mb-1"><span class="counter-value"
                                                data-target="{{$total_stettvalue}}">0</span></h5>
                                        <p class="text-muted mb-0">Number of Settled Trade</p>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-6 col-sm-6">
                                    <div class="p-3 border border-dashed border-start-0">
                                        <h5 class="mb-1"><span class="counter-value"
                                                data-target="{{$total_stettvalueYTD}}">0</span></h5>
                                        <p class="text-muted mb-0">Number of Settled Trade(YTD)</p>
                                    </div>
                                </div>
                                <!--end col-->
                                {{-- <div class="col-6 col-sm-3">
                                    <div class="p-3 border border-dashed border-start-0">
                                        <h5 class="mb-1">$<span class="counter-value"
                                                data-target="228.89">0</span>k</h5>
                                        <p class="text-muted mb-0">Turnover </p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="p-3 border border-dashed border-start-0">
                                        <h5 class="mb-1">$<span class="counter-value"
                                                data-target="228.89">0</span>k</h5>
                                        <p class="text-muted mb-0">Net position(Bills) </p>
                                    </div>
                                </div> --}}

                               

                             
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                <div>
                  <div class="col-xl-12">
                    <div class="card">
                      
                        <div class="card-header">
                            {{-- <h4 class="card-title mb-0">Line with Data Labels</h4> --}}
                        </div><!-- end card header -->
                        <select class="form-select rounded-pill mb-3" aria-label="Default select example">
                          <option selected>Search for services</option>
                          <option value="1">Information Architecture</option>
                          <option value="2">UI/UX Design</option>
                          <option value="3">Back End Development</option>
                      </select>
                        <div class="card-body">
                          {{-- <div id="container"></div> --}}
                          <div id="container"></div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                </div>
            </div>


                        <div class="card-body p-0 pb-2">
                            <div>
                                
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end col -->

       
    </div><!-- end row -->

    
 

  

    
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/apexcharts-line.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

    <script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/data.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
<script src="https://code.highcharts.com/stock/modules/accessibility.js"></script>


<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/data.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
<script src="https://code.highcharts.com/stock/modules/accessibility.js"></script>



<script>
  Highcharts.getJSON('http://127.0.0.1:8082/apichart', function (data) {
  // Create the chart
  Highcharts.stockChart('container', {
    rangeSelector: {
      selected: 1
    },

    title: {
      text: 'AAPL Stock Price'
    },

    series: [{
      name: 'AAPL',
      data: data,
      tooltip: {
        valueDecimals: 2
      }
    }]
  });
});
</script>














    <script>

        /******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};

function getChartColorsArray(chartId) {
  if (document.getElementById(chartId) !== null) {
    var colors = document.getElementById(chartId).getAttribute("data-colors");
    colors = JSON.parse(colors);
    return colors.map(function (value) {
      var newValue = value.replace(" ", "");

      if (newValue.indexOf(",") === -1) {
        var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
        if (color) return color;else return newValue;
        ;
      } else {
        var val = value.split(',');

        if (val.length == 2) {
          var rgbaColor = getComputedStyle(document.documentElement).getPropertyValue(val[0]);
          rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
          return rgbaColor;
        } else {
          return newValue;
        }
      }
    });
  }
} // Basic Bar chart


var chartBarColors = getChartColorsArray("bar_chart");
var options = {
  chart: {
    height: 350,
    type: 'bar',
    toolbar: {
      show: false
    }
  },
  plotOptions: {
    bar: {
      horizontal: true
    }
  },
  dataLabels: {
    enabled: false
  },
  series: [{
    data:  {!! json_encode($sec_value) !!}
    
  }],
  colors: chartBarColors,
  grid: {
    borderColor: '#f1f1f1'
  },
  xaxis: {
    categories:  {!! json_encode($sec_name) !!}
  }
};
var chart = new ApexCharts(document.querySelector("#bar_chart"), options);
chart.render(); // Custom DataLabels Bar

var chart = new ApexCharts(document.querySelector("#bar_images"), options);
chart.render();
/******/ })()
;











       /******/ (() => { // webpackBootstrap
        var __webpack_exports__ = {};

function getChartColorsArray(chartId) {
  if (document.getElementById(chartId) !== null) {
    var colors = document.getElementById(chartId).getAttribute("data-colors");
    colors = JSON.parse(colors);
    return colors.map(function (value) {
      var newValue = value.replace(" ", "");

      if (newValue.indexOf(",") === -1) {
        var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
        if (color) return color;else return newValue;
        ;
      } else {
        var val = value.split(',');

        if (val.length == 2) {
          var rgbaColor = getComputedStyle(document.documentElement).getPropertyValue(val[0]);
          rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
          return rgbaColor;
        } else {
          return newValue;
        }
      }
    });
  }
} // Basic Bar chart


var chartBarColors = getChartColorsArray("bar_chart1");
var options = {
  chart: {
    height: 350,
    type: 'bar',
    toolbar: {
      show: false
    }
  },
  plotOptions: {
    bar: {
      horizontal: true
    }
  },
  dataLabels: {
    enabled: false
  },
  series: [{
    data:  {!! json_encode($prod_value) !!}
    
  }],
  colors: chartBarColors,
  grid: {
    borderColor: '#f1f1f1'
  },
  xaxis: {
    categories:  {!! json_encode($prod_name) !!}
  }
};
var chart = new ApexCharts(document.querySelector("#bar_chart1"), options);
chart.render(); // Custom DataLabels Bar

var chart = new ApexCharts(document.querySelector("#bar_images"), options);
chart.render();
/******/ })()
;






        </script>
    
@endsection
