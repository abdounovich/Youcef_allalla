
      <div class="  mt-3 mb-2 d-flex justify-content-center ">

        <button class="btn btn-primary  rounded p-3 m-4"  type="button" data-toggle="collapse" data-target="#product_collapse" aria-expanded="false" aria-controls="collapseExample">
          <i class="fa fa-plus mr-2">  </i> Ajouter une  remise</button>
    
     
    
          </div>
          <div class="  d-flex justify-content-center " >
            <div class=" collapse col col-12 bg-dark my-4 rounded     text-white"  id="product_collapse" style="opacity: 0.9">
                <div class="row text-center text-white mb-3">
                    <div class="col  ">
                        <h1 class=" rounded  p-2 h4 mt-2 ">Ajouter une remise :</h1>
                    </div>
                </div>
        <form method="POST" action="{{route('remises.add') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group ">
                  <label for="nom">Prix apres remise :</label>
                  <input type="text" class="form-control" name="prix"   placeholder="Entrer le nouveaux prix ">
                </div>
    
            
                <div class="form-group">
                  <label for="sub_cat">Produit : </label>
                <select class="form-control" id="product" name="produit">
                  @foreach ($products as $product)
                  <option value="{{$product->id}}">{{$product->nom}} - {{$product->prix}} Da</option>
              @endforeach              </select>
                </div>
    
              
                
                <button type="submit" class="btn btn-primary col col-12 mb-4">Ajouter</button>
              </form>
    
    
        </div>
    </div> 
    