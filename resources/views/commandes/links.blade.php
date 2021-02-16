{{-- <div class="dropdown">
    <a class="  float-right " type="button" id="dropdownMenuButton" data-toggle="dropdown"  aria-expanded="false">
     <i style="font-size: 20px" class="fa fa-ellipsis-v text-white"></i>
    </a>
</div> --}}
<hr color="white">
    <div class=" bg-dark  " >
        <a class="  btn-circle float-right " >
            <span class="text-white float-right h3 ">{{$commande->slug}}</span> 
        </a>
        
       
       
        @if ($commande->type=="1" OR $commande->type=="2"  OR $commande->type=="6" )
        <a class="btn btn-danger  btn-circle float-left  mr-1" href="{{route('commandes.annuler',$commande->id)}}"  >
            <span class="     fa fa-remove  "></span>
        </a>
        @endif
        
        @if ($commande->type=="2")
        <a class="btn btn-success btn-circle float-left   mr-1" href="{{route('commandes.delivration',$commande->id) }}">
            <span class="  fa fa-truck   "></span>
        </a> 
        
        <a class="btn btn-warning btn-circle float-left   mr-1" href="{{route('commandes.return',$commande->id) }}">
            <span class="    fa fa-refresh    "></span>
        </a>
        @endif
        
        @if ($commande->type=="1")
        <a class="btn btn-primary btn-circle float-left   mr-1" href="{{route('commandes.confirmation',$commande->id) }}">
            <span class="    fa fa-arrow-down    "></span>
        </a> 
        @endif
        
        
        @if ($commande->type=="6")
        <a class="btn btn-success btn-circle float-left mr-1" href="{{route('commandes.done',$commande->id) }}">
            <span class="    fa fa-check   "></span>
        </a> 
        <a class="btn btn-warning btn-circle float-left   mr-1" href="{{route('commandes.return',$commande->id) }}">
            <span class="    fa fa-refresh  "></span>
        </a> 
        @endif

    </div>
