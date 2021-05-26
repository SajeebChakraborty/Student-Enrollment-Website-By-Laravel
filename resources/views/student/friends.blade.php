@extends('layout2')
@section('container')


@php

$class=Session::get('student_class');
$id=Session::get('student_id');
$query=DB::table('students_tbl')->join('students_details_tbl','students_tbl.id','students_details_tbl.id')
->where('students_tbl.class',$class)
->where('students_tbl.id','^',$id)->get();


@endphp
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
          <h2 class="page-title"><b>My Friends</b></h2>
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
                          <th>Roll</th>
                          <th>Name</th>
                          <th>Contact</th>
                          <th>Email</th>
                          <th>Action</th>

                   
                        
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($query as $row)
                      <tr>
                          <td>{{ $row->roll }}</td>
                          <td><img src="{{ $row->image }}" height="50" width="50" style="border-radius: 50%;"></td>
                          <td>{{ $row->roll }}</td>
                          <td>{{ $row->name }}</td>
                          <td>{{ $row->phone }}</td>
                          <td>{{ $row->email }}</td>
                          <td><a href = "{{ Url('user/student/view/'.$row->id) }}" class="btn btn-primary btn-lg">View</a></td>
                         
                          
                      </tr>
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