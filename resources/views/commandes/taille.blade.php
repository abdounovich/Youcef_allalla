  
    <div class="card-body text-left btn " 
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
  </p>       <p class=" text-white text-wrap " > {{$taille->taille}} <span class=" text-white"> X {{$commande->quantity}}</span>
    <a class="btn btn-danger  btn-circle float-right  mr-1" href="{{route('commandes.delete',$commande->id)}}"  >
        <span class="     fa fa-trash  "></span>
    </a>
    </p>
   

       <img class="img-thumbnail custom  p-0 mt-2 " style="width: 100%;height:250px" src="{{$commande->product->photo}}" alt="">
   
   

   @php
   $remises=App\Remise::where("product_id",$commande->product->id)->first();

   
   if (!$remises) {
    echo'<p class="card-text  text-white mt-3  h5"> '.$commande->product->prix*$commande->quantity.' da <span class=" small float-right">'.$commande->created_at.'</span></p>'  ;
   }else {
    if ($commande->created_at>$remises->created_at) {
                                $percentage=round(100-$remises->prix*100/$remises->produit->prix);

                                echo '   <p class="card-text mt-3 h5  "> 
                            <span class="text-white ">'.$remises->prix.' da</span>                      
                            <span class="badge p-1  badge-info"> - '.$percentage.' % </span>
                                   <span class=" float-right  small text-white">'.$commande->created_at.'</span></p>
';


                            }else {
                                echo'<p class="card-text  text-white mt-3  h5"> '.$commande->product->prix*$commande->quantity.' da <span class=" small float-right">'.$commande->created_at.'</span></p>'  ;

                            }
   
   }
   
   @endphp
   
   @include('commandes.links')

</div>
     </div>
   @include('commandes.clientList')