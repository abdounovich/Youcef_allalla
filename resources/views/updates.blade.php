
@extends('layouts.master')

@section('title', 'modifier ')



@section('content')

@if (\Session::has('success'))
    <div class="alert  alert-info p-2 m-4  ">
        <ul>
            <li class="p-2 text-left ">{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif




  



@section('content')

@foreach ($data as $item)
<form method="POST" action="{{route('update',$table_name) }}" enctype="multipart/form-data">
    @csrf
@foreach ($columns as $column)

@php
    $var
@endphp

@php
${"var".$column}=$column;
    $val=$item->${"var".$column};
@endphp
<div class="form-group ">
    {{$column}} <input type="text"class="form-control " value="{{$val}}" name="{{$column}}" id="{{$val}}">
</div>
   

     




     
    

     

 








@endforeach

<button type="submit" class="btn btn-primary ">modifier</button></div>
</form>
<p></p>
<p></p>
@endforeach

     


@endsection

@stop
