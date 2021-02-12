



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














  <div class="  d-flex justify-content-center " >
    <div class="  col col-12 bg-dark my-4 rounded     text-white"  id="taille_collapse" style="opacity: 0.9">
        <div class="row text-center text-white mb-3">
            <div class="col  ">
                <h1 class=" rounded  p-2 h4 mt-2 ">Ajouter La couleur :</h1>
            </div>
        </div>
    <form method="POST" action="{{route('products.add.complexeStep1') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
             
            <input type="hidden" value="{{$produit->id}}" class="form-control" name="id" id="id"  >

            <div class="form-group">
                <div class="row">
                  <div class="col-2">
               <img class="img "  
                  src="{{$produit->photo}}"
                    alt="" width="200" height="200">
               
                  </div>
                  
                </div> <label for="nom" class="mt-4">Nom :</label>
              <input type="text" class="form-control" name="nom" id="nom"  placeholder="Entrer la couleur ex : rouge">
            </div>

           

              <div class="form-group">
                <div class="row">
                  <div class="col-2">
                    <input type="file" id="Tailleimgupload" onchange="loadFileTaille(event)"  name="photo" hidden>
                <a href="#" onclick="$('#Tailleimgupload').trigger('click'); return false;"> 
                   <img class="img " id="Tailleimage" 
                   src="https://res.cloudinary.com/ds9qfm1ok/image/upload/v1595881085/gallery-131964752828011266_ko0lhf.png"
                    alt="" width="150" height="150">
                </a>
                  </div>
                  
                </div>
                                    
                                             
                                </div>
                                <script>
                                    var loadFileTaille = function(event) {
                                        var image = document.getElementById('Tailleimage');
                                        image.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                    </script>   
         
         <div class="form-group">
          <label for="cat">Tailles :</label>

         <input type="hidden" name="Tailleindex" value="1" id="Tailleindex">
 

<a class="btn btn-success m-2" onclick="addT()"> <i class="fa fa-plus"></i></a>
          <div id="TailleDiv" class="row">
            <div class="col-4">
            
            
              <input name="Tbutton1" type="text" value="" class="form-control"  placeholder="taille" >
             <p></p>
            <input name="Qbutton1" type="text" value="" class="form-control" placeholder="quantité"> 
            <p></p>          

            </div>    
          </div>

     
         
         

        </div>

        
        <script language="javascript">



          function addT() {
         
            var index = document.getElementById('Tailleindex'); 
            index.value=Number(index.value )+ 1;
            var id = index.value;




              //Create an input type dynamically.   
              var smallDivElement = document.createElement("div");
              smallDivElement.setAttribute("id", 'Id'+id);
              smallDivElement.setAttribute("class", 'col-4');

              var inputElement2= document.createElement("input");

              //Assign different attributes to the element. 
              inputElement2.setAttribute("type", 'text');
              inputElement2.setAttribute("name",  'Tbutton'+id);
              inputElement2.setAttribute("class",  'form-control ');
              inputElement2.setAttribute("placeholder",  'taille');



              var inputElement3= document.createElement("p");

              
              var inputElement4 = document.createElement("input");

              //Assign different attributes to the element. 
              inputElement4.setAttribute("type", 'text');
              inputElement4.setAttribute("name",  'Qbutton'+id);
              inputElement4.setAttribute("class",  'form-control mt-3 ');
              inputElement4.setAttribute("placeholder",  'quantité');




              var BigDiv = document.getElementById("TailleDiv");
              //Append the element in page (in span).  
              BigDiv.appendChild(smallDivElement);
              var SmallDiv = document.getElementById("Id"+id);
              //Append the element in page (in span).  
              SmallDiv.appendChild(inputElement2);
              SmallDiv.appendChild(inputElement4);
              SmallDiv.appendChild(inputElement3);

             
           
      
          }
      </script>
            


              
             
             

             

            <button type="submit" class="btn btn-primary col col-12 my-2">Ajouter</button>
          </form>


    </div>
</div> 





@stop


