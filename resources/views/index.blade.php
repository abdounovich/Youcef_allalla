
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
  
    <div class="card bg-light  m-2 ">
      <div class="card-body text-left ">
      <a class="h4" href="{{route('products')}}"> 
      <p class="card-text text-info">
      <i class=" p-2 mr-2 fa fa-list-ol ">
      </i>Produits : {{$products->count()}}
      </p>
      </a>

      </div>
    </div>
  
    <div class="card bg-light m-2 ">
        <div class="card-body text-left ">
        <a class="h4" href="{{route('clients')}}"> 
        <p class="card-text text-info">
        <i class=" p-2 mr-2 fa fa-users ">
        </i>Clients : {{$clients->count()}}
        </p>
        </a>
  
        </div>
      </div>




      <div class="card bg-light m-2">
        <div class="card-body text-left ">
        <a class="h4" href="{{route('commandes')}}"> 
        <p class="card-text text-info">
        <i class=" p-2 mr-2 fa fa-shopping-cart ">
        </i>Commandes : {{$commandes->count()}} ({{$InactivCommandes->count()}})
        </p>
        </a>
  
        </div>
      </div>




      <div class="card bg-light m-2 ">
        <div class="card-body text-left ">
        <a class="h4" href="{{route('categories')}}"> 
        <p class="card-text text-info">
        <i class=" p-2 mr-2 fa fa-list-alt  ">
        </i>Categories : {{$categories->count()}}
        </p>
        </a>
  
        </div>
      </div>

      <div class="card bg-light  m-2  ">
        <div class="card-body text-left ">
        <a class="h4" href="{{route('sub_categories')}}"> 
        <p class="card-text text-info">
        <i class=" p-2 mr-2 fa fa-list-ol ">
        </i>S-categories: {{$sub_categories->count()}}
        </p>
        </a>
  
        </div>
      </div>

  </div>
</div>


@php


   



    
@endphp
  






@stop