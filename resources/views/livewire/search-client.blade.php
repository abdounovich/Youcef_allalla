<div>

    <div class="input-group mb-3">
        <input type="search" wire:model.bounce.500ms="query" name="query" class="form-control" placeholder="Entrer le nom du produit">
      
      </div>
{{$message}}
@if ($message=="")
    
  <div class="row text-center text-white mt-5 ">
        <div class="col-lg-7 mt-5 mx-auto">
            <h1 class="h4 shadow bg-dark p-3" style="opacity: 0.9">Liste des Clients</h1>
        </div>
    </div>

@endif

<div class="row">
    @foreach ($clients as $client)
    <div class=" clearfix col col-12 bg-dark  mb-2 p-2 rounded " style="opacity: 0.9">

                <div class="bg-dark">
                    
<div class="float-right btn btn-danger rounded-circle "> 
<a href="{{route('clients.delete',$client->id) }}">
    <i class="  text-white  fa fa-trash"></i>
</a>
</div>
                    <div class=" float-left my-2 mr-2">
                        <img style="width: 100px; height:100px" src="{{$client->photo}}" class=" img-thumbnail" alt="">
                    </div>
    
                    <div class="mt-2 text-info h5 ">
                        {{$client->facebook}} 
                    </div>
    
                    <div class=" text-white">
                        <i class="text-success fa fa-map-marker mr-2 "></i>{{$client->address}}
                    </div>
    
                    <div class=" text-white">
                        <i class="text-danger fa fa-flag mr-2 "></i>{{$client->wilaya}}
                    </div>
    
                    <div class=" text-white">
                        <i class="text-primary fa fa-phone mr-2 "></i>{{$client->phone}}
                    </div>
    
                     <div class=" text-white mr-2">
                        <div class=" float-right col col-12  ">
                            @php
                                $ByClientInactiveCommandes=App\Commande::where("type",1)->where("client_id",$client->id)->count();
                                $ByClientActiveCommandes=App\Commande::where("type",2)->where("client_id",$client->id)->count();
                                $ByClientDelivredCommandes=App\Commande::where("type",3)->where("client_id",$client->id)->count();
                                $ByClientcanceledByAdminCommandes=App\Commande::where("type",4)->where("client_id",$client->id)->count();
                                $ByClientcanceledByClientCommandes=App\Commande::where("type",5)->where("client_id",$client->id)->count();
                                $ByClientenrouteCommandes=App\Commande::where("type",6)->where("client_id",$client->id)->count();
    
                            @endphp 
                            <span class=" ml-2 ">{{$client->commandes->count()}} 
                            </span> 
                            
                            <i class=" text-warning fa fa-shopping-cart  "> 
                            </i>
    
                            @if ($ByClientInactiveCommandes>0)
                            <span class=" ml-2 badge badge-secondary rounded-circle ">{{$ByClientInactiveCommandes}}</span> 
                            @endif
                            
                            @if ($ByClientActiveCommandes>0)
                            <span class=" ml-2 badge badge-primary rounded-circle ">{{$ByClientActiveCommandes}}</span></span> 
    
                            @endif
    
                            @if ($ByClientDelivredCommandes>0)
                            <span class=" ml-2 badge badge-success rounded-circle ">{{$ByClientDelivredCommandes}}</span>
    
                            @endif
    
                            @if ($ByClientenrouteCommandes>0)
                            <span class=" ml-2 badge badge-warning rounded-circle ">{{$ByClientenrouteCommandes}}</span>  
    
                            @endif
    
                            @if ($ByClientcanceledByAdminCommandes>0)
                            <span class=" ml-2 badge badge-danger rounded-circle ">{{$ByClientcanceledByAdminCommandes}}</span> 
    
                            @endif
    
                            @if ($ByClientcanceledByClientCommandes>0)
                            <span class=" ml-2 badge badge-danger rounded-circle ">{{$ByClientcanceledByClientCommandes}}</span>
     
                            @endif
     
    
                        </div>
                    </div>
                </div>
    </div>
    @endforeach
</div>
</div>


