
<div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-danger rounded" style="opacity: 0.9"> 
        Annulées par client :  {{$annuler_par_client_count}}
    </h1>
    </div>
</div>
 


    @foreach ($annuler_par_client as $commande)
        <div style="border-width: 10px" class="card bg-dark border-danger     mt-2 mb-1" >
            @include('commandes.simple')
        </div>



    @endforeach
    

    <br>

    <div class="d-flex justify-content-center m-4">
{{--         {{$annuler_par_client->links()}}
 --}}    </div>
  
  
  




