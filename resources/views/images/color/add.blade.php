

@extends('layouts.master')

@section('title', 'Ajouter des remises')



@section('content')
@if (\Session::has('success'))
    <div class="alert  alert-info p-2 m-4 mt-5  ">
        <ul>
            <li class="p-2  text-left">{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

<div class="container mt-5" > <a href="{{route('products')}}" class="mt-5"> <i class="p-2 h1  fa fa-arrow-circle-o-left text-white bg-info"></i></a>

  <div class="row"> 
  

   @foreach ($product->image as $image)   
    <div class="col col-6 mt-3"><img class="img img-fluid mx-auto d-block" id="images" 
src="{{$image->image}}"
 alt=""  >
 
    </div>
   @endforeach

  </div>
      




    
 


<div class="  mt-3 mb-2 d-flex justify-content-center ">




    </div>
    <div class="  d-flex justify-content-center " >
      <div class="  col col-12 bg-dark my-4 rounded     text-white"  id="product_collapse" style="opacity: 0.9">
          <div class="row text-center text-white mb-3">
              <div class="col  ">
                  <h1 class=" rounded  p-2 h4 mt-2 ">Ajouter une image :</h1>
              </div>
          </div>
  <form method="POST" action="{{route('images.add',$product->id) }}" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <div class="row">
                <div class="col-2">
                  <input type="file" id="imgupload" onchange="loadFileSimple(event)"  name="photo" hidden>
              <a href="#" onclick="$('#imgupload').trigger('click'); return false;"> 
                 <img class="img " id="image" 
                 src="https://res.cloudinary.com/ds9qfm1ok/image/upload/v1595881085/gallery-131964752828011266_ko0lhf.png"
                  alt="" width="200" height="200">
              </a>
                </div>
                
              </div>
                                  
                                           
                              </div>
                              <script>
                                  var loadFileSimple = function(event) {
                                      var image = document.getElementById('image');
                                      image.src = URL.createObjectURL(event.target.files[0]);
                                  };
                                  </script>   


      
      

      
         <input type="hidden" name="product_id" value="{{$product->id}}" id="">

        
          
          <button type="submit" class="btn btn-primary col col-12 mb-4">Ajouter</button>
        </form>


  </div>
</div> 
@stop