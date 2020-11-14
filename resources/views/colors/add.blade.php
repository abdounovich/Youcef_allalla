
   
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
              <h1 class=" rounded  p-2 h4 mt-2 ">Ajouter une  couleur :</h1>
          </div>
      </div>
      
  <form method="POST" action="{{route('color.add') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group ">
            <label for="nom">couleur :</label>
            <input type="text" class="form-control" name="couleur" id="couleur" >
          </div>
         
          <div class="form-group ">
            <label for="nom">quantité:</label>
            <input type="text" class="form-control" name="quantity" id="quantity" >
          <input type="hidden"  name="product_id" value="{{$product_id}}" id="quantity" >

          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-2">
                <input type="file" id="imgupload1" style=" display:none" onchange="loadFile1(event)"  name="photo1" >
            <a href="#" onclick="$('#imgupload1').trigger('click'); return false;"> 
               <img class="img" id="image1" 
               src="https://res.cloudinary.com/ds9qfm1ok/image/upload/v1595881085/gallery-131964752828011266_ko0lhf.png"
                alt="" style="width: 80px; height:80px" >
            </a>
              </div>
              
            </div>
                                
                                         
                            </div>
                            <script>
                              var loadFile1 = function(event) {
                                  var image = document.getElementById('image1');
                                  image.src = URL.createObjectURL(event.target.files[0]);
                              };
                              </script>  

       
          
          <button type="submit" class="btn btn-primary col col-12 mb-4">ajouter</button>
        </form>


  </div>
</div> 

 @stop
