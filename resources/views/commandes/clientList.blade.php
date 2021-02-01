<div class="  d-flex justify-content-center " >
    <div class=" collapse col col-12 bg-dark mb-2 rounded  text-white"  id="product_collapse{{$commande->id}}" style="opacity: 0.9">
        <div class=" clearfix col col-12 bg-dark  mb-2 p-2 rounded " style="opacity: 0.9">
            <div class="bg-dark">
                
                <div class=" float-left my-2 mr-2">
                    <img style="width: 100px; height:100px" src="{{$commande->client->photo}}" class=" img-thumbnail" alt="">
                </div>

                <div class="mt-2 text-info h5 ">
                    {{$commande->client->facebook}} 
                </div>

                <div class=" text-white">
                    <i class="text-success fa fa-map-marker mr-2 "></i>{{$commande->client->address}}
                </div>

                <div class=" text-white">
                    <i class="text-danger fa fa-flag mr-2 "></i>{{$commande->client->wilaya}}
                </div>

                <div class=" text-white">
                    <i class="text-primary fa fa-phone mr-2 "></i>{{$commande->client->phone}}
                </div>

                 <div class=" text-white mr-2">
                    <div class=" float-right col col-12  ">
                        @php
                            $ByClientInactiveCommandes=App\Commande::where("type",1)->where("client_id",$commande->client->id)->count();
                            $ByClientActiveCommandes=App\Commande::where("type",2)->where("client_id",$commande->client->id)->count();
                            $ByClientDelivredCommandes=App\Commande::where("type",3)->where("client_id",$commande->client->id)->count();
                            $ByClientcanceledCommandes=App\Commande::where("type",4)->orWhere("type",5)->where("client_id",$commande->client->id)->count();
                            $ByClientenrouteCommandes=App\Commande::where("type",6)->where("client_id",$commande->client->id)->count();

                        @endphp 
                        <span class=" ml-2 ">{{$commande->client->commandes->count()}} 
                        </span> 
                        
                        <i class=" text-warning fa fa-shopping-cart  "> 
                        </i>

                        @if ($ByClientInactiveCommandes>0)
                        <span class=" ml-2 p-1 badge badge-secondary btn-circle ">{{$ByClientInactiveCommandes}}</span> 
                        @endif
                        
                        @if ($ByClientActiveCommandes>0)
                        <span class=" ml-2 p-1 badge badge-primary btn-circle ">{{$ByClientActiveCommandes}}</span></span> 

                        @endif

                        @if ($ByClientDelivredCommandes>0)
                        <span class=" ml-2 p-1 badge btn-success btn-circle ">{{$ByClientDelivredCommandes}}</span>

                        @endif

                        @if ($ByClientenrouteCommandes>0)
                        <span class=" ml-2 p-1 badge btn-warning btn-circle ">{{$ByClientenrouteCommandes}}</span>  

                        @endif

                        @if ($ByClientcanceledCommandes>0)
                        <span class=" ml-2 p-1 badge btn-danger btn-circle ">{{$ByClientcanceledCommandes}}</span> 

                        @endif

                 
 

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>