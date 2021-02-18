


<div>

      
  

    <p>
        <div class="row ml-0">
        <a class="btn btn-primary col col-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
             <i class="fa fa-filter"></i> Filtrer        </a>
             <input type="search" wire:model.bounce.500ms="query" name="query" class="form-control col col-8 ml-3" 
             placeholder="Rechercher">
        </div>
      @if ($clients->count()=="0")
    <p class="mt-3 ml-2 text-danger h5">Pas de résultat pour : {{$query}}</p>
    @endif
  
      </p>
      <div class="collapse" id="collapseExample">
        <button class="btn btn-danger text-left "   wire:click="change('all')"  name="categorie" id="inlineRadio1"> 
          <i class="fa fa-times-circle"></i> effacer filtre</button>
        <hr>
        <div class="card card-body">
            
    
  <div class="row">
    
  <button class="btn btn-link "   wire:click="change('nom')"  name="categorie" id="inlineRadio1">nom du produit</button>
  <button  class="btn btn-link"    wire:click="change('prix')"  name="categorie" id="inlineRadio1">Prix </button>
  <div class="col col-10 ml-4">
        <input class="form-check-input " type="radio" wire:click="changetype('simple')" name="categorie" id="inlineRadio1" >
            <label class="form-check-label ml-1" for="inlineRadio1">Simple</label>
            <br>
            <input class="form-check-input " type="radio" wire:click="changetype('taille')" name="categorie" id="inlineRadio2" >
            <label class="form-check-label ml-1" for="inlineRadio2">Taille</label>
            <br>
            <input class="form-check-input " type="radio" wire:click="changetype('color')" name="categorie" id="inlineRadio1" >
            <label class="form-check-label ml-1" for="inlineRadio1">Couleur</label> 
            <br>
            <input class="form-check-input " type="radio" wire:click="changetype('complexe')" name="categorie" id="inlineRadio1" >
            <label class="form-check-label ml-1" for="inlineRadio1">Couleur + taille</label>
       
            </div>
  </div>
        
         
  
  
  
        </div>
      </div>
  
  
  
  
  
  
    <style>
        .text-gray {
           color: #aaa
       }
       
       img {
           height: 170px;
           width: 140px
       }
       .btn-circle {
         width: 30px;
         height: 30px;
         text-align: center;
         padding: 2px;
         font-size: 18px;
         border-radius: 15px;
       }
       img {
           height: 170px;
           width: 140px
       }
       .bg-c-blue {
           background: linear-gradient(45deg,#3a96cc,#0176fc);
       }
       
       .custom{
       
           width: 50px;
           height: 50px;
       
       }
       </style>
       
       
     
    
   
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
      
      
        
    
                   <script type="text/javascript">
                    window.onscroll = function(ev) {
                        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                            window.livewire.emit('loadMore');
                        }
                    };
               </script>
  
   
    
  
  </div>
  
  
  
  
  


