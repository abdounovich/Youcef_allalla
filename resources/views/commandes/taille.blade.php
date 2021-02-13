  
    <div class="card-body   text-left btn " 
    data-toggle="collapse" 
    data-target="#product_collapse{{$commande->id}}" 
    aria-expanded="false" 
    aria-controls="collapseExample">     <div class="card-text">

   <div>
       <span class="h4  text-white text-wrap" > 
         @if ($commande->type=="1")
             <i class="btn btn-secondary btn-circle"></i>
         @elseif($commande->type=="2")
         <i class="btn btn-primary btn-circle"></i>
         @elseif($commande->type=="3")
         <i class="btn btn-success btn-circle"></i>
         @elseif($commande->type=="4")
         <i class="btn btn-danger btn-circle"></i>
         @elseif($commande->type=="5")
         <i class="btn btn-danger btn-circle"></i>
         @elseif($commande->type=="6")
         <i class="btn btn-warning btn-circle"></i>
       @endif 
      
   
       {{$commande->product->nom}}        
       <span class="text-white ml-2 text-info"> X {{$commande->quantity}}</span>
       <div class="dropdown float-right">
        <button class="btn btn-dark " type="button" id="dropdownMenuButton" data-toggle="dropdown" >
         <i class="fa text-bold fa-ellipsis-v"></i>
        </button>
        <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
          <a class="text-dark p-2 m-2"  href="{{route('commandes.delete',$commande->id)}}"  >
effacer</a>        </div>
      </div>

       </span>
    </div>
<p></p>

@if ($commande->commande_type=="taille")
@php
$taille=App\Taille::find($commande->taille);
@endphp
<p class=" text-white text-wrap " >Taille: {{$taille->taille}} </p>
    
@elseIf ($commande->commande_type=="simple")
<p></p>
@elseIf ($commande->commande_type=="color")
@php
$color=App\Color::find($commande->color);
@endphp
<img class="img-thumbnail custom  p-0 mt-2 " style="width: 100%;height:250px" src="{{$commande->product->photo}}" alt="">

<p class="text-white text-wrap " >Couleur : {{$color->couleur}} </p>

@elseIf ($commande->commande_type=="complexe")
@php
$taille=App\Taille::find($commande->taille);
@endphp
<p class=" text-white text-wrap mt-4 " >Couleur : <span class="text-info">{{$taille->color->couleur}}</span></p>
<p class=" text-white text-wrap mt-2 "> Taille : <span class="text-info">{{$taille->taille}}</span>  </p>

@endIf
       <img class="img-thumbnail custom  p-0 mt-2 " style="width: 100%;height:250px" src="{{$commande->product->photo}}" alt="">
   
   

       @include('commandes.items')

   
   @include('commandes.links')

</div>
     </div>
   @include('commandes.clientList')