  
    <div class="card-body text-left ">
     <div class="card-text">
        @include('commandes.links')

   
       <p class="h4  text-white text-wrap" >{{$commande->product->nom}}        <span class="text-white"> X {{$commande->quantity}}</span>
       </p>
   
       <img class="img-thumbnail custom  p-0 " style="width: 100%;height:300px" src="{{$commande->product->photo}}" alt="">
       <p class="small mt-3 text-white">{{$commande->created_at}}</p>

   @php
   $remises=App\Remise::where("product_id",$commande->product->id)->first();
   if (!$remises) {
    echo"<p class='card-text  text-white  mt-3 h5'>Total : ".$commande->product->prix*$commande->quantity." da </p>";
   }else {
   $percentage=round(100-$remises->prix*100/$remises->produit->prix);
   
   
   
   echo '   <p class="card-text mt-3 h5  "> <del class="text-dark">'.$commande->product->prix.' da  </del> 
   <span class="text-white ml-3">'.$remises->prix.' da</span>                      
   <span class="badge p-1 ml-3 badge-info"> - '.$percentage.' % </span>
   </p>';
   
   }
   
   @endphp
   
   
     </div>
   </div>
   @include('commandes.clientList')