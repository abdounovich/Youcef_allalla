@php
   $remises=App\Remise::where("product_id",$commande->product->id)->first();
   date_default_timezone_set("Africa/Algiers");
    carbon\Carbon::setLocale('fr');@endphp   
   <div class="my-2" ><span class="  text-secondary float-left">{{$commande->created_at->DiffForHumans()}}  
  </span>
  
</div>
 
   @if (!$remises) 
   
   <div class="card-text  text-white mt-1  h5"> {{$commande->product->prix}} da 
    <span class="badge float-right mt-1  mr-1 float-sm-right text-white  badge-success">   {{$commande->total_price}} Da  </span>

    
   </div>

   @else 
    @if ($commande->created_at>$remises->created_at) 
                                @php
                                    $percentage=round(100-$remises->prix*100/$remises->produit->prix);

                                @endphp

                                 <div class="card-text h5 clearfix  ">
                                   <span class="text-white float-sm-left ">{{$remises->produit->prix}} da</span>
                                  <span class="badge ml-2  mr-1 float-sm-left  badge-info"> - {{$percentage}} % </span>
                                  <span class="badge mt-1 float-right  mr-1 float-sm-right text-white  badge-success">   {{$commande->total_price}} Da  </span>

                                </div>


                            @else 
                            <div class="card-text  text-white mt-1  h5"> {{$commande->product->prix}} da
    <span class="badge  float-right mt-1  mr-1 float-sm-right text-white  badge-success">   {{$commande->total_price}} Da  </span>
 
   </div>
   
   @endif
   @endif