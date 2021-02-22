
@extends('layouts.master')

@section('title', 'Ajouter des produits')



@section('content')

@if (\Session::has('success'))
    <div class="alert  alert-info p-2 m-4  ">
        <ul>
            <li class="p-2 text-left ">{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif




  


@include('clients.show')
<div class="my-5"><p></p></div>

@section('footer')
<div class="mt-5"></div>

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
    <div class="p-3  text-center     flex-fill bg-light active border-top border-bottom border-info ">
        <a href="/clients"><i class="text-info fa   fa-users" style="font-size: 20px"></i>
        </a>
    </div>
    <div class="p-3 text-center  flex-fill">
        <a href="/commandes">
        <i class="text-white fa   fa-shopping-bag" style="font-size: 20px"></i>
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