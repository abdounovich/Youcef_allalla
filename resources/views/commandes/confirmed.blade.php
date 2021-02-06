
<div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-primary rounded" style="opacity: 0.9"> 
      confirmées :  {{$active_commandes_count}}
    </h1>
    </div>
</div>
 


    @foreach ($active_commandes as $commande)
        @if ($commande->commande_type=="color")
        <div style="border-width: 10px" class="card bg-dark border-primary     mt-2 mb-1" >
            @include('commandes.color')
        </div>

        @elseif($commande->commande_type=="taille")
        <div style="border-width: 10px" class="card bg-dark border-primary     mt-2 mb-1" >
            @include('commandes.taille')
        </div>
        @elseif($commande->commande_type=="simple")
        <div style="border-width: 10px" class="card bg-dark border-primary     mt-2 mb-1" >
            @include('commandes.simple')
        </div>
        @endif


    @endforeach
    

    <br>

    <div class="d-flex justify-content-center m-4">
        {{$active_commandes->links()}}
    </div>
  
  
  




