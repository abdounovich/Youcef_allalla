
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



<div class="row mt-4">
    <div class="col col-4 ">  <div class="card rounded bg-info text-dark p-2 shadow" style="opacity: 0.8" >
        <i class="m-4 p-2 fa fa-list-ol fa-5x d-flex align-self-center "></i>
        <div class="h3 p-2 text-light   d-flex align-self-center"> Produits   </div>
        <div class="h1 text-light  d-flex align-self-center">{{$products->count()}}</div>

        <a  href="{{route('products')}}" class=" m-4 p-2 btn btn-primary d-flex align-self-center"> afficher tout </a>
         </div>
        </div>

        <div class="col col-4 ">  <div class="card rounded bg-info text-dark p-2 shadow" style="opacity: 0.8" >
            <i class="m-4 p-2 fa fa-list-ol fa-5x d-flex align-self-center "></i>
            <div class="h3 p-2 text-light   d-flex align-self-center"> Commandes   </div>
            <div class="h1 text-light  d-flex align-self-center">{{$commandes->count()}}</div>
    
            <a  href="{{route('commandes')}}" class=" m-4 p-2 btn btn-primary d-flex align-self-center"> afficher tout </a>
             </div>
            </div>
            <div class="col col-4 ">  <div class="card rounded bg-info text-dark p-2 shadow" style="opacity: 0.8" >
                <i class="m-4 p-2 fa fa-user fa-5x d-flex align-self-center "></i>
                <div class="h3 p-2 text-light   d-flex align-self-center"> Clients   </div>
                <div class="h1 text-light  d-flex align-self-center">{{$clients->count()}}</div>
        
                <a  href="{{route('clients')}}" class=" m-4 p-2 btn btn-primary d-flex align-self-center"> afficher tout </a>
                 </div>
                </div>

</div>
<div class="row mt-4">

        <div class="col col-4 ">  <div class="card rounded bg-info text-dark p-2 shadow" style="opacity: 0.8" >
            <i class="m-4 p-2 fa fa-th-list fa-5x d-flex align-self-center "></i>
            <div class="h3 p-2 text-light   d-flex align-self-center"> Categories   </div>
            <div class="h1 text-light  d-flex align-self-center">{{$categories->count()}}</div>
    
            <a href="{{route('categories')}}" class=" m-4 p-2 btn btn-primary d-flex align-self-center">afficher tout </a>
             </div>
            </div>
            <div class="col col-4 ">  <div class="card rounded bg-info text-dark p-2 shadow" style="opacity: 0.8" >
                <i class="m-4 p-2 fa fa-list fa-5x d-flex align-self-center "></i>
                <div class="h3 p-2 text-light   d-flex align-self-center"> Sous-categories   </div>
                <div class="h1 text-light  d-flex align-self-center">{{$sub_categories->count()}}</div>
        
                <a  href="{{route('sub_categories')}}" class=" m-4 p-2 btn btn-primary d-flex align-self-center">afficher tout </a>
                 </div>
                </div>
</div>


  






@stop