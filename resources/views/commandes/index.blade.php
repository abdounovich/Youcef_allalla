
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

@section('footer')

<div class="my-5"></div>

<div class="d-flex fixed-bottom flex-center bg-info mb-0">

    <div class="p-3   text-center flex-fill">
        <a href="/">
            <i class="text-white fa   fa-home" style="font-size: 22px"></i>
        </a>
    </div>
    <div class="p-3   text-center flex-fill">
        <a href="/products">
            <i class="text-white fa   fa-cubes" style="font-size: 22px"></i>
        </a>
    </div>
    <div class="p-3  text-center   ">
        <a href="/clients"><i class="text-white fa   fa-users" style="font-size: 20px"></i>
        </a>
    </div>
    <div class="p-3 text-center  flex-fill flex-fill bg-light active border-top border-bottom border-info">
        <a href="/commandes">
        <i class="text-info fa   fa-shopping-bag" style="font-size: 20px"></i>
        </a>
    </div>
    <div class="p-3 text-center  flex-fill">    
        <a href="/">
        <i class="text-white fa   fa-list" style="font-size: 20px"></i>
        </a>
    </div>
  </div>
  
@endsection
@stop