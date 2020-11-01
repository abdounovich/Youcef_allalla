
   
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




  

















 
 
  
 
 
 
 <div class="row ">
 
   
   
     <div class="col col-10 bg-dark p-4 m-2 text-white" style="opacity: 0.9">
         <div class="row text-center text-white mb-3">
             <div class="col  ">
                 <h1 class=" rounded p-2" style=" font-size:35px">Modifier le produit :</h1>
             </div>
         </div>
     <form method="POST" action="{{route('products.edit',$product->id) }}" enctype="multipart/form-data">
             @csrf
             <div class="form-group ">
               <label for="nom">Nom :</label>
             <input type="text" class="form-control" name="nom" id="nom"  value="{{$product->nom}}" placeholder="Entrer le nom du produit">
             </div>
 
             <div class="form-group">
                 <label for="descreption">Descreption </label>
                 <textarea class="form-control"    name="descreption" id="descreption" rows="3">{{$product->descreption}}</textarea>
               </div>
               <div class="form-group">
                <div class="row">
                <div class="col-2">
                <input type="file" id="imgupload" onchange="loadFile(event)"  name="photo" hidden>
                <a href="#" onclick="$('#imgupload').trigger('click'); return false;"> 
                <img class="img " id="image" 
                src="{{$product->photo}}"
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
             <div class="form-group">
                 <label for="quantity">Quantité : </label>
                 <input type="text" class="form-control" value="{{$product->quantity}}" name="quantity" id="quantity" placeholder="Entrer La quantité">
               </div>
               <div class="form-group">
                 <label for="prix">Prix : </label>
                 <input type="text" class="form-control"  value="{{$product->prix}}" name="prix" id="prix" placeholder="prix en dianars">
               </div>
 
 
               <div class="form-group">
                 <label for="sub_cat">Sous Catégorie : </label>
{{$product->SubCategories->nom}}               <select class="form-control" id="sub_cat" name="sub_cat">
                 @foreach ($categories as $item)
              
                 <option @if ($item->nom==$product->SubCategories->nom)
                     selected
                 @endif value="{{$item->id}}">{{$item->nom}}->{{$item->categories->nom}}</option>
               @endforeach              </select> 
               </div>
             <button type="submit" class="btn btn-primary">Modifier</button>
           </form>
 
 
     </div>
 </div> 
 @stop
