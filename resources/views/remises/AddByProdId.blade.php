
@extends('layouts.master')

@section('title', 'Ajouter des remises')



@section('content')

@if (\Session::has('success'))
    <div class="alert  alert-info p-2 m-4  ">
        <ul>
            <li class="p-2  text-left">{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif







<div class="  mt-3 mb-2 d-flex justify-content-center ">

 

 

      </div>
      <div class="  d-flex justify-content-center " >
        <div class="  col col-12 bg-dark my-4 rounded     text-white"  id="product_collapse" style="opacity: 0.9">
            <div class="row text-center text-white mb-3">
                <div class="col  ">
                    <h1 class=" rounded  p-2 h4 mt-2 ">Ajouter une remise :</h1>
                </div>
            </div>
    <form method="POST" action="{{route('remises.add') }}" enctype="multipart/form-data">
            @csrf
         

        
            <div class="form-group">
              <label for="sub_cat">Produit : </label>
              <p value="{{$products->id}}">{{$products->nom}} - {{$products->prix}} Da</p>
            </div>

             <div class="form-group ">
              <label for="nom">Prix apres remise :</label>
              <input type="text" class="form-control" name="prix"   placeholder="Entrer le nouveaux prix ">
            </div>
            
            <button type="submit" class="btn btn-primary col col-12 mb-4">Ajouter</button>
          </form>


    </div>
</div> 







@stop