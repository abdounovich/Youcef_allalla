
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

 
<div class="container">
    <div class="card-group text-center">

        <div class="card bg-info d-flex align-self-center m-2 p-2"style="opacity: 0.9">
            <div class="card-body text-center" >
                <i class="  p-2 fa fa-list-ol fa-5x "></i>
            </div>
            <div class="h3 p-2 text-light d-flex align-self-center"> Produits   </div>
            <div class="h3 p-2 text-light d-flex align-self-center">   {{$products->count()}} </div>
            <a  href="{{route('products')}}" class=" p-2 mb-4  btn btn-primary d-flex align-self-center"> afficher tout </a>
        </div> 


        <div class="card bg-info d-flex align-self-center m-2 p-2 "style="opacity: 0.9">
            <div class="card-body text-center" >
                <i class="  p-2 fa fa-list-ol fa-5x "></i>
            </div>
            <div class="h3 p-2 text-light d-flex align-self-center"> Commandes   </div>
            <div class="h3 p-2 text-light d-flex align-self-center">   {{$commandes->count()}} </div>
            <a  href="{{route('commandes')}}" class=" p-2 mb-4  btn btn-primary d-flex align-self-center"> afficher tout </a>
        </div> 



        <div class="card bg-info d-flex align-self-center m-2 p-2 "style="opacity: 0.9">
            <div class="card-body text-center" >
                <i class="  p-2 fa fa-list-ol fa-5x "></i>
            </div>
            <div class="h3 p-2 text-light d-flex align-self-center"> Clients   </div>
            <div class="h3 p-2 text-light d-flex align-self-center">   {{$clients->count()}} </div>
            <a  href="{{route('clients')}}" class=" p-2 mb-4  btn btn-primary d-flex align-self-center"> afficher tout </a>
        </div> 



        <div class="card bg-info d-flex align-self-center m-2 p-2 "style="opacity: 0.9">
            <div class="card-body text-center" >
                <i class="  p-2 fa fa-list-ol fa-5x "></i>
            </div>
            <div class="h3 p-2 text-light d-flex align-self-center"> Categories   </div>
            <div class="h3 p-2 text-light d-flex align-self-center">   {{$categories->count()}} </div>
            <a  href="{{route('categories')}}" class=" p-2 mb-4  btn btn-primary d-flex align-self-center"> afficher tout </a>
        </div> 




        <div class="card bg-info d-flex align-self-center m-2 p-2 "style="opacity: 0.9">
            <div class="card-body text-center" >
                <i class="  p-2 fa fa-list-ol fa-5x "></i>
            </div>
            <div class="h3 p-2 text-light d-flex align-self-center"> Sous-categories    </div>
            <div class="h3 p-2 text-light d-flex align-self-center">   {{$sub_categories->count()}} </div>
            <a  href="{{route('sub_categories')}}" class=" p-2 mb-4  btn btn-primary d-flex align-self-center"> afficher tout </a>
        </div> 

  
    </div>
  </div>
  








@stop