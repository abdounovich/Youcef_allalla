






<div class="  d-flex justify-content-center " >
    <div class=" collapse col col-12 bg-dark my-4 rounded     text-white"  id="taille_color_collapse" style="opacity: 0.9">
        <div class="row text-center text-white mb-3">
            <div class="col  ">
                <h1 class=" rounded  p-2 h4 mt-2 ">Ajouter un produit avec couleurs + tailles :</h1>
            </div>
        </div>
    <form method="POST" action="{{route('products.add.color') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
              <label for="nom">Nom :</label>
              <input type="text" class="form-control" name="nom" id="nom"  placeholder="Entrer le nom du produit">
            </div>

            <div class="form-group">
                <label for="descreption">Descreption </label>
                <textarea class="form-control" name="descreption" id="descreption" rows="3"></textarea>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-2">
                    <input type="file" id="Pimgupload" onchange="loadFiles(event)"  name="photo" hidden>
                <a href="#" onclick="$('#Pimgupload').trigger('click'); return false;"> 
                   <img class="img " id="Pimg" 
                   src="https://res.cloudinary.com/ds9qfm1ok/image/upload/v1595881085/gallery-131964752828011266_ko0lhf.png"
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

         <input type="hidden" name="index" value="1" id="ColorIndex">
 

<a class="btn btn-success m-2" onclick="addC()"> <i class="fa fa-plus"></i></a>
          <div id="ColorDiv" class="row">
            <div class="col-4">
            
            
              <input name="Cbutton1" type="text" value="" class="form-control"  placeholder="Couleur" >
             <p></p>
            <input name="Qbutton1" type="text" value="" class="form-control" placeholder="quantité"> 
                  <p></p>  
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
                <input type="text" class="form-control" name="prix" id="prix" placeholder="prix en dianars">
              </div>


              <div class="form-group">
                <label for="sub_cat">Sous Catégorie : </label>
              <select class="form-control" id="sub_cat" name="sub_cat">
                @foreach ($sub_categories as $item)
                <option value="{{$item->id}}">{{$item->nom}}->{{$item->categories->nom}}</option>
            @endforeach              </select>
              </div>
             
             

             

            <button type="submit" class="btn btn-primary col col-12 my-2">Ajouter</button>
          </form>


    </div>
</div> 
