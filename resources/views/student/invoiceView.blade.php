@extends('layout2')




@section('container')

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

        @foreach($query5 as $row)
    <h1><b> Invoice </b> </h1>
    
   <table id="t01">
    <tr>
    <td> Invoice Number :</td>
    <td> {{$row->invoice_number}} </td>
    </tr>

    <tr>
    <td> Amount :</td>
    <td> {{$row->invoice_money}} </td>
    </tr>

    <tr>
    <td> Invoice Month :</td>
    <td> {{$row->invoice_month}} </td>
    </tr>

    <tr>
    <td> Paid Status :</td>
    <td> {{$row->paid_status}} </td>
    </tr>

    
   </table>
   <br><br>
    
   <a href = "{{ Url('user/invoice/pdf/'.$row->user_id) }}" class="btn btn-primary btn-lg">Download as PDF</a>
   &nbsp;&nbsp;

   @if($row->paid_status=="Yes")
   <button onclick="window.location.href='{{ Url('user/invoice/pay/'.$row->user_id) }}'" class="btn btn-danger btn-lg" disabled>
      Pay Bill
    </button>

    @endif
    @if($row->paid_status=="No")
   <button onclick="window.location.href='{{ Url('user/invoice/pay/'.$row->user_id) }}'" class="btn btn-danger btn-lg" >
      Pay Bill
    </button>

    @endif
   @endforeach
@endsection()