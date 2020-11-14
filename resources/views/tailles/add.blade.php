
   
@extends('layouts.master')

@section('title', 'modifier des remises')



@section('content')

@if (\Session::has('success'))
    <div class="alert  alert-info  mt-4  text-left ">
        <ul>
            <li class="p-3">{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif


<div class="  d-flex justify-content-center " >
  <div class="  col col-12 bg-dark my-4 rounded     text-white"  id="product_collapse" style="opacity: 0.9">
      <div class="row text-center text-white mb-3">
          <div class="col  ">
              <h1 class=" rounded  p-2 h4 mt-2 ">Ajouter une  taille :</h1>
          </div>
      </div>
      
  <form method="POST" action="{{route('taille.add') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group ">
            <label for="nom">taille :</label>
            <input type="text" class="form-control" name="taille" id="couleur" >
          </div>
         
          <div class="form-group ">
            <label for="nom">quantité:</label>
            <input type="text" class="form-control" name="quantity" id="quantity" >
          <input type="hidden"  name="product_id" value="{{$product_id}}"  >

          </div>
         

       
          
          <button type="submit" class="btn btn-primary col col-12 mb-4">ajouter</button>
        </form>


  </div>
</div> 

 @stop
