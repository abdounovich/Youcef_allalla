<div>

    <div class="input-group mb-3">
        <input type="search" wire:model.bounce.500ms="query" name="query" class="form-control" placeholder="Entrer le nom du produit">
      
      </div>
{{$message}}
@if ($message=="")
    
  <div class="row text-center text-white ">
        <div class="col-lg-7 mx-auto">
            <h1 class="h4 shadow bg-dark p-3" style="opacity: 0.9">Liste des produits</h1>
        </div>
    </div>

    

  
@endif


    @foreach ($produits as $produit)
    
@if ($produit->product_type=="simple")
<div class="card bg-dark text-white p-2 mt-5 shadow-lg" >
  <img class="card-img-top img-thumbnail p-1" style="width: 100%; height:300px" src="{{$produit->photo}}" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">{{$produit->nom}}</h4>
    <hr>
    <p>{{$produit->SubCategories->nom}}-->{{$produit->SubCategories->categories->nom}}</p>
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
    <p class="card-text h5">reste: <span class="text-success">{{$produit->quantity}}</span> 
      <a class="btn btn-warning btn-circle float-right  mr-2  " href="{{route('products.edit',$produit->id) }}">
        <span class="text-white  fa fa-edit   "></span>
    </a>
    <a class="btn btn-info btn-circle float-right  mr-2  " href="{{route('remises.addByIdShow',$produit->id) }}">
      <span class="text-white  fa fa-level-down   "></span>
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
  <a class="btn btn-info btn-circle float-right  mr-2  " href="{{route('remises.addByIdShow',$produit->id) }}">
    <span class="text-white  fa fa-level-down   "></span>
</a>
  <a class="btn btn-danger btn-circle float-right  mr-2 " href="{{route('products.delete',$produit->id)}}">
      <span class=" text-white  fa fa-trash  "></span>
  </a>



  </div>
</div>
@endif








@if ($produit->product_type=="complexe")
<div class="card bg-dark text-white p-2 mt-5 shadow-lg" >
  <img class="card-img-top img-thumbnail p-1" style="width: 100%; height:300px" src="{{$produit->photo}}" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">{{$produit->nom}}</h4>
    <hr>
    <p>{{$produit->SubCategories->nom}}-->{{$produit->SubCategories->categories->nom}}</p>
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

     <div class="row">
    @foreach ($produit->color as $color)
                
          
    <div class=" col-4 p-2">
    <img class=" img-thumbnail " src="{{$color->photo}}" style="width: 50px; height:50px" alt=""><p></p>
    <p class="card-text  h5  ">{{$color->couleur}} :  </p>
    @foreach ($color->taille as $taille)
        
  
    <div class=" p-2">
    <p class="card-text  h5  ">{{$taille->taille}} :  
   <span class="ml-1 text-success">{{$taille->quantity}}</span> </p> 
  </div>
    @endforeach
  </div>

  
    @endforeach  
 
</div>  <div class="row float-right">
    <a class="btn btn-warning btn-circle float-right  mr-2  " href="{{route('products.edit',$produit->id) }}">
  <span class="text-white  fa fa-edit   "></span>
</a>

<a class="btn btn-success btn-circle float-right  mr-2 " href="{{route('products.steps',['1',$produit->id])}}">
  <span class=" text-white fa fa-plus   "></span>
</a>
<a class="btn btn-info btn-circle float-right  mr-2  " href="{{route('remises.addByIdShow',$produit->id) }}">
<span class="text-white  fa fa-level-down   "></span>
</a>
<a class="btn btn-danger btn-circle float-right  mr-2 " href="{{route('products.delete',$produit->id)}}">
  <span class=" text-white  fa fa-trash  "></span>
</a>


</div> 

  </div></div>
@endif











@if ($produit->product_type=="taille")
<div class="card bg-dark text-white p-2 mt-5" >
  <img class="card-img-top img-thumbnail p-1" style="width: 100%; height:300px" src="{{$produit->photo}}" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">{{$produit->nom}}</h4>
    <hr>
    <p class="card-text">{{$produit->descreption}}</p>
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
  <a class="btn btn-info btn-circle float-right  mr-2  " href="{{route('remises.addByIdShow',$produit->id) }}">
    <span class="text-white  fa fa-level-down   "></span>
</a>
  <a class="btn btn-danger btn-circle float-right  mr-2 " href="{{route('products.delete',$produit->id)}}">
      <span class=" text-white  fa fa-trash  "></span>
  </a>


  </div>
</div>
@endif











       
                
             @endforeach

</div>


