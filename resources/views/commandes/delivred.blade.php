
<div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-success rounded" style="opacity: 0.9"> 
          Délivrées :  {{$delivré_commandes_count}}
    </h1>
    </div>
</div>
 


    @foreach ($delivré_commandes as $commande)
        <div style="border-width: 10px" class="card bg-dark border-success     mt-2 mb-1" >
            @include('commandes.simple')
        </div>

       


    @endforeach
    

    <br>

    <div class="d-flex justify-content-center m-4">
        {{$delivré_commandes->links()}}
    </div>
  
  
  




