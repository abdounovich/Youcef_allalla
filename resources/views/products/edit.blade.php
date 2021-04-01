
   
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




  

















 
 
  
 
 
 
 
   
   @if ($product->product_type=="simple")
<div class="mt-4  d-flex justify-content-center " >
  <div class="  col col-12 bg-dark  my-4 rounded     text-white"   style="opacity: 0.9">
      <div class="row text-center text-white mb-3">
          <div class="col  ">
                 <h2 class=" rounded p-2">Modifier:</h2>
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
                 <option @if ($item->id==$product->SubCategories->id)
                     selected
                 @endif value="{{$item->id}}">{{$item->nom}}->{{$item->categories->nom}}</option>
               @endforeach              </select> 
               </div>
             <button type="submit" class="btn btn-primary col col-12 my-3">Modifier</button>
           </form>
 
 
     </div>
 </div> 


 @endif





  
   
 @if ($product->product_type=="color")
 






<div class="  d-flex justify-content-center " >
  <div class="  col col-12 bg-dark my-4 rounded     text-white"  id="color_collapse" style="opacity: 0.9">
      <div class="row text-center text-white mb-3">
          <div class="col  ">
              <h1 class=" rounded  p-2 h4 mt-2 ">Ajouter un produit avec couleurs :</h1>
          </div>
      </div>
  <form method="POST" action="" enctype="multipart/form-data">
          @csrf
          <div class="form-group ">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" name="nom" id="nom" value="{{$product->nom}}"  placeholder="Entrer le nom du produit">
          </div>

          <div class="form-group">
              <label for="descreption">Descreption </label>
              <textarea class="form-control" name="descreption" id="descreption" rows="3">{{$product->descreption}}</textarea>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-2">
                  <input type="file" id="Pimgupload" onchange="loadFiles(event)"  name="photo" hidden>
              <a href="#" onclick="$('#Pimgupload').trigger('click'); return false;"> 
                 <img class="img " id="Pimg" 
                 src="{{$product->photo}}"
                  alt="" width="200" height="200">
              </a>
                </div>
                
              </div>
                                  
                                           
                              </div>
                              <script>
                                  var loadFiles = function(event) {
                                      var image = document.getElementById('Pimg');
                                      image.src = URL.createObjectURL(event.target.files[0]);
                                  };
                                  </script>   
       
       <div class="form-group">
        <label for="cat">Couleur :</label>

       <input type="hidden" name="index" value="{{$product->color->count()}}" id="ColorIndex">
       <input type="hidden" value="{{$product->quantity}}" name="quantity">


<a class="btn btn-success m-2" href="{{route('colors.add',$product->id) }}"> <i class="fa fa-plus"></i></a>
        <div id="ColorDiv">
          <div class="row ml-2">
            @foreach ($product->color as $color)
          
    
            <div class=" col-4 p-2">
             
        

            <img class=" img-thumbnail " src="{{$color->photo}}" style="width: 50px; height:50px" alt=""><p></p>
            <p>{{$color->couleur}}  </p> 
                      
            <p>{{$color->quantity}}</p>
            <div class="row">
              <a class="btn btn-warning btn-circle float-right  m-2  " href="{{route('colors.edit',$color->id) }}">
              <span class="text-white  fa fa-edit   "></span>
          </a>
          <a class="btn btn-danger btn-circle float-right  m-2 " href=" {{route('colors.delete',$color->id)}} ">
              <span class=" text-white  fa fa-trash  "></span>
          </a>
            </div></div>
            @endforeach
       
                            
          </div>    
        </div>

   
       
       

      </div>

      
      <script language="javascript">


        function addC() {
       
         
          var index = document.getElementById('ColorIndex'); 
          index.value=Number(index.value )+ 1;
          var id = index.value;



            //Create an input type dynamically.   
            var smallDivElement = document.createElement("div");
            smallDivElement.setAttribute("id", 'Id'+id);
            smallDivElement.setAttribute("class", 'col-4');

            var inputElement2= document.createElement("input");

            //Assign different attributes to the element. 
            inputElement2.setAttribute("type", 'text');
            inputElement2.setAttribute("name",  'Cbutton'+id);
            inputElement2.setAttribute("class",  'form-control ');
            inputElement2.setAttribute("placeholder",  'taille');



            var inputElement3= document.createElement("p");

            
            var inputElement4 = document.createElement("input");

            //Assign different attributes to the element. 
            inputElement4.setAttribute("type", 'text');
            inputElement4.setAttribute("name",  'Qbutton'+id);
            inputElement4.setAttribute("class",  'form-control mt-3 ');
            inputElement4.setAttribute("placeholder",  'quantité');


            var inputElement5= document.createElement("img");

//Assign different attributes to the element. 
inputElement5.setAttribute("src", 'https://res.cloudinary.com/ds9qfm1ok/image/upload/v1595881085/gallery-131964752828011266_ko0lhf.png');
inputElement5.setAttribute("class",  'img');
inputElement5.setAttribute("id",  'image'+id);
inputElement5.setAttribute("style",  'width: 80px; height:80px');


var inputElement6= document.createElement("input");
inputElement6.setAttribute("type",  'file');
inputElement6.setAttribute("id",  'imgupload'+id);
inputElement6.setAttribute("name",  'photo'+id);
inputElement6.setAttribute("style",  'display:none');


inputElement6.setAttribute("onchange",  'UplC('+id+')');

var HrefImageElement= document.createElement("a");
HrefImageElement.setAttribute("onclick",  "$('#imgupload"+id+"').trigger('click'); return false;");
HrefImageElement.setAttribute("href",  "#");




            var BigDiv = document.getElementById("ColorDiv");
            //Append the element in page (in span).  
            BigDiv.appendChild(smallDivElement);
            var SmallDiv = document.getElementById("Id"+id);
            //Append the element in page (in span).  
            SmallDiv.appendChild(inputElement2);
            SmallDiv.appendChild(inputElement4);
            SmallDiv.appendChild(inputElement3);
            HrefImageElement.appendChild(inputElement5);
            SmallDiv.appendChild(inputElement6);
            SmallDiv.appendChild(HrefImageElement);




           
         
    
        }

        function UplC(id) {



                                    var image = document.getElementById('image'+id);
                                    image.src = URL.createObjectURL(event.target.files[0]);
                                  }                               

    </script>
            <div class="form-group">
              <label for="prix">Prix : </label>
            <input type="text" class="form-control" value="{{$product->prix}}" name="prix" id="prix" placeholder="prix en dianars">
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
           

           

          <button type="submit" class="btn btn-primary col col-12 my-2">Modifier</button>
        </form>


  </div>
</div> 

 
 
  @endif












  @if ($product->product_type=="complexe")
 






  <div class="  d-flex justify-content-center " >
    <div class="  col col-12 bg-dark my-4 rounded     text-white"  id="color_collapse" style="opacity: 0.9">
        <div class="row text-center text-white mb-3">
            <div class="col  ">
                <h1 class=" rounded  p-2 h4 mt-2 ">Ajouter un produit avec couleurs :</h1>
            </div>
        </div>
    <form method="POST" action="" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
              <label for="nom">Nom :</label>
              <input type="text" class="form-control" name="nom" id="nom" value="{{$product->nom}}"  placeholder="Entrer le nom du produit">
            </div>
  
            <div class="form-group">
                <label for="descreption">Descreption </label>
                <textarea class="form-control" name="descreption" id="descreption" rows="3">{{$product->descreption}}</textarea>
              </div>
  
              <div class="form-group">
                <div class="row">
                  <div class="col-2">
                    <input type="file" id="Pimgupload" onchange="loadFiles(event)"  name="photo" hidden>
                <a href="#" onclick="$('#Pimgupload').trigger('click'); return false;"> 
                   <img class="img " id="Pimg" 
                   src="{{$product->photo}}"
                    alt="" width="200" height="200">
                </a>
                  </div>
                  
                </div>
                                    
                                             
                                </div>
                                <script>
                                    var loadFiles = function(event) {
                                        var image = document.getElementById('Pimg');
                                        image.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                    </script>   
         
         <div class="form-group">
          <label for="cat">Couleur :</label>
  
         <input type="hidden" name="index" value="{{$product->color->count()}}" id="ColorIndex">
         <input type="hidden" value="{{$product->quantity}}" name="quantity">
  
  
  <a class="btn btn-success m-2" href="{{route('colors.add',$product->id) }}"> <i class="fa fa-plus"></i></a>
          <div id="ColorDiv">
            <div class="row ml-2">
              @foreach ($product->color as $color)
            
      
              <div class=" col-4 p-2">
               
                <div class="row">
                  <a class="btn btn-warning btn-circle float-right  m-2  " href="{{route('colors.edit',$color->id) }}">
                  <span class="text-white  fa fa-edit   "></span>
              </a>
              <a class="btn btn-danger btn-circle float-right  m-2 " href=" {{route('colors.delete',$color->id)}} ">
                  <span class=" text-white  fa fa-trash  "></span>
              </a>
                </div>
  
              <img class=" img-thumbnail " src="{{$color->photo}}" style="width: 50px; height:50px" alt=""><p></p>
              <p>{{$color->couleur}}  </p> 
                        
             </div>
              




            </div>
            <div class="row ml-2">
              <div class="form-group">
                <label for="cat">Taille :</label>
               <input type="hidden" name="index" value="{{$product->taille->count()}}" id="ColorIndex">
               <input type="hidden" value="{{$product->quantity}}" name="quantity">
      
        
        <a class="btn btn-success m-2" href="{{route('tailles.add',$product->id) }}"> <i class="fa fa-plus"></i></a>
                <div id="ColorDiv">
                  <div class="row ml-2">
                    @foreach ($color->taille as $taille)
                  
            
                    <div class=" col-4 p-2">
                     
                
        
                    <p>{{$taille->taille}}  </p> 
                              
                    <p>{{$taille->quantity}}</p>
                    <div class="row">
                      <a class="btn btn-warning btn-circle float-right  m-2  " href=" {{route('tailles.edit',$taille->id) }} ">
                      <span class="text-white  fa fa-edit   "></span>
                  </a>
                  <a class="btn btn-danger btn-circle float-right  m-2 " href=" {{route('tailles.delete',$taille->id)}} ">
                      <span class=" text-white  fa fa-trash  "></span>
                  </a>
                    </div></div>
                    @endforeach
               
                                    
                  </div>    
                </div>
        
           
               
               
        
              </div>
        
              
              <script language="javascript">
        
        
                function addC() {
               
                 
                  var index = document.getElementById('ColorIndex'); 
                  index.value=Number(index.value )+ 1;
                  var id = index.value;
        
        
        
                    //Create an input type dynamically.   
                    var smallDivElement = document.createElement("div");
                    smallDivElement.setAttribute("id", 'Id'+id);
                    smallDivElement.setAttribute("class", 'col-4');
        
                    var inputElement2= document.createElement("input");
        
                    //Assign different attributes to the element. 
                    inputElement2.setAttribute("type", 'text');
                    inputElement2.setAttribute("name",  'Cbutton'+id);
                    inputElement2.setAttribute("class",  'form-control ');
                    inputElement2.setAttribute("placeholder",  'taille');
        
        
        
                    var inputElement3= document.createElement("p");
        
                    
                    var inputElement4 = document.createElement("input");
        
                    //Assign different attributes to the element. 
                    inputElement4.setAttribute("type", 'text');
                    inputElement4.setAttribute("name",  'Qbutton'+id);
                    inputElement4.setAttribute("class",  'form-control mt-3 ');
                    inputElement4.setAttribute("placeholder",  'quantité');
        
        
                    var inputElement5= document.createElement("img");
        
        //Assign different attributes to the element. 
        inputElement5.setAttribute("src", 'https://res.cloudinary.com/ds9qfm1ok/image/upload/v1595881085/gallery-131964752828011266_ko0lhf.png');
        inputElement5.setAttribute("class",  'img');
        inputElement5.setAttribute("id",  'image'+id);
        inputElement5.setAttribute("style",  'width: 80px; height:80px');
        
        
        var inputElement6= document.createElement("input");
        inputElement6.setAttribute("type",  'file');
        inputElement6.setAttribute("id",  'imgupload'+id);
        inputElement6.setAttribute("name",  'photo'+id);
        inputElement6.setAttribute("style",  'display:none');
        
        
        inputElement6.setAttribute("onchange",  'UplC('+id+')');
        
        var HrefImageElement= document.createElement("a");
        HrefImageElement.setAttribute("onclick",  "$('#imgupload"+id+"').trigger('click'); return false;");
        HrefImageElement.setAttribute("href",  "#");
        
        
        
        
                    var BigDiv = document.getElementById("ColorDiv");
                    //Append the element in page (in span).  
                    BigDiv.appendChild(smallDivElement);
                    var SmallDiv = document.getElementById("Id"+id);
                    //Append the element in page (in span).  
                    SmallDiv.appendChild(inputElement2);
                    SmallDiv.appendChild(inputElement4);
                    SmallDiv.appendChild(inputElement3);
                    HrefImageElement.appendChild(inputElement5);
                    SmallDiv.appendChild(inputElement6);
                    SmallDiv.appendChild(HrefImageElement);
        
        
        
        
                   
                 
            
                }
        
                function UplC(id) {
        
        
        
                                            var image = document.getElementById('image'+id);
                                            image.src = URL.createObjectURL(event.target.files[0]);
                                          }                               
        
            </script>


              @endforeach
         
                              
            </div>    
          </div>
  
     
         
         
  
        </div>
  
        
        <script language="javascript">
  
  
          function addC() {
         
           
            var index = document.getElementById('ColorIndex'); 
            index.value=Number(index.value )+ 1;
            var id = index.value;
  
  
  
              //Create an input type dynamically.   
              var smallDivElement = document.createElement("div");
              smallDivElement.setAttribute("id", 'Id'+id);
              smallDivElement.setAttribute("class", 'col-4');
  
              var inputElement2= document.createElement("input");
  
              //Assign different attributes to the element. 
              inputElement2.setAttribute("type", 'text');
              inputElement2.setAttribute("name",  'Cbutton'+id);
              inputElement2.setAttribute("class",  'form-control ');
              inputElement2.setAttribute("placeholder",  'taille');
  
  
  
              var inputElement3= document.createElement("p");
  
              
              var inputElement4 = document.createElement("input");
  
              //Assign different attributes to the element. 
              inputElement4.setAttribute("type", 'text');
              inputElement4.setAttribute("name",  'Qbutton'+id);
              inputElement4.setAttribute("class",  'form-control mt-3 ');
              inputElement4.setAttribute("placeholder",  'quantité');
  
  
              var inputElement5= document.createElement("img");
  
  //Assign different attributes to the element. 
  inputElement5.setAttribute("src", 'https://res.cloudinary.com/ds9qfm1ok/image/upload/v1595881085/gallery-131964752828011266_ko0lhf.png');
  inputElement5.setAttribute("class",  'img');
  inputElement5.setAttribute("id",  'image'+id);
  inputElement5.setAttribute("style",  'width: 80px; height:80px');
  
  
  var inputElement6= document.createElement("input");
  inputElement6.setAttribute("type",  'file');
  inputElement6.setAttribute("id",  'imgupload'+id);
  inputElement6.setAttribute("name",  'photo'+id);
  inputElement6.setAttribute("style",  'display:none');
  
  
  inputElement6.setAttribute("onchange",  'UplC('+id+')');
  
  var HrefImageElement= document.createElement("a");
  HrefImageElement.setAttribute("onclick",  "$('#imgupload"+id+"').trigger('click'); return false;");
  HrefImageElement.setAttribute("href",  "#");
  
  
  
  
              var BigDiv = document.getElementById("ColorDiv");
              //Append the element in page (in span).  
              BigDiv.appendChild(smallDivElement);
              var SmallDiv = document.getElementById("Id"+id);
              //Append the element in page (in span).  
              SmallDiv.appendChild(inputElement2);
              SmallDiv.appendChild(inputElement4);
              SmallDiv.appendChild(inputElement3);
              HrefImageElement.appendChild(inputElement5);
              SmallDiv.appendChild(inputElement6);
              SmallDiv.appendChild(HrefImageElement);
  
  
  
  
             
           
      
          }
  
          function UplC(id) {
  
  
  
                                      var image = document.getElementById('image'+id);
                                      image.src = URL.createObjectURL(event.target.files[0]);
                                    }                               
  
      </script>
              <div class="form-group">
                <label for="prix">Prix : </label>
              <input type="text" class="form-control" value="{{$product->prix}}" name="prix" id="prix" placeholder="prix en dianars">
              </div>
  
  
              <div class="form-group">
                <label for="sub_cat">Sous Catégorie : </label>
                <select class="form-control" id="sub_cat" name="cat">
                  @foreach ($categories as $item)
                  <option value="{{$item->id}}" @if($item->id == $product->SubCategories->id)
        selected
                    @endif>{{$item->id}}-{{$product->SubCategories->id}}-{{$item->nom}}</option>
              @endforeach              </select>
              </div>
             
  
             
  
            <button type="submit" class="btn btn-primary col col-12 my-2">Modifier</button>
          </form>
  
  
    </div>
  </div> 
  
   
   
    @endif
  




















  @if ($product->product_type=="taille")
 






  <div class="  d-flex justify-content-center " >
    <div class="  col col-12 bg-dark my-4 rounded     text-white"  id="color_collapse" style="opacity: 0.9">
        <div class="row text-center text-white mb-3">
            <div class="col  ">
                <h1 class=" rounded  p-2 h4 mt-2 ">Ajouter un produit avec couleurs :</h1>
            </div>
        </div>
    <form method="POST" action="" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
              <label for="nom">Nom :</label>
              <input type="text" class="form-control" name="nom" id="nom" value="{{$product->nom}}"  placeholder="Entrer le nom du produit">
            </div>
  
            <div class="form-group">
                <label for="descreption">Descreption </label>
                <textarea class="form-control" name="descreption" id="descreption" rows="3">{{$product->descreption}}</textarea>
              </div>
  
              <div class="form-group">
                <div class="row">
                  <div class="col-2">
                    <input type="file" id="Pimgupload" onchange="loadFiles(event)"  name="photo" hidden>
                <a href="#" onclick="$('#Pimgupload').trigger('click'); return false;"> 
                   <img class="img " id="Pimg" 
                   src="{{$product->photo}}"
                    alt="" width="200" height="200">
                </a>
                  </div>
                  
                </div>
                                    
                                             
                                </div>
                                <script>
                                    var loadFiles = function(event) {
                                        var image = document.getElementById('Pimg');
                                        image.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                    </script>   
         
         <div class="form-group">
          <label for="cat">Taille :</label>
         <input type="hidden" name="index" value="{{$product->taille->count()}}" id="ColorIndex">
         <input type="hidden" value="{{$product->quantity}}" name="quantity">

  
  <a class="btn btn-success m-2" href="{{route('tailles.add',$product->id) }}"> <i class="fa fa-plus"></i></a>
          <div id="ColorDiv">
            <div class="row ml-2">
              @foreach ($product->taille as $taille)
            
      
              <div class=" col-4 p-2">
               
          
  
              <p>{{$taille->taille}}  </p> 
                        
              <p>{{$taille->quantity}}</p>
              <div class="row">
                <a class="btn btn-warning btn-circle float-right  m-2  " href=" {{route('tailles.edit',$taille->id) }} ">
                <span class="text-white  fa fa-edit   "></span>
            </a>
            <a class="btn btn-danger btn-circle float-right  m-2 " href=" {{route('tailles.delete',$taille->id)}} ">
                <span class=" text-white  fa fa-trash  "></span>
            </a>
              </div></div>
              @endforeach
         
                              
            </div>    
          </div>
  
     
         
         
  
        </div>
  
        
        <script language="javascript">
  
  
          function addC() {
         
           
            var index = document.getElementById('ColorIndex'); 
            index.value=Number(index.value )+ 1;
            var id = index.value;
  
  
  
              //Create an input type dynamically.   
              var smallDivElement = document.createElement("div");
              smallDivElement.setAttribute("id", 'Id'+id);
              smallDivElement.setAttribute("class", 'col-4');
  
              var inputElement2= document.createElement("input");
  
              //Assign different attributes to the element. 
              inputElement2.setAttribute("type", 'text');
              inputElement2.setAttribute("name",  'Cbutton'+id);
              inputElement2.setAttribute("class",  'form-control ');
              inputElement2.setAttribute("placeholder",  'taille');
  
  
  
              var inputElement3= document.createElement("p");
  
              
              var inputElement4 = document.createElement("input");
  
              //Assign different attributes to the element. 
              inputElement4.setAttribute("type", 'text');
              inputElement4.setAttribute("name",  'Qbutton'+id);
              inputElement4.setAttribute("class",  'form-control mt-3 ');
              inputElement4.setAttribute("placeholder",  'quantité');
  
  
              var inputElement5= document.createElement("img");
  
  //Assign different attributes to the element. 
  inputElement5.setAttribute("src", 'https://res.cloudinary.com/ds9qfm1ok/image/upload/v1595881085/gallery-131964752828011266_ko0lhf.png');
  inputElement5.setAttribute("class",  'img');
  inputElement5.setAttribute("id",  'image'+id);
  inputElement5.setAttribute("style",  'width: 80px; height:80px');
  
  
  var inputElement6= document.createElement("input");
  inputElement6.setAttribute("type",  'file');
  inputElement6.setAttribute("id",  'imgupload'+id);
  inputElement6.setAttribute("name",  'photo'+id);
  inputElement6.setAttribute("style",  'display:none');
  
  
  inputElement6.setAttribute("onchange",  'UplC('+id+')');
  
  var HrefImageElement= document.createElement("a");
  HrefImageElement.setAttribute("onclick",  "$('#imgupload"+id+"').trigger('click'); return false;");
  HrefImageElement.setAttribute("href",  "#");
  
  
  
  
              var BigDiv = document.getElementById("ColorDiv");
              //Append the element in page (in span).  
              BigDiv.appendChild(smallDivElement);
              var SmallDiv = document.getElementById("Id"+id);
              //Append the element in page (in span).  
              SmallDiv.appendChild(inputElement2);
              SmallDiv.appendChild(inputElement4);
              SmallDiv.appendChild(inputElement3);
              HrefImageElement.appendChild(inputElement5);
              SmallDiv.appendChild(inputElement6);
              SmallDiv.appendChild(HrefImageElement);
  
  
  
  
             
           
      
          }
  
          function UplC(id) {
  
  
  
                                      var image = document.getElementById('image'+id);
                                      image.src = URL.createObjectURL(event.target.files[0]);
                                    }                               
  
      </script>
              <div class="form-group">
                <label for="prix">Prix : </label>
              <input type="text" class="form-control" value="{{$product->prix}}" name="prix" id="prix" placeholder="prix en dianars">
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
             
  
             
  
            <button type="submit" class="btn btn-primary col col-12 my-2">Modifier</button>
          </form>
  
  
    </div>
  </div> 
  
   
   
    @endif





  
 @stop
