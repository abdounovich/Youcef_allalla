
<div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-dark rounded" style="opacity: 0.9"> 
        commandes  annulées par client :  {{$annuler_par_client_count}}
    </h1>
    </div>
</div>
 


    @foreach ($annuler_par_client as $commande)
        @if ($commande->commande_type=="color")
        <div class="card bg-dark border-dark  mt-2 mb-1" >
            @include('commandes.color')
        </div>

        @elseif($commande->commande_type=="taille")
        <div class="card bg-dark border-dark  mt-2 mb-1" >
            @include('commandes.taille')
        </div>
        @elseif($commande->commande_type=="simple")
        <div class="card bg-dark border-dark  mt-2 mb-1" >
            @include('commandes.simple')
        </div>
        @endif


    @endforeach
    

    <br>

    <div class="d-flex justify-content-center m-4">
        {{$annuler_par_client->links()}}
    </div>
  
  
  




