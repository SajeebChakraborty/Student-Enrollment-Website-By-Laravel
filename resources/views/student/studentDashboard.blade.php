@php 

use Illuminate\Support\Facades\Redirect;

$login=Session::get('student_login');
           if(!$login)
            {
              
            echo "<br><br><br><br><br><br><br>";
            echo "<center><font size=50, color=red><h1>Please Login first!</h1></font></center>";
            
             return Redirect::to('/');

            
           

            }

  


@endphp


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

 

@php

    $id=Session::get('student_id');
    $query=DB::table('students_tbl')->where('id',$id)->first();
    $query2=DB::table('students_details_tbl')->where('id',$id)->first();

    Session::put('student_class',$query->class);

@endphp
<style>

table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
#t01 tr:nth-child(even) {
  background-color: #D5F5E3;
}
#t01 tr:nth-child(odd) {
 background-color: #AEB6BF;
}
#t01 th {
  background-color: black;
  color: white;
}

</style>
@extends('layout2')
@section('container')

    <h1><b> Dashboard </b> </h1>
   <table id="t01">
    <tr>
    <td> Name :</td>
    <td> {{$query->name}} </td>
    </tr>

    <tr>
    <td> Contact :</td>
    <td> {{$query->phone}} </td>
    </tr>

    <tr>
    <td> Email Address :</td>
    <td> {{$query2->email}} </td>
    </tr>

    <tr>
    <td> Roll :</td>
    <td> {{$query->roll}} </td>
    </tr>

    <tr>
    <td> Class :</td>
    <td> {{$query->class}} </td>
    </tr>

    <tr>
    <td> Date of Birth :</td>
    <td> {{$query2->birth_date}} </td>
    </tr>

   </table>
   
   <br>
   <br>
  
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
  
@endsection