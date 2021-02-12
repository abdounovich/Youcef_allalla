
<div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-warning rounded" style="opacity: 0.9"> 
       En route :  {{$enroute_commandes_count}}
    </h1>
    </div>
</div>
 


    @foreach ($enroute_commandes as $commande)
        @if ($commande->commande_type=="color")
        <div style="border-width: 10px" class="card bg-dark border-warning     mt-2 mb-1" >
            @include('commandes.color')
        </div>

        @elseif($commande->commande_type=="taille")
        <div style="border-width: 10px" class="card bg-dark border-warning     mt-2 mb-1" >
            @include('commandes.taille')
        </div>
        @elseif($commande->commande_type=="simple")
        <div style="border-width: 10px" class="card bg-dark border-warning     mt-2 mb-1" >
            @include('commandes.simple')
        </div>
        @elseif($commande->commande_type=="complexe")
        <div style="border-width: 10px" class="card bg-dark border-primary     mt-2 mb-1" >
            @include('commandes.complexe')
        </div>
        @endif


    @endforeach
    

    <br>

    <div class="d-flex justify-content-center m-4">
        {{$enroute_commandes->links()}}
    </div>
  
  
  




