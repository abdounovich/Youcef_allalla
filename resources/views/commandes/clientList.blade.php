<div class="d-flex justify-content-center  my-2" >

    <div class="  col col-12 bg-dark mb-2 rounded  text-white"  id="product_collapse{{$commande->id}}" style="opacity: 0.9">
        <div class=" clearfix col col-12 bg-light  mb-2 p-2 rounded " style="opacity: 0.9">
            <div class="bg-light">
                <div class=" float-left my-2 mr-2">
                    <img style="width: 100px; height:100px" src="{{$commande->client->photo}}" class=" img-thumbnail" alt="">
                </div>

                <div class="mt-4 text-info text-bold text-" style="font-size: 15px">
                    fb/{{$commande->client->facebook}} 
                </div>
                @if ($commande->client->full_name=="vide")
                <form method="POST" action="{{route('clients.edit',$commande->client->id) }}" >
                    @csrf
                    <div class="form-group text-dark">
                      <input type="text" class="form-control" name="full_name" id="full_name"  placeholder="Entrer le nom ">
                    </div>
                    <button type="submit" class="btn btn-primary col col-12 mb-4">Ajouter</button>
                  </form>
                @else
                <div class="mt-2 mb-3 text-dark text-bold" style="font-size: 20px">
                    {{$commande->client->full_name}} 
                 <a class="btn btn-primary" data-toggle="collapse" href="#collapseClient{{$commande->client->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                    edit
                  </a></div>
               
              
                @endif


                
                  
                   
               
                  <div class="collapse" id="collapseClient{{$commande->client->id}}">
                    <div class="card card-body">
                        <form method="POST" action="{{route('clients.edit',$commande->client->id) }}" >
                            @csrf
                            <div class="form-group text-dark">
                              <input type="text" value="{{$commande->client->full_name}}" class="form-control" name="full_name" id="full_name"  placeholder="Entrer le nom ">
                            </div>
                            <button type="submit" class="btn btn-success col col-12 mb-4">Save changes</button>
                          </form>                    </div>
                  </div>



                
                <div class=" text-dark">
                    <i class="text-success fa fa-map-marker mr-2 "></i>{{$commande->client->address}}
                </div>

                <div class=" text-dark">
                    <i class="text-danger fa fa-flag mr-2 "></i>{{$commande->client->wilaya}}
                </div>

                <div class=" text-dark">

                    <i class="text-primary fa fa-phone mr-2 "></i>
                    <a class="text-dark" href="tel: {{$commande->client->phone}}"> {{$commande->client->phone}}  </a>   

                   
                </div>

                 <div class=" text-dark mr-2">
                    <div class=" float-right col col-12  ">
                        @php
                            $ByClientInactiveCommandes=App\Commande::where("type",1)->where("client_id",$commande->client->id)->count();
                            $ByClientActiveCommandes=App\Commande::where("type",2)->where("client_id",$commande->client->id)->count();
                            $ByClientDelivredCommandes=App\Commande::where("type",3)->where("client_id",$commande->client->id)->count();
                            $ByClientcanceledCommandes=App\Commande::where("type",4)->where("client_id",$commande->client->id)->count();
                            $ByClientenrouteCommandes=App\Commande::where("type",6)->where("client_id",$commande->client->id)->count();
                            $ByClientCanceledByAdminCommandes=App\Commande::where("type",5)->where("client_id",$commande->client->id)->count();


                        @endphp 
                        
                        
                     

                        @if ($ByClientInactiveCommandes>0)
                        <span class="  badge badge-secondary  ">
                            {{$ByClientInactiveCommandes}}</span> 
                        @endif
                        
                        @if ($ByClientActiveCommandes>0)
                        <span class=" ml-2 badge badge-primary  ">{{$ByClientActiveCommandes}}</span></span> 

                        @endif
                        @if ($ByClientenrouteCommandes>0)
                        <span class=" ml-2  badge btn-warning ">{{$ByClientenrouteCommandes}}</span>  

                        @endif

                        @if ($ByClientDelivredCommandes>0)
                        <span class=" ml-2 badge btn-success  ">{{$ByClientDelivredCommandes}}</span>

                        @endif

                       
                        @if ($ByClientcanceledCommandes>0)
                        <span class=" ml-2  badge btn-danger  ">{{$ByClientcanceledCommandes}}</span> 

                        @endif

                 
 
                        @if ($ByClientCanceledByAdminCommandes>0)
                        <span class="  badge badge-secondary  ">
                            {{$ByClientCanceledByAdminCommandes}}</span> 
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>