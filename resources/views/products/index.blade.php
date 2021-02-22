
@extends('layouts.master')

@section('title', 'Ajouter des produits')



@section('content')

@if (\Session::has('success'))
    <div class="alert  alert-success mt-4    ">
        <ul>
            <li class="p-2 mt-2  text-left">{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif




<div class="  mt-5 mb-2 d-flex justify-content-center ">
    <a class="btn btn-info  rounded p-3 m-4 text-white"  
    type="button" data-toggle="collapse" data-target="#List_collapse" aria-expanded="false"><i class="fa fa-plus mr-2">  </i> Ajouter un produit</a>
  
  </div>

<div id="List_collapse" class=" collapse">
 <div class="d-flex justify-content-center">
  <a href="#" class="col col-10 btn btn-info p-2 m-2" data-toggle="collapse" data-target="#simple_collapse" aria-expanded="false">Produit simple </a>
 </div>

 <div class="d-flex justify-content-center ">

     
    <a   href="" class=" col col-10 btn btn-info p-2 m-2" data-toggle="collapse" data-target="#taille_collapse" aria-expanded="false">Produit avec tailles </a>
 </div>
 <div class="d-flex justify-content-center">

    <a href="" class="col col-10 btn btn-info p-2 m-2"data-toggle="collapse" data-target="#color_collapse" aria-expanded="false">Produit avec couleurs </a>
 </div>
 <div class="d-flex justify-content-center">
    <a href="" class="col col-10 btn btn-info p-2 m-2" data-toggle="collapse" data-target="#complexe_collapse" aria-expanded="false">Produit avec tailles + couleurs </a>

 </div>
  </div>
@include('products.addSimple')
@include('products.addTaille')
@include('products.addColor')
@include('products.addComplexe')
@include('products.show')



@section('footer')

<div class="d-flex fixed-bottom flex-center bg-info mb-0">

    <div class="p-3   text-center flex-fill">
        <a href="/">
            <i class="text-white fa   fa-home" style="font-size: 22px"></i>
        </a>
    </div>
    <div class="p-3   text-center flex-fill bg-light active border-top border-bottom border-info">
        <a href="/produits">
            <i class="text-info fa   fa-cubes" style="font-size: 22px"></i>
        </a>
    </div>
    <div class="p-3  text-center   ">
        <a href="/clients"><i class="text-white fa   fa-users" style="font-size: 20px"></i>
        </a>
    </div>
    <div class="p-3 text-center  flex-fill flex-fill ">
        <a href="/commandes">
        <i class="text-wgite fa   fa-shopping-bag" style="font-size: 20px"></i>
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