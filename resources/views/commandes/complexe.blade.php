  
    <div class="card-body p-4 text-left btn " 
    data-toggle="collapse" 
    data-target="#product_collapse{{$commande->id}}" 
    aria-expanded="false" 
    aria-controls="collapseExample">     <div class="card-text">

   @php
   $taille=App\Taille::find($commande->taille);
   
   @endphp

<p class="h4  text-white text-wrap" > 
    @if ($commande->type=="1")
        <i class="btn btn-warning btn-circle"></i>
    @elseif($commande->type=="2")
    <i class="btn btn-primary btn-circle"></i>
    @elseif($commande->type=="3")
    <i class="btn btn-success btn-circle"></i>
    @elseif($commande->type=="4")
    <i class="btn btn-danger btn-circle"></i>
    @elseif($commande->type=="5")
    <i class="btn btn-danger btn-circle"></i>
    @elseif($commande->type=="6")
    <i class="btn btn-info btn-circle"></i>
  @endif 
  {{$commande->product->nom}}        <span class="text-white"> X {{$commande->quantity}}</span>
   <a class="btn btn-danger  btn-circle float-right  mr-1" href="{{route('commandes.delete',$commande->id)}}"  >
        <span class="     fa fa-trash  "></span>
    </a></p>      
   
    <p class=" text-white text-wrap " >couleur: {{$taille->color->couleur}}  </p>
    <p class=" text-white text-wrap " >Taille: {{$taille->taille}}  </p>


       <img class="img-thumbnail custom  p-0 mt-2 " style="width: 100%;height:250px" src="{{$commande->product->photo}}" alt="">
   
   

       @include('commandes.items')

   
   @include('commandes.links')

</div>
     </div>
   @include('commandes.clientList')