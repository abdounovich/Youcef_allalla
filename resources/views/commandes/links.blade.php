


<a class="btn btn-outline-light  btn-circle float-right mt-2 mr-1" href="#"  data-toggle="collapse" data-target="#product_collapse{{$commande->id}}" aria-expanded="false" aria-controls="collapseExample">
    <span class=" text-white  fa fa-list  "></span>
</a>
<a class="btn btn-outline-danger btn-circle float-right mt-2 mr-1" href="{{route('commandes.delete',$commande->id)}}">
    <span class=" text-white  fa fa-trash  "></span>
</a>
@if ($commande->type=="1" OR $commande->type=="2" OR $commande->type=="3" OR $commande->type=="6" )
<a class="btn btn-outline-light btn-circle float-right mt-2 mr-1" href="{{route('commandes.annuler',$commande->id)}}"  >
    <span class=" text-white  fa fa-remove border-dark "></span>
</a>
@endif

@if ($commande->type=="2")
<a class="btn btn-outline-success btn-circle float-right  mt-2 mr-1" href="{{route('commandes.delivration',$commande->id) }}">
    <span class="text-white  fa fa-truck border-dark   "></span>
</a> 

<a class="btn btn-outline-warning btn-circle float-right  mt-2 mr-1" href="{{route('commandes.return',$commande->id) }}">
    <span class="text-white  fa fa-refresh border-dark   "></span>
</a>
@endif

@if ($commande->type=="1")
<a class="btn btn-outline-info btn-circle float-right  mt-2 mr-1" href="{{route('commandes.confirmation',$commande->id) }}">
    <span class="text-white  fa fa-arrow-down border-dark   "></span>
</a> 
@endif


@if ($commande->type=="6")
<a class="btn btn-outline-success btn-circle float-right  mt-2 mr-1" href="{{route('commandes.done',$commande->id) }}">
    <span class="text-white  fa fa-check border-dark   "></span>
</a> 
<a class="btn btn-outline-warning btn-circle float-right  mt-2 mr-1" href="{{route('commandes.return',$commande->id) }}">
    <span class="text-white  fa fa-refresh border-dark   "></span>
</a> 
@endif
