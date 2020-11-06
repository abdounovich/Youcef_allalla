
   
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
              <h1 class=" rounded  p-2 h4 mt-2 ">Modifier la  remise :</h1>
          </div>
      </div>
      
  <form method="POST" action="{{route('remises.edit',$remise->id) }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group ">
            <label for="nom">Prix :</label>
            <input type="text" class="form-control" name="prix" id="prix"  value="{{$remise->prix}}">
          </div>
          <div class="form-group">
            <label for="product">Produit : </label>
{{$remise->produit->nom}}               <select class="form-control" id="product" name="produit">
            @foreach ($produits as $produit)
         
            <option @if ($produit->nom==$remise->produit->nom)
                selected
            @endif value="{{$produit->id}}">{{$produit->nom}} - {{$produit->prix}} Da</option>
          @endforeach              </select> 
          </div>

       
          
          <button type="submit" class="btn btn-primary col col-12 mb-4">Modifier</button>
        </form>


  </div>
</div> 

 @stop
