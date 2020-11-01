



<style>
    .text-gray {
    color: #aaa
}

img {
    height: 170px;
    width: 140px
}
</style>







    <div class="row text-center text-white mb-5">
        <div class="col-lg-7 mx-auto">
            <h1 class="h4 shadow bg-dark p-3" style="opacity: 0.9">Liste des produits</h1>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group  shadow-lg">
                <!-- list group item-->
                @foreach ($produits as $produit)




                <div class="card p-2" >
                    <img class="card-img-top img-thumbnail p-1" style="width: 100%; height:300px" src="{{$produit->photo}}" alt="Card image">
                    <div class="card-body">
                      <h4 class="card-title">{{$produit->nom}}</h4>
                      <hr>
                     <a href="{{route('products.edit',$produit->id) }}">
                          <i class="text-warning m-2 fa fa-edit fa-2x"></i>
                      </a>
                      <a href="{{route('products.delete',$produit->id)}}">
                          <i class=" text-danger m-2 fa fa-trash fa-2x"></i>
                      </a>
                      <hr>
                      <p class="card-text">{{$produit->descreption}}</p>
                      <hr>
                      <p class="card-text text-info h4">prix : {{$produit->prix}} da</p>
                      <hr>
                      <p class="card-text h5">reste: <span class="text-success">{{$produit->quantity}}</span></p>


                    </div>
                  </div>
               @endforeach
 <!-- End -->
                               <div class="m-2 p-2">{{$produits->links()}}</div>
 </ul> <!-- End -->

        </div>
    </div>

