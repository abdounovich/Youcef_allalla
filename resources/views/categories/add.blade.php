
   
       <div class="  mt-3 mb-2 d-flex justify-content-center ">

        <div class="btn btn-primary  rounded p-3 m-4"   
        data-toggle="collapse"
         data-target="#product_collapse" 
         aria-expanded="false" 
         aria-controls="collapseExample">
          <i class="fa fa-plus mr-2">  </i> Ajouter une remise</div>
    
     
    
          </div>

 


          <div class="  d-flex justify-content-center " >
            <div class=" collapse col col-12 bg-dark my-4 rounded     text-white"  id="product_collapse" style="opacity: 0.9">
                <div class="row text-center text-white mb-3">
                    <div class="col  ">
                        <h1 class=" rounded  p-2 h4 mt-2 ">Ajouter une categorie :</h1>
                    </div>
                </div>
    <form method="POST" action="{{route('categories.add') }}"  enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
              <label for="nom">Nom :</label>
              <input type="text" class="form-control" name="nom" id="nom"  placeholder="Entrer le nom du produit">
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


            
<button type="submit" class="btn btn-primary col col-12 mb-4">Ajouter</button>
</form>


    </div>
</div> 