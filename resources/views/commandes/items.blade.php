@php
   $remises=App\Remise::where("product_id",$commande->product->id)->first();@endphp
   @if (!$remises) 
   
   <div class="mt-2" ><span class="  text-secondary">{{$commande->created_at->format("d-m-y H:i")}}</span></div>
   <div class="card-text  text-white mt-1  h5"> {{$commande->product->prix}} da 
    <span class="badge float-right mt-1  mr-1 float-sm-right text-white  badge-success">   {{$commande->total_price}} Da  </span>

    
   </div>

   @else 
    @if ($commande->created_at>$remises->created_at) 
                                @php
                                    $percentage=round(100-$remises->prix*100/$remises->produit->prix);

                                @endphp
                                  <div class="mt-2" ><span class="  text-secondary">{{$commande->created_at->format("d-m-y H:i")}}</span></div>

                                 <div class="card-text h5 clearfix  ">
                                   <span class="text-white float-sm-left ">{{$remises->produit->prix}} da</span>
                                  <span class="badge ml-2  mr-1 float-sm-left  badge-info"> - {{$percentage}} % </span>
                                  <span class="badge mt-1 float-right  mr-1 float-sm-right text-white  badge-success">   {{$commande->total_price}} Da  </span>

                                </div>


                            @else 
                            <div class="mt-2" ><span class="  text-secondary">{{$commande->created_at->format("d-m-y H:i")}}</span></div>
   <div class="card-text  text-white mt-1  h5"> {{$commande->product->prix}} da
    <span class="badge  float-right mt-1  mr-1 float-sm-right text-white  badge-success">   {{$commande->total_price}} Da  </span>
 
   </div>
   
   @endif
   @endif