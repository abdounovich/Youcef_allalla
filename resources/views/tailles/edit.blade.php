
   
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
              <h1 class=" rounded  p-2 h4 mt-2 ">Modifier la  taille :</h1>
          </div>
      </div>
      
  <form method="POST" action="{{route('tailles.edit',$taille->id) }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group ">
            <label for="nom">taille :</label>
            <input type="text" class="form-control" name="taille" id="couleur"  value="{{$taille->taille}}">
          </div>
         
          <div class="form-group ">
            <label for="nom">quantity :</label>
            <input type="text" class="form-control" name="quantity" id="quantity"  value="{{$taille->quantity}}">
            <input type="hidden"  name="product_id" id="quantity"  value="{{$taille->product_id}}">

          </div>
         

          
          <button type="submit" class="btn btn-primary col col-12 mb-4">Modifier</button>
        </form>


  </div>
</div> 

 @stop
