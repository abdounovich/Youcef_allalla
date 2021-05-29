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
   
<hr class="bg-white">

   <div class=" text-white  ">    <div class="d-flex justify-content-between">
{{$commande->product->prix}} Da ({{$benefice=$commande->product->prix-$commande->product->achat}})
    <span class="badge  p-2 text-white  badge-info">   {{$commande->total_price}} Da ({{$benefice*$commande->quantity}})  </span>


    </div>
   </div>
   @else 
    @if ($commande->created_at>$remises->created_at) 
                                @php
                                    $percentage=round(100-$remises->prix*100/$remises->produit->prix);

                                @endphp

                                 <div class="card-text h5 clearfix  ">
                                   @php
                                       $benefice=$remises->prix-$commande->product->achat;
                                   @endphp
                                   <span class="text-success float-sm-left ">{{$remises->produit->prix}} da ({{$benefice}})</span>
                                  <span class="badge ml-2  mr-1 float-sm-left  badge-info"> - {{$percentage}} % </span>
                                  <span class="badge float-right mt-1  mr-1 float-sm-right text-white  badge-info">   {{$commande->total_price}} Da ({{$benefice*$commande->quantity}})  </span>

                                </div>
                            @else 
                            @php
                            $benefice=$remises->prix-$commande->product->achat;
                        @endphp
                            <div class="card-text  text-white mt-1 badge"> {{$commande->product->prix}} da
    <span class="badge  float-right mt-1  mr-1 float-sm-right text-white  badge-success ">   {{$commande->total_price}} Da ({{$commande->quantity*$benefice}})    </span>
   
    <span class="badge float-right mt-1  mr-1 float-sm-right text-white  badge-info">   {{$commande->total_price}} Da ({{$commande->quantity*$benefice}})  </span>

   </div>
   
   @endif
   @endif          <hr class="bg-white ">


   {{-- @if ($commande->yalidine_TN=="")
      


   <form method="POST" action="{{route('commandes.update',$commande->id) }}" >
       @csrf
       <div class="form-group text-dark">
         <input type="text" class="form-control" name="yalidine" id="yalidine"  placeholder=" Tracking Number ">
       </div>
       <button type="submit" class="btn btn-primary col col-12 mb-4">Ajouter</button>
     </form>


@endIf --}}
    
   <div class="d-flex justify-content-between">
   <div  @if ($commande->delivery_type=="Home")
      class=" badge badge-success  mt-2 text-white h5 p-2 m-2  float-left"
   @else 
   class=" badge badge-danger  mt-2 text-white h5 p-2 m-2  float-left"

   @endif >
   {{$commande->delivery_type}}</div>  
   
   
            <div class="badge badge-primary mt-2 text-white h5 p-2 m-2  float-left "><a 
                
            class="text-white" href="https://yalidine.com/app/bordereau.php?tracking={{$commande->yalidine_TN}}" >@if ($commande->yalidine_TN=="")
            @else
            {{$commande->yalidine_TN}}</a></div>
  
 
            <div class="badge badge-warning mt-2 text-dark h5 p-2 m-2  float-right ">{{$commande->slug}}</div>
   </div>
 <div>

