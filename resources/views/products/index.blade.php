
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



<div class="  mt-3 mb-2 d-flex justify-content-center ">
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
    <a href="" class="col col-10 btn btn-info p-2 m-2" data-toggle="collapse" data-target="#taille_color_collapse" aria-expanded="false">Produit avec tailles + couleurs </a>

 </div>
  </div>

@include('products.addSimple')
@include('products.addTaille')
@include('products.addColor')
@include('products.addColorTaille')
@include('products.show')





@stop