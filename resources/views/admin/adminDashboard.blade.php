@extends('layout')

@section('container')
@php

    date_default_timezone_set("Asia/Dhaka");

    $current_date = date("M ,Y");

    
    $query=DB::table('students_tbl')->count();

    $query2=DB::table('teachers_tbl')->count();

    $query3=DB::table('invoices_tbl')->where('invoice_month',$current_date)
    ->count();

    $query5=DB::table('invoices_tbl')->where('invoice_month',$current_date)
    ->where('paid_status','Yes')
    ->count();

    $query4=DB::table('invoices_tbl')->where('invoice_month',$current_date)
    ->where('paid_status','Yes')
    ->sum('invoice_money');

    $query6=DB::table('notices_tbl')->count();

    $query6=$query6/$query;
@endphp
<style>

 

</style>

<div class=".shiftnav-content-wrap">

          <div class="row">
            <div class="col-sm-6 col-md-3 grid-margin">
              <div class="card" style="background-color:TEAL;">
                <div class="card-body" style="background-color:TEAL;">
                  <h2 class="card-title">Students <br>({{ $query }})</h2>
                  
                </div>
                <div class="dashboard-chart-card-container" style="background-color:TEAL;">
                  <div id="dashboard-card-chart-1" class="card-float-chart"><center>   <img src="{{ Url('../../public/image/student.png') }}" alt="" height="70" width="70" style="border-radius: 50%;"></center></div>
                    
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 grid-margin" >
              <div class="card" style="background-color:yellow;">
                <div class="card-body" style="background-color:yellow;">
                  <h2 class="card-title">Teachers <br> ({{ $query2 }})</h2>
                </div>
                <div class="dashboard-chart-card-container" style="background-color:yellow;">
                  <div id="dashboard-card-chart-2" class="card-float-chart"><center>   <img src="{{ Url('../../public/image/teacher4.png') }}" alt="" height="70" width="70" style="border-radius: 50%;"></center></div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 grid-margin">
              <div class="card" style="background-color:LIME;">
                <div class="card-body" style="background-color:LIME;">
                  <h2 class="card-title">Active Students <br>({{ $query3 }})</h2>
                </div>
                <div class="dashboard-chart-card-container" style="background-color:LIME;">
                  <div id="dashboard-card-chart-3" class="card-float-chart"><center>   <img src="{{ Url('../../public/image/student.png') }}" alt="" height="70" width="70" style="border-radius: 50%;"></center></div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 grid-margin">
              <div class="card" style="background-color:LIGHTCORAL;">
                <div class="card-body" style="background-color:LIGHTCORAL;">
                  <h2 class="card-title">Paid Students <br> ({{ $query5 }})</h2>
                </div>
                <div class="dashboard-chart-card-container" style="background-color:LIGHTCORAL;">
                  <div id="dashboard-card-chart-3" class="card-float-chart"><center>   <img src="{{ Url('../../public/image/student.png') }}" alt="" height="70" width="70" style="border-radius: 50%;"></center></div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-3 grid-margin">
              <div class="card" style="background-color:Blue;">
                <div class="card-body" style="background-color:Blue;">
                  <h2 class="card-title">Total Class <br> ({{ $query5 }})</h2>
                </div>
                <div class="dashboard-chart-card-container" style="background-color:Blue;">
                  <div id="dashboard-card-chart-3" class="card-float-chart"><center>   <img src="{{ Url('../../public/image/class.png') }}" alt="" height="80" width="85" style="border-radius: 50%;"></center></div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-3 grid-margin">
              <div class="card" style="background-color:SILVER;">
                <div class="card-body" style="background-color:SILVER;">
                  <h2 class="card-title">Total Notice <br> ({{ $query6 }})</h2>
                </div>
                <div class="dashboard-chart-card-container" style="background-color:SILVER;">
                  <div id="dashboard-card-chart-3" class="card-float-chart"><center>   <img src="{{ Url('../../public/image/notice.png') }}" alt="" height="65" width="65" style="border-radius: 50%;"></center></div>
                </div>
              </div>
            </div>

            
            <div class="col-sm-6 col-md-3 grid-margin">
              
              <div class="card" style="background-color:AQUA;">
                <div class="card-body" style="background-color:AQUA;">
                  <h2 class="card-title">Monthly Income <br> ({{ $query4 }} BDT)</h2>
                </div>
                <div class="dashboard-chart-card-container" style="background-color:AQUA;">
                  <div id="dashboard-card-chart-4" class="card-float-chart"><center>   <img src="{{ Url('../../public/image/money3.jpg') }}" alt="" height="80" width="80" style="border-radius: 50%;"></center></div>
                </div>
              </div>
              
            </div>
          </div>
          <link rel="stylesheet" href="{{ asset('node_modules/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.html') }}" />
  <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('node_modules/datatables.net/js/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js') }}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/misc.js') }}"></script>
  <script src="{{ asset('js/settings.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('js/data-table.js') }}"></script>

@endsection

