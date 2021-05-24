{{-- <div class="d-flex justify-content-center  my-2" >

    <div class="  col col-12 bg-dark mb-2 rounded  text-white"  id="product_collapse{{$commande->id}}" style="opacity: 0.9">
        <div class=" clearfix col col-12 bg-light  mb-2 p-2 rounded " style="opacity: 0.9">
            <div class="bg-light">
                <div class=" float-left my-2 mr-2">
                    <img style="width: 100px; height:100px" src="{{$commande->client->photo}}" class=" img-thumbnail" alt="">
                </div>

                <div class="mt-4 text-info text-bold text-" style="font-size: 15px">
                    fb/{{$commande->client->facebook}} 
                </div>
                @if ($commande->client->nom!="/" AND $commande->client->prenom!="/")
               
            
                <div class="mt-2 mb-3 text-dark text-bold" style="font-size: 20px">
                    {{$commande->client->nom}} -{{$commande->client->prenom}} 
                 <a class="btn btn-primary" data-toggle="collapse" href="#collapseClient{{$commande->client->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                    edit
                  </a></div>
               
              
                @endif


                
                  
                   
               
                  <div class="collapse p-4" id="collapseClient{{$commande->client->id}}"><p></p>
                    <div class="card card-body">
                        <form method="POST" action="{{route('clients.edit',$commande->client->id) }}" >
                            @csrf
                            <div class="form-group text-dark">
                              <input type="text" value="{{$commande->client->nom}}" class="form-control" name="nom" id="nom"  placeholder="nom ">
                            </div>
                            <div class="form-group text-dark">
                                <input type="text" value="{{$commande->client->prenom}}" class="form-control" name="prenom" id="prenom"  placeholder="prenom ">
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


































 --}}

 <div class="d-flex justify-content-center " >
 <div class=" clearfix col col-12 bg-dark p-2 rounded " style="opacity: 0.8">
    
    <div >
     
  

      

      <style>

.stats {
    background: #f2f5f8 !important;
    color: #000 !important
}

.articles {
    font-size: 10px;
    color: #a1aab9
}

.number1 {
    font-weight: 500;
    font-family: Georgia, 'Times New Roman', Times, serif
}

.followers {
    font-size: 10px;
    color: #a1aab9
}

.number2 {
    font-weight: 500
}

.rating {
    font-size: 10px;
    color: #a1aab9
}

.number3 {
    font-weight: 500
}
      </style>


<div class="collapse p-4" id="collapseClient{{$commande->client->id}}"><p></p>
    <div class="card card-body">
        <form method="POST" action="{{route('clients.edit',$commande->client->id) }}" >
            @csrf
            <div class="form-group text-dark">
              <input type="text" value="{{$commande->client->nom}}" class="form-control" name="nom" id="nom"  placeholder="nom ">
            </div>
            <div class="form-group text-dark">
                <input type="text" value="{{$commande->client->prenom}}" class="form-control" name="prenom" id="prenom"  placeholder="prenom ">
              </div>

            <button type="submit" class="btn btn-success col col-12 mb-4">Save changes</button>
          </form>                    </div>
  </div>

            <div class="card p-2">
                <div class="d-flex align-items-center">
                       
        
                    <div class="image img-thumbnail bg-dark mt-0"> <img src="{{$commande->client->photo}}" style="width: 50px; height:50px" class="rounded border border-dark"  > 
                    
                    
                    </div>

                    <div class="ml-2 w-100">
                                <a data-toggle="collapse" 
                                href="#collapseClient{{$commande->client->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <i   class=" float-right bg-warning p-2  text-dark rounded-circle fa fa-pencil"></i>
                                </a>

                                    
                                @if ($commande->client->nom=="/" AND $commande->client->prenom=="/")
                                FB : 
                                @else
                                <h5 class="mb-0 mt-1">{{$commande->client->nom}} {{$commande->client->prenom }} 

                                @endIf
                            </h5> <a href="#" > {{$commande->client->facebook}} 
                        </a>
                      {{--   <div class="button mt-2 d-flex flex-row align-items-center"> 
                          

                            <a class="btn btn-sm btn-outline-primary w-100" data-toggle="collapse" 
                            href="#collapseClient{{$commande->client->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                edit
                             </a>
                            </div> --}}
                           
                         
                    </div>

                    @php
                    $ByClientInactiveCommandes=App\Commande::where("type",1)->where("client_id",$commande->client->id)->count();
                    $ByClientActiveCommandes=App\Commande::where("type",2)->where("client_id",$commande->client->id)->count();
                    $ByClientDelivredCommandes=App\Commande::where("type",3)->where("client_id",$commande->client->id)->count();
                    $ByClientcanceledByAdminCommandes=App\Commande::where("type",4)->where("client_id",$commande->client->id)->count();
                    $ByClientcanceledByClientCommandes=App\Commande::where("type",5)->where("client_id",$commande->client->id)->count();
                    $ByClientenrouteCommandes=App\Commande::where("type",6)->where("client_id",$commande->client->id)->count();

                @endphp 
              


                </div> <div class="p-2 mt-2 d-flex bg-dark justify-content-between rounded text-white ">
                    <span class="btn btn-secondary btn-circle" >
                        <span>{{$ByClientInactiveCommandes}}</span>
                    </span> 
                    <span class="btn btn-primary btn-circle" >
                        <span>{{$ByClientActiveCommandes}}</span>
                    </span> 
                    <span class="btn btn-warning btn-circle" >
                        <span>{{$ByClientenrouteCommandes}}</span>
                    </span> 
                    <span class="btn btn-success btn-circle" >
                        <span>{{$ByClientDelivredCommandes}}</span>
                    </span>     <span class="btn btn-danger btn-circle" >
                        <span>{{$ByClientcanceledByClientCommandes}}</span>
                    </span> 

                           
                        </div>
                <div class=" text-dark">
                    <i class="text-success fa fa-map-marker m-2 mr-2 "></i>{{$commande->client->address}}
                </div>
        
                <div class=" text-dark d-flex justify-content-between">
                    <span><i class="text-danger fa fa-flag mr-2 m-2 "></i>{{$commande->client->wilaya}}
               </span>
        
               
                    <span><i class="text-primary  fa fa-phone ml-2 m-2 "></i>                    <a class="text-dark" href="tel: {{$commande->client->phone}}"> {{$commande->client->phone}}  </a>   
                    </span> </div>
            </div>


           




       {{--  @if ($commande->client->nom=="/" AND $commande->client->prenom=="/")
              
            @else
        <div class=" text-dark text-bold" style="font-size: 18px">
            {{$commande->client->nom}} - {{$commande->client->prenom}} 
         <a class="btn btn-primary" data-toggle="collapse" href="#collapseClient{{$commande->client->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
             edit
          </a></div>
       
          <div class="collapse p-4" id="collapseClient{{$commande->client->id}}"><p></p>
            <div class="card card-body">
                <form method="POST" action="{{route('clients.edit',$commande->client->id) }}" >
                    @csrf
                    <div class="form-group text-dark">
                      <input type="text" value="{{$commande->client->nom}}" class="form-control" name="nom" id="nom"  placeholder="nom ">
                    </div>
                    <div class="form-group text-dark">
                        <input type="text" value="{{$commande->client->prenom}}" class="form-control" name="prenom" id="prenom"  placeholder="prenom ">
                      </div>

                    <button type="submit" class="btn btn-success col col-12 mb-4">Save changes</button>
                  </form>                    </div>
          </div>

        @endif
 --}}
       
    {{--      <div class=" text-dark mr-2">
            <div class=" float-right col col-12  ">
                @php
                    $ByClientInactiveCommandes=App\Commande::where("type",1)->where("client_id",$commande->client->id)->count();
                    $ByClientActiveCommandes=App\Commande::where("type",2)->where("client_id",$commande->client->id)->count();
                    $ByClientDelivredCommandes=App\Commande::where("type",3)->where("client_id",$commande->client->id)->count();
                    $ByClientcanceledByAdminCommandes=App\Commande::where("type",4)->where("client_id",$commande->client->id)->count();
                    $ByClientcanceledByClientCommandes=App\Commande::where("type",5)->where("client_id",$commande->client->id)->count();
                    $ByClientenrouteCommandes=App\Commande::where("type",6)->where("client_id",$commande->client->id)->count();

                @endphp 
              

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
        </div> --}}
    </div>
</div>


</div>