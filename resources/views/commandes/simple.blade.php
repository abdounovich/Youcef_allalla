  
    <div class="card-body text-left ">
     <div class="card-text">
        @include('commandes.links')

   
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
       </p>
   
       <img class="img-thumbnail custom  p-0 mt-2 " style="width: 100%;height:250px" src="{{$commande->product->photo}}" alt="">
       <p class="small mt-3 text-white">{{$commande->created_at}}</p>

   @php
   $remises=App\Remise::where("product_id",$commande->product->id)->first();
   if (!$remises) {
    echo"<p class='card-text  text-white  mt-3 h5'>Total : ".$commande->product->prix*$commande->quantity." da </p>";
   }else {
    if ($commande->created_at>$remises->created_at) {
                                $percentage=round(100-$remises->prix*100/$remises->produit->prix);

                        echo '   <p class="card-text mt-3 h5  "> <del class="text-danger">'.$commande->product->prix.' da  </del> 
                            <span class="text-white ml-3">'.$remises->prix.' da</span>                      
                            <span class="badge p-1 ml-3 badge-info"> - '.$percentage.' % </span>
                        </p>';


                            }else {
                                echo"<p class='card-text  text-white  mt-3 h5'>Total : ".$commande->product->prix*$commande->quantity." da </p>";

                            }
   
   }
   
   @endphp
   
   
     </div>
   </div>
   @include('commandes.clientList')