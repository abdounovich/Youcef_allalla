
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




  

<div class="mt-5"></div>
@include('commandes.show')
@section('footer')
<div class="d-flex fixed-bottom flex-center bg-info mb-0">
    <div class="p-3 btn-link   text-center flex-fill"><a href="/"><i class="text-white fa   fa-home" style="font-size: 22px"></i></a></div>
    
    <div class="p-3   text-center flex-fill"><a href="/produits"><i class="text-info fa   fa-cubes" style="font-size: 22px"></i></a></div>
    <div class="p-3   btn flex-fill "><a href="/clients"><i class="text-white fa  fa-users" style="font-size: 20px"></i></a></div>
    <div class="p-3 btn-link active  bg-light btn flex-fill"><a href="/commandes"><i class="text-info fa   fa-shopping-cart" style="font-size: 20px"></i></a></div>
  </div>
@endsection
@stop