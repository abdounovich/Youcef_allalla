



<style>
    .text-gray {
    color: #aaa
}

img {
    height: 170px;
    width: 140px
}
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 2px;
  font-size: 18px;
  border-radius: 15px;
}

</style>







    <div class="row text-center text-white ">
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
@if ($produit->product_type=="simple")
<div class="card bg-dark text-white p-2 mt-5" >
    <img class="card-img-top img-thumbnail p-1" style="width: 100%; height:300px" src="{{$produit->photo}}" alt="Card image">
    <div class="card-body">
      <h4 class="card-title">{{$produit->nom}}</h4>
      <hr>
      <p class="card-text">{{$produit->descreption}}</p>
      <hr>
    @php
        $remises=App\Remise::where("product_id",$produit->id)->first();
        if (!$remises) {
echo"<p class='card-text text-info h5'>prix : ".$produit->prix."da</p>";
}else {
$percentage=round(100-$remises->prix*100/$remises->produit->prix);



echo '   <p class="card-text text-info h5  "> <del class="text-danger">'.$produit->prix.' da  </del> 
        <span class="text-success ml-3">'.$remises->prix.' da</span>                      
        <span class="badge p-1 ml-3 badge-info"> - '.$percentage.' % </span>
      </p>';

}

    @endphp
      <hr>
      <p class="card-text h5">reste: <span class="text-success">{{$produit->quantity}}</span> <a class="btn btn-warning btn-circle float-right  mr-2  " href="{{route('products.edit',$produit->id) }}">
        <span class="text-white  fa fa-edit   "></span>
    </a>
    <a class="btn btn-danger btn-circle float-right  mr-2 " href="{{route('products.delete',$produit->id)}}">
        <span class=" text-white  fa fa-trash  "></span>
    </a></p>


    </div>
  </div>
@endif





@if ($produit->product_type=="color")
<div class="card bg-dark text-white p-2 mt-5" >
    <img class="card-img-top img-thumbnail p-1" style="width: 100%; height:300px" src="{{$produit->photo}}" alt="Card image">
    <div class="card-body">
      <h4 class="card-title">{{$produit->nom}}</h4>
      <hr>
      <p class="card-text">{{$produit->descreption}}</p>
      <p class="card-text h5">reste: <span class="text-success">{{$produit->quantity}}</span> <a class="btn btn-warning btn-circle float-right  mr-2  " href="{{route('products.edit',$produit->id) }}">

            <div class="row">
@foreach ($produit->color as $color)
          
    
      <div class=" col-4 p-2">
      <img class=" img-thumbnail " src="{{$color->photo}}" style="width: 50px; height:50px" alt=""><p></p>
      <p class="card-text  h5  ">{{$color->couleur}} :  </p>
      <p class="card-text  text-success h5 ">{{$color->quantity}} </p> 
    </div>
      @endforeach
      </div>

      <hr>
    @php
        $remises=App\Remise::where("product_id",$produit->id)->first();
        if (!$remises) {
echo"<p class='card-text text-info h5'>prix : ".$produit->prix."da</p>";
}else {
$percentage=round(100-$remises->prix*100/$remises->produit->prix);



echo '   <p class="card-text text-info h5  "> <del class="text-danger">'.$produit->prix.' da  </del> 
        <span class="text-success ml-3">'.$remises->prix.' da</span>                      
        <span class="badge p-1 ml-3 badge-info"> - '.$percentage.' % </span>
      </p>';

}

    @endphp
      <hr>
        <a class="btn btn-warning btn-circle float-right  mr-2  " href="{{route('products.edit',$produit->id) }}">
        <span class="text-white  fa fa-edit   "></span>
    </a>
    <a class="btn btn-danger btn-circle float-right  mr-2 " href="{{route('products.delete',$produit->id)}}">
        <span class=" text-white  fa fa-trash  "></span>
    </a>



    </div>
  </div>
@endif








@if ($produit->product_type=="taille")
<div class="card bg-dark text-white p-2 mt-5" >
    <img class="card-img-top img-thumbnail p-1" style="width: 100%; height:300px" src="{{$produit->photo}}" alt="Card image">
    <div class="card-body">
      <h4 class="card-title">{{$produit->nom}}</h4>
      <hr>
      <p class="card-text">{{$produit->descreption}}</p>
      <p class="card-text h5">reste: <span class="text-success">{{$produit->quantity}}</span> <a class="btn btn-warning btn-circle float-right  mr-2  " href="{{route('products.edit',$produit->id) }}">

            <div class="row">
@foreach ($produit->taille as $taille)
          
    
      <div class=" col-4 p-2">
      <p class="card-text  h5  ">{{$taille->taille}} :  
     <span class="ml-1 text-success">{{$taille->quantity}}</span> </p> 
    </div>
      @endforeach
      </div>

      <hr>
    @php
        $remises=App\Remise::where("product_id",$produit->id)->first();
        if (!$remises) {
echo"<p class='card-text text-info h5'>prix : ".$produit->prix."da</p>";
}else {
$percentage=round(100-$remises->prix*100/$remises->produit->prix);



echo '   <p class="card-text text-info h5  "> <del class="text-danger">'.$produit->prix.' da  </del> 
        <span class="text-success ml-3">'.$remises->prix.' da</span>                      
        <span class="badge p-1 ml-3 badge-info"> - '.$percentage.' % </span>
      </p>';

}

    @endphp
      <hr>
        <a class="btn btn-warning btn-circle float-right  mr-2  " href="{{route('products.edit',$produit->id) }}">
        <span class="text-white  fa fa-edit   "></span>
    </a>
    <a class="btn btn-danger btn-circle float-right  mr-2 " href="{{route('products.delete',$produit->id)}}">
        <span class=" text-white  fa fa-trash  "></span>
    </a></p>


    </div>
  </div>
@endif


         
                  
               @endforeach
 <!-- End -->
                               <div class="d-flex justify-content-center m-4">{{$produits->links()}}</div>
 </ul> <!-- End -->

        </div>
    </div>

