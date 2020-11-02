
   <div class="  mt-2 d-flex justify-content-center ">
    <a class="btn btn-info text-white   my-4 mr-5"  
    type="button" data-toggle="collapse" data-target="#product_collapse" aria-expanded="false" aria-controls="collapseExample"
    ><i class="fa fa-plus mr-2">  </i> Ajouter un produit</a>

 </div>



<div class="  d-flex justify-content-center " >
    <div class=" collapse col col-12 bg-dark my-4 rounded     text-white"  id="product_collapse" style="opacity: 0.9">
        <div class="row text-center text-white mb-3">
            <div class="col  ">
                <h1 class=" rounded  p-2 h4 mt-2 ">Ajouter un produit :</h1>
            </div>
        </div>
    <form method="POST" action="{{route('products.add') }}" enctype="multipart/form-data">
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
                    <input type="file" id="imgupload" onchange="loadFile(event)"  name="photo" hidden>
                <a href="#" onclick="$('#imgupload').trigger('click'); return false;"> 
                   <img class="img " id="image" 
                   src="https://res.cloudinary.com/ds9qfm1ok/image/upload/v1595881085/gallery-131964752828011266_ko0lhf.png"
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
                <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Entrer La quantité">
              </div>
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
