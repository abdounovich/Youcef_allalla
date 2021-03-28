  
    <div class="card-body   text-left " >   
    
    <div class="card-text">

   <div>
     <div class="dropdown dropleft float-right">
      <button class="btn text-white" type="button" id="dropdownMenuButton{{$commande->id}}" data-toggle="dropdown" >
       <i class="fa fa-2x text-bold fa-ellipsis-v"></i>
      </button>
      <div class="dropdown-menu " aria-labelledby="dropdownMenuButton{{$commande->id}}">
        <a class="text-dark m-2 p-2 "  href="{{route('commandes.delete',$commande->id)}}"  > 
          <i class="fa fa-trash text-danger m-2"></i> effacer</a>
        </div> 
    </div> 
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
         <i class="btn btn-orange btn-circle"></i>
         @elseif($commande->type=="6")
         <i class="btn btn-warning btn-circle"></i>
       @endif 
      @php
      $image="";
      $text="";
          if($commande->commande_type=="color"){
            $color=App\Color::find($commande->color);
             $image=$color->photo;
             $text=" - ".$color->couleur;
          }
          elseif($commande->commande_type=="complexe"){
            $color=App\Color::find($commande->color);
            $taille=App\Taille::find($commande->taille);

             $image=$color->photo;
             $text=" - ".$color->couleur." - ".$taille->taille;
          }
          elseif($commande->commande_type=="taille"){
            $image=$commande->product->photo;
            $taille=App\Taille::find($commande->taille);

         
         $text=" - ".$taille->taille ;}
          else{$image=$commande->product->photo;
         
          $text="" ;}
      @endphp
   
      <span class="text-wrap"> {{$commande->product->nom}}       
       <span class="text-white ml-2 text-info"> X {{$commande->quantity}}</span>  {{$text}}  </span>
       </span>
    </div>
<p></p>
            
 
       <img class="img-thumbnail custom  p-0 mt-2 " 
       style="width: 100%;height:250px" src="{{$image}}" alt="">

   @include('commandes.items')
   
   @include('commandes.links')

     </div>
    </div>
 @include('commandes.clientList') 
