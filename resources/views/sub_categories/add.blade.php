
   
    <button class="btn btn-primary  rounded p-3 m-4"  type="button" data-toggle="collapse" data-target="#product_collapse" aria-expanded="false" aria-controls="collapseExample">
       Ajouter une sous catégorie</button>

 



<div class="row collapse" id="product_collapse">

  
  
    <div class="col col-10 bg-dark p-4 m-2 text-white" style="opacity: 0.9">
        <div class="row text-center text-white mb-3">
            <div class="col  ">
                <h1 class=" rounded p-2" style=" font-size:35px">Ajouter une sous catégorie:</h1>
            </div>
        </div>
    <form method="POST" action="{{route('sub_categories.add') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
              <label for="nom">Nom :</label>
              <input type="text" class="form-control" name="nom" id="nom"  placeholder="Entrer le nom du produit">
            </div>

        
            <div class="form-group">
              <label for="sub_cat">Catégorie : </label>
            <select class="form-control" id="sub_cat" name="cat">
              @foreach ($categories as $item)
              <option value="{{$item->id}}">{{$item->nom}}</option>
          @endforeach              </select>
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
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </form>


    </div>
</div> 
