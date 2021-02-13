
<div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-warning rounded" style="opacity: 0.9"> 
       En route :  {{$enroute_commandes_count}}
    </h1>
    </div>
</div>
 


    @foreach ($enroute_commandes as $commande)
        <div style="border-width: 10px" class="card bg-dark border-warning     mt-2 mb-1" >
            @include('commandes.simple')
        </div>

  


    @endforeach
    

    <br>

    <div class="d-flex justify-content-center m-4">
{{--         {{$enroute_commandes->links()}}
 --}}    </div>
  
  
  




