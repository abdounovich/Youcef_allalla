<div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-dark rounded" style="opacity: 0.9"> commande délivrée :  {{$delivré_commandes_count}}</h1>
    </div>
</div>
    @foreach ($delivré_commandes as $commande)
    <div class=" btn card bg-success border-dark  mt-2 mb-1" >
      
     <div class="card-body text-left ">
      <p class="card-text">
      <img class="img-thumbnail custom  p-0 " src="{{$commande->product->photo}}" alt="">
      
    <a class="btn btn-danger btn-circle float-right mt-2 mr-1" href="{{route('commandes.delete',$commande->id)}}">
        <span class=" text-white  fa fa-trash border-dark "></span>
    </a>
    <a class="btn btn-light btn-circle float-right mt-2 mr-1" href="#"  data-toggle="collapse"
    data-target="#product_collapse{{$commande->id}}" 
    aria-expanded="false" 
    aria-controls="collapseExample">
        <span class=" text-dark  fa fa-list border-dark "></span>
    </a>
    
    <p class="h4  text-white text-wrap" >{{$commande->product->nom}}</p>
      </p>
      </div>
    </div>
    <div class="  d-flex justify-content-center " >
    <div class=" collapse col col-12 bg-dark mb-5 rounded  text-white"  id="product_collapse{{$commande->id}}" style="opacity: 0.9">
     <div class=" clearfix col col-12 bg-dark  mb-5 p-2 rounded " style="opacity: 0.9">
         <div class="bg-dark">
<div class=" float-left my-2 mr-2"><img style="width: 100px; height:100px" src="{{$commande->client->photo}}"  class=" img-thumbnail" alt=""></div>
<div class="mt-2 text-info h5 ">{{$commande->client->facebook}} </div>
<div class=" text-white"><i class="text-success fa fa-map-marker mr-2 "></i>{{$commande->client->address}}</div>
</div>
<div class=" text-white mr-2">
 <div class=" float-right col col-12  "><i class=" text-warning fa fa-shopping-cart  "></i><span class="mr-3 ml-2 ">commandes : {{$commande->client->commandes->count()}}</span>
     <i class=" text-info fa fa-phone  "></i><span class=" ml-1">  {{$commande->client->phone}}</span></div>

</div>


</div></div></div>
    @endforeach
    

<br>

    <div class="d-flex justify-content-center m-4">{{$delivré_commandes->links()}}</div>
  
  
  




