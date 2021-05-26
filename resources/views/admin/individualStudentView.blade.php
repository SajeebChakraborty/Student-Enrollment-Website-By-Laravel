@extends('layout')

@section('container')

    <style>


    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 16%;
    }

    
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
.vl {
  border-left: 6px solid green;
  height: 260px;
}
#t01 th {
  background-color: black;
  color: white;
}


    </style>


    @foreach($query as $row)

    
    
    <br> <br> 

  <br>
  <br> <br> 

<br>
<br> <br> 

<br>
   
    <center><img src="{{asset($row->image)}}" height="235" width="235" style="border-radius: 50%;" class=""></center>
  
    &nbsp;	&nbsp;	&nbsp;
    <div class="vl"></div>

    &nbsp;	&nbsp;	&nbsp;

  <div class="">
    
    
    <table id="t01" class="">
    <tr>
    <td> Name :</td>
    <td> {{ $row->name }} </td>
    </tr>

    <tr>
    <td> Contact :</td>
    <td> {{ $row->phone  }} </td>
    </tr>

    <tr>
    <td> Email Address :</td>
    <td> {{ $row->email }} </td>
    </tr>

    
    <tr>
    <td> Class :</td>
    <td>  {{ $row->class }} </td>
    </tr>

    <tr>
    <td> Date of Birth :</td>
    <td> {{ $row->birth_date }} </td>
    </tr>

   </table>

  </div>

    @endforeach

@endsection()

<link rel="stylesheet" href="../../node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.html" />
<link rel="stylesheet" href="{{asset('node_modules/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.html" />
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