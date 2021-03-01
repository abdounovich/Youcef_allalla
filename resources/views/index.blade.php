
@extends('layouts.master')

@section('title', 'acceuil')



@section('content')

@if (\Session::has('success'))
    <div class="alert  alert-info p-2 m-4  ">
        <ul>
            <li class="p-2 text-left">{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

 <style>.bg-c-blue {
background: linear-gradient(90deg, #2C73D2 0%, #0089BA 100%);}</style>
<div class="container  mt-5">
  <div class=" text-white" style="opacity: 0.9">
  
    <div class="card bg-light my-2  ">
      <div class="card-body text-left ">
      <a class="h5" href="{{route('products')}}"> 
      <p class="card-text text-dark">
      <i class=" p-2 mr-2 text-dzed fa fa-list-ol ">
      </i>Produits : {{$products->count()}}
      </p>
      </a>

      </div>
    </div>
  
    <div class="card bg-light my-2  ">
        <div class="card-body text-left ">
        <a class="h5" href="{{route('clients')}}"> 
        <p class="card-text text-dark">
        <i class=" text-dzed p-2 mr-2 fa fa-users ">
        </i>Clients : {{$clients->count()}}
        </p>
        </a>
  
        </div>
      </div>




      <div class="card bg-light my-2 ">
        <div class="card-body text-left ">
        <a class="h5" href="{{route('commandes')}}"> 
        <p class="card-text text-dark">
        <i class="text-dzed p-2 mr-2 fa fa-shopping-cart ">
        </i>CMD : {{$commandes->count()}} ({{$InactivCommandes->count()}})
        </p>
        </a>
  
        </div>
      </div>




      <div class="card bg-light my-2   ">
        <div class="card-body text-left ">
        <a class="h5" href="{{route('categories')}}"> 
        <p class="card-text text-dark">
        <i class="text-dzed p-2 mr-2 fa fa-list-alt  ">
        </i>Categories : {{$categories->count()}}
        </p>
        </a>
  
        </div>
      </div>

      <div class="card bg-light  my-2   ">
        <div class="card-body text-left ">
        <a class="h5" href="{{route('sub_categories')}}"> 
        <p class="card-text text-dark">
        <i class="text-dzed p-2 mr-2 fa fa-list-ol ">
        </i>S-categories: {{$sub_categories->count()}}
        </p>
        </a>
  
        </div>
      </div>

  </div>
</div>


@php


   



    
@endphp
  

@section('footer')
<div class="mt-5"></div>

<div class="d-flex fixed-bottom flex-center bg-dzed mb-0">

    <div class="p-3   text-center flex-fill bg-dzed ">
        <a href="/">
            <i class="text-dark fa   fa-home" style="font-size: 22px"></i>
        </a>
    </div>
    <div class="p-3   text-center flex-fill">
        <a href="/products">
            <i class="text-white fa   fa-cubes" style="font-size: 22px"></i>
        </a>
    </div>
    <div class="p-3  text-center     flex-fill ">
        <a href="/clients"><i class="text-white fa   fa-users" style="font-size: 20px"></i>
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
