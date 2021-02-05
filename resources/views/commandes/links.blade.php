

{{-- <div class="dropdown">
    <a class="  float-right " type="button" id="dropdownMenuButton" data-toggle="dropdown"  aria-expanded="false">
     <i style="font-size: 20px" class="fa fa-ellipsis-v text-white"></i>
    </a>
</div> --}}


    <div class=" bg-dark" aria-labelledby="">
        <a class="btn btn-danger  btn-circle float-right  mr-1" href="{{route('commandes.delete',$commande->id)}}"  >
            <span class="     fa fa-trash  "></span>
        </a>
        <a class="btn btn-info  btn-circle float-right  mr-1" href="#"  data-toggle="collapse" data-target="#product_collapse{{$commande->id}}" aria-expanded="false" aria-controls="collapseExample">
            <span class="     fa fa-info  "></span>
        </a>
        
      
        
        @if ($commande->type=="1" OR $commande->type=="2"  OR $commande->type=="6" )
        <a class="btn btn-outline-danger  btn-circle float-right  mr-1" href="{{route('commandes.annuler',$commande->id)}}"  >
            <span class="     fa fa-remove  "></span>
        </a>
        @endif
        
        @if ($commande->type=="2")
        <a class="btn btn-success btn-circle float-right   mr-1" href="{{route('commandes.delivration',$commande->id) }}">
            <span class="  fa fa-truck   "></span>
        </a> 
        
        <a class="btn btn-warning btn-circle float-right   mr-1" href="{{route('commandes.return',$commande->id) }}">
            <span class="    fa fa-refresh    "></span>
        </a>
        @endif
        
        @if ($commande->type=="1")
        <a class="btn btn-info btn-circle float-right   mr-1" href="{{route('commandes.confirmation',$commande->id) }}">
            <span class="    fa fa-arrow-down    "></span>
        </a> 
        @endif
        
        
        @if ($commande->type=="6")
        <a class="btn btn-success btn-circle float-right mr-1" href="{{route('commandes.done',$commande->id) }}">
            <span class="    fa fa-check   "></span>
        </a> 
        <a class="btn btn-warning btn-circle float-right   mr-1" href="{{route('commandes.return',$commande->id) }}">
            <span class="    fa fa-refresh  "></span>
        </a> 
        @endif
        
    </div>


