

 


    @foreach ($commandes as $commande)
       
    @if ($commande->type=="1")
    <div class="row text-center text-white mb-3">
        <div class="col-lg-7 mx-auto">
        <h1 class=" h4 mt-4 p-3 shadow bg-secondary rounded" style="opacity: 0.9"> 
            Non-confirmées :  {{$commandes_count}}
        </h1>
        </div>
    </div> 
   
        <div style="border-width: 10px" class="card bg-dark border-secondary     mt-2 mb-1" >
            @include('commandes.simple')
        </div>
    @endforeach
    @foreach ($commandes as $commande)

@elseIf($commande->type=="2")
<div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-primary rounded" style="opacity: 0.9"> 
        confirmées :  {{$commandes_count}}
    </h1>
    </div>
</div>
<div style="border-width: 10px" class="card bg-dark border-primary     mt-2 mb-1" >
    @include('commandes.simple')
</div>
@endforeach
@foreach ($commandes as $commande)
@elseIf($commande->type=="6")
<div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-warning rounded" style="opacity: 0.9"> 
        en route :  {{$commandes_count}}
    </h1>
    </div>
</div>
<div style="border-width: 10px" class="card bg-dark border-warning     mt-2 mb-1" >
    @include('commandes.simple')
</div>
@endforeach
@foreach ($commandes as $commande)
@elseIf($commande->type=="3")
<div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-success rounded" style="opacity: 0.9"> 
        délivrée :  {{$commandes_count}}
    </h1>
    </div>
</div>
<div style="border-width: 10px" class="card bg-dark border-success     mt-2 mb-1" >
    @include('commandes.simple')
</div>
@endforeach
@foreach ($commandes as $commande)
@elseIf($commande->type=="4")
<div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-oranger rounded" style="opacity: 0.9"> 
        Aannuler par admin :  {{$commandes_count}}
    </h1>
    </div>
</div>
<div style="border-width: 10px" class="card bg-dark border-oranger     mt-2 mb-1" >
    @include('commandes.simple')
</div>
@endforeach
@foreach ($commandes as $commande)
@elseIf($commande->type=="5")
<div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-danger rounded" style="opacity: 0.9"> 
        annuller par client :  {{$commandes_count}}
    </h1>
    </div>
</div>
<div style="border-width: 10px" class="card bg-dark border-danger     mt-2 mb-1" >
    @include('commandes.simple')
</div>

 @endif

    @endforeach
    

    <br>

    <div class="d-flex justify-content-center m-4">
        {{$commandes->links()}}
    </div>
  
  
  




