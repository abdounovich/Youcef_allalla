


<div class="  d-flex justify-content-center " >
  <div class="  collapse col col-12 bg-dark my-4 rounded     text-white"  id="complexe_collapse" style="opacity: 0.9">
      <div class="row text-center text-white mb-3">
          <div class="col  ">
              <h1 class=" rounded  p-2 h4 mt-2 ">Ajouter un produit complexe:</h1>
          </div>
      </div>
  <form method="POST" action="{{route('products.add.complexe') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group ">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" name="nom" id="nom_c"  placeholder="Entrer le nom du produit">
          </div>

          <div class="form-group">
              <label for="descreption">Descreption </label>
              <textarea class="form-control" name="descreption" id="descreption_c" rows="3"></textarea>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-2">
                  <input type="file" id="imgupload_c" onchange="loadFileComplexe(event)"  name="photo1" hidden>
              <a href="#" onclick="$('#imgupload_c').trigger('click'); return false;"> 
                 <img class="img" id="image_c" src="https://res.cloudinary.com/ds9qfm1ok/image/upload/v1595881085/gallery-131964752828011266_ko0lhf.png"
                  alt="" width="201" height="200">
              </a>
                </div>
                
              </div>
                                  
                                           
                              </div>
                              <script>
                                  var loadFileComplexe = function(event) {
                                      var image1 = document.getElementById('image_c');
                                      image1.src = URL.createObjectURL(event.target.files[0]);
                                  };
                                  </script>   


      
    
            <div class="form-group">
              <label for="prix">Prix : </label>
              <input type="text" class="form-control" name="prix" id="prix_c" placeholder="prix en dianars">
            </div>

           
            <div class="form-group">
              <label for="sub_cat">Sous Catégorie : </label>
            <select class="form-control" id="sub_cat_c" name="sub_cat">
              @foreach ($sub_categories as $item)
              <option value="{{$item->id}}">{{$item->nom}}->{{$item->categories->nom}}</option>
          @endforeach              </select>
            </div>
           
           

           

          <button type="submit" class="btn btn-primary col col-12 my-2">Ajouter</button>
        </form>


  </div>
</div> 
