
@extends('layouts.master')

@section('title', 'Ajouter des produits')



@section('content')

@if (\Session::has('success'))
    <div class="alert  alert-info p-2 m-4  text-left ">
        <ul>
            <li class="p-2 text-left">{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif




  


@include('commandes.show')





@stop