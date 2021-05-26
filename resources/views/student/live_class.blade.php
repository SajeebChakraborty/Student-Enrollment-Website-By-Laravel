@extends('layout2')


@section('container')

{{$count=null}}

@if($paid > 0)
@foreach($query as $row)

 @if($row->id > 1)
 <iframe src="{{ $row->class_link }}" width="800" height="480" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>

 
@endif



@endforeach
<?php
if($query2 == 0)
{

    echo"<h1><font color=red><center>No class is existed !</center></font></h1>";

}

 
?>
@endif
<?php
if($paid==0)
{

    echo"<h1><font color=red><center>Please paid first !</center></font></h1>";



}




?>
@endsection()