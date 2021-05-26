@extends('layout')
@section('container')


<style>
img {
  border-radius: 50%;
}

</style>
<link rel="stylesheet" href="../../node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.html" />
<div class="">
          <h2 class="page-title"><b>Tuition Fee</b></h2>
          <div class="card">
            <div class="card-body">
              <h2 class="card-title"></h2>
              <div class="row">
                <div class="col-12">
                  <table id="order-listing" class="table table-striped" style="width:100%;">
                    <thead>
                      <tr>
                          <th>Serial</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Class</th>
                          <th>Roll</th>
                          <th>Contact</th>
                          <th>Amount</th>
                          <th>Paid Status</th>
                   
                        
                      </tr>
                      @php
                      
                        $count=1;

                      @endphp
                    </thead>
                    <tbody>
                    @foreach($query as $row)
                    <?php


                        $res=DB::table('students_tbl')
                        ->join('students_details_tbl','students_tbl.id','students_details_tbl.id')
                        ->select('students_tbl.*','students_details_tbl.*')
                        ->where('students_tbl.id',$row->user_id)->get();

                    ?>
                    @foreach($res as $row2)
                      <tr>
                          <td>{{ $count }}</td>
                          <td><img src="../../{{ $row2->image }}" height="50" width="50" style="border-radius: 50%;"></td>
                          <td>{{ $row2->name }}</td>
                          <td>{{ $row2->class }}</td>
                          <td>{{ $row2->roll }}</td>
                          <td>{{ $row2->phone }}</td>
                          <td>{{ $row->invoice_money }}</td>
                          <td>{{ $row->paid_status }}</td>

                         @php

                            $count++;
                         @endphp
                          
                      </tr>
                   @endforeach
                   @endforeach
    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../../node_modules/datatables.net/js/jquery.dataTables.js"></script>
  <script src="../../node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <script src="../../js/settings.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/data-table.js"></script>
@endsection()