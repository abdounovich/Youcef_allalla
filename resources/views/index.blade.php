
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
    background: linear-gradient(45deg,#0a6194,#73b4ff);
}</style>
<div class="container mt-5">
  <div class=" text-white" style="opacity: 0.8">
  
    <div class="card bg-c-blue  m-2">
      <div class="card-body text-left ">
      <a class="h4" href="{{route('products')}}"> 
      <p class="card-text">
      <i class=" p-2 mr-2 fa fa-list-ol ">
      </i>Produits : {{$products->count()}}
      </p>
      </a>

      </div>
    </div>
  
    <div class="card bg-c-blue m-2">
        <div class="card-body text-left ">
        <a class="h4" href="{{route('clients')}}"> 
        <p class="card-text">
        <i class=" p-2 mr-2 fa fa-users ">
        </i>Clients : {{$clients->count()}}
        </p>
        </a>
  
        </div>
      </div>




      <div class="card bg-c-blue m-2 ">
        <div class="card-body text-left ">
        <a class="h4" href="{{route('commandes')}}"> 
        <p class="card-text">
        <i class=" p-2 mr-2 fa fa-list-ol ">
        </i>Commandes : {{$commandes->count()}}
        </p>
        </a>
  
        </div>
      </div>




      <div class="card bg-c-blue m-2 ">
        <div class="card-body text-left ">
        <a class="h4" href="{{route('categories')}}"> 
        <p class="card-text">
        <i class=" p-2 mr-2 fa fa-list-alt  ">
        </i>Categories : {{$categories->count()}}
        </p>
        </a>
  
        </div>
      </div>

      <div class="card bg-c-blue m-2 ">
        <div class="card-body text-left ">
        <a class="h4" href="{{route('sub_categories')}}"> 
        <p class="card-text">
        <i class=" p-2 mr-2 fa fa-list-ol ">
        </i>S-categories: {{$sub_categories->count()}}
        </p>
        </a>
  
        </div>
      </div>

  </div>
</div>



  






@stop