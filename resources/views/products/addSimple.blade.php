


<div class="  d-flex justify-content-center " >
    <div class="  collapse col col-12 bg-dark my-4 rounded     text-white"  id="simple_collapse" style="opacity: 0.9">
        <div class="row text-center text-white mb-3">
            <div class="col  ">
                <h1 class=" rounded  p-2 h4 mt-2 ">Ajouter un produit simple:</h1>
            </div>
        </div>
    <form method="POST" action="{{route('products.add.simple') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
              <label for="nom">Nom :</label>
              <input type="text" class="form-control" name="nom" id="nom"  placeholder="Entrer le nom du produit">
            </div>
            <div class="form-group ">
              <label for="nom">code interne :</label>
              <input type="text" class="form-control" name="code_interne" id="code_interne"  placeholder="Entrer le code du produit">
            </div>
            <div class="form-group">
                <label for="descreption">Descreption </label>
                <textarea class="form-control" name="descreption" id="descreption" rows="3"></textarea>
              </div>

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
  

        
      
  <div class="form-group">
    <label for="prix">Prix d'achat: </label>
    <input type="text" class="form-control" name="achat" id="achat" placeholder="prix en dianars">
  </div>
          <div class="form-group">
            <label for="prix">Prix de vente : </label>
            <input type="text" class="form-control" name="prix" id="prix" placeholder="prix en dianars">
          </div>

              <div class="form-group ">
                <label for="nom">Quantité :</label>
                <input type="text" class="form-control" name="quantity" id="quantity"  placeholder="Entrer la quantité">
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
