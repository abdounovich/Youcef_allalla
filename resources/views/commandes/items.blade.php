@php
   $remises=App\Remise::where("product_id",$commande->product->id)->first();
   date_default_timezone_set("Africa/Algiers");
    carbon\Carbon::setLocale('fr');@endphp   
   <div class="my-2" ><span class="  text-secondary ">{{$commande->created_at->DiffForHumans()}}  
  </span>
  <span class="  text-secondary float-right">{{$commande->product->code_interne}}  
  </span>

</div>
 
   @if (!$remises) 
   
   <div class="card-text  text-white mt-1  h5"> {{$commande->product->prix}} Da ({{$benefice=$commande->product->prix-$commande->product->achat}})
    <span class="badge float-right mt-1  mr-1 float-sm-right text-white  badge-info">   {{$commande->total_price}} Da ({{$benefice*$commande->quantity}})  </span>


    
   </div>
   @else 
    @if ($commande->created_at>$remises->created_at) 
                                @php
                                    $percentage=round(100-$remises->prix*100/$remises->produit->prix);

                                @endphp

                                 <div class="card-text h5 clearfix  ">
                                   @php
                                       $benefice=$remises->produit->prix-$commande->product->achat;
                                   @endphp
                                   <span class="text-success float-sm-left ">{{$remises->produit->prix}} da ({{$benefice}})</span>
                                  <span class="badge ml-2  mr-1 float-sm-left  badge-info"> - {{$percentage}} % </span>
                                  <span class="badge float-right mt-1  mr-1 float-sm-right text-white  badge-info">   {{$commande->total_price}} Da ({{$benefice*$commande->quantity}})  </span>

                                </div>
                            @else 
                            @php
                            $benefice=$commande->product->prix-$commande->product->achat;
                        @endphp
                            <div class="card-text  text-white mt-1  h5"> {{$commande->product->prix}} da
    <span class="badge  float-right mt-1  mr-1 float-sm-right text-white  badge-success">   {{$commande->total_price}} Da ({{$commande->quantity*$benefice}})    </span>
   
    <span class="badge float-right mt-1  mr-1 float-sm-right text-white  badge-info">   {{$commande->total_price}} Da ({{$commande->quantity*$benefice}})  </span>

   </div>
   
   @endif
   @endif