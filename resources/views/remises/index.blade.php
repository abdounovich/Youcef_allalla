
@extends('layouts.master')

@section('title', 'Ajouter des remises')



@section('content')

@if (\Session::has('success'))
    <div class="alert  alert-info p-2 m-4  ">
        <ul>
            <li class="p-2  text-left">{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif






@include('remises.add')
@include('remises.show')






@stop