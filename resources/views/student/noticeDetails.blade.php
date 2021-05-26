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
    @foreach($query as $row)
    <h1><b>{{ $row->title }}</b></h1>
    <br><br><br>
    <table id="t01">
    <tr>
    <td> Details </td>
    <td> Date & Time </td>
    <td> Attachment </td>
    </tr>

    <tr>
    <td>{{ $row->details }}</td>
    <td> {{ $row->date_time }} </td>
    <td><a href="{{ asset($row->file) }}" download><img src="{{ Url('../../public/image/pdf_logo.jpg') }}" height="40" width="40" style=""></a></td>

    </tr>


   </table>

   @endforeach

@endsection()