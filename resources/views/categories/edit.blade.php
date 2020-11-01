
   
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

<div class="row " >

  
  
  <div class="col col-10 bg-dark p-4 m-2 text-white" style="opacity: 0.9">
      <div class="row text-center text-white mb-3">
          <div class="col  ">
              <h1 class=" rounded p-2" style=" font-size:35px">Modifier cette catégorie :</h1>
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
          
          <button type="submit" class="btn btn-primary">modifier</button>
        </form>


  </div>
</div> 

 @stop
