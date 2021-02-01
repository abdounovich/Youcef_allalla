



<style>
    .text-gray {
    color: #aaa
}

img {
    height: 170px;
    width: 140px
}

.tooltip {
  position: relative;
  display: inline-block;
  z-index: -1;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 140px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: -1;
  bottom: 150%;
  left: 50%;
  margin-left: -75px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>






    <div class="row text-center text-white my-5">
        <div class="col-lg-7 mx-auto">
            <h1 class="h4 p-2 shadow bg-dark" style="opacity: 0.9">Liste des clients</h1>
        </div>
    </div>
<div class="container">

    <div class="row">
        <button class="btn btn-info mb-2 " onclick="myFunction()">
       
            Copier</button> <span class="tooltiptext m-3" id="myTooltip"></span>
   
    <div class="tooltip clearfix col col-12 bg-dark  mb-2 p-2 rounded " style="opacity: 0.9">
        <textarea class="form-control" name="" id="myInput"  rows="5" >@foreach ($pending_clients as $pending_client){{$pending_client->phone}},@endforeach</textarea>
    
    </div> </div>

        <script>
            function myFunction() {
              var copyText = document.getElementById("myInput");
              copyText.select();
              copyText.setSelectionRange(0, 99999);
              document.execCommand("copy");
              
              var tooltip = document.getElementById("myTooltip");
              tooltip.innerHTML = " Copied :)";
            }
            
            function outFunc() {
              var tooltip = document.getElementById("myTooltip");
              tooltip.innerHTML = "Copy to clipboard";
            }
            </script>
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




      <div class="d-flex justify-content-center m-4">{{$clients->links()}}</div>


