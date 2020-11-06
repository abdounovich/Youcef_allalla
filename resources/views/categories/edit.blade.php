
   
@extends('layouts.master')

@section('title', 'Ajouter des produits')



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
              <h1 class=" rounded  p-2 h4 mt-2 ">Modifier la  categorie :</h1>
          </div>
      </div>
      
  <form method="POST" action="{{route('categories.edit',$categorie->id) }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group ">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" name="nom" id="nom"  value="{{$categorie->nom}}">
          </div>

       
         
      

          <div class="form-group">
            <div class="row">
            <div class="col-2">
            <input type="file" id="imgupload" onchange="loadFile(event)"  name="photo" hidden>
            <a href="#" onclick="$('#imgupload').trigger('click'); return false;"> 
            <img class="img " id="image" 
            src="{{$categorie->photo}}"
            alt="" width="200" height="200">
            </a>
            </div>
            </div>
            </div>
            <script>
            var loadFile = function(event) {
            var image = document.getElementById('image');
            image.src = URL.createObjectURL(event.target.files[0]);
            };
            </script> 
          
          <button type="submit" class="btn btn-primary col col-12 mb-4">Modifier</button>
        </form>


  </div>
</div> 

 @stop
