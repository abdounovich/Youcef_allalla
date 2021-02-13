<div>

    <div class="input-group mb-3">
        <input type="search" wire:model.bounce.500ms="query" name="query" class="form-control" placeholder="Entrer le nom du produit">
      
      </div>
{{$message}}
{{$type}}

@if ($message=="")
    
  

    
  
@endif

<div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-secondary rounded" style="opacity: 0.9"> 
    </h1>
    </div>
</div>
 

    @foreach ($inactive_commandes as $commande)
        <div style="border-width: 10px" class="card bg-dark border-secondary     mt-2 mb-1" >
            @include('commandes.simple')
        </div>
    @endforeach
    
    <br>
    <div class="d-flex justify-content-center m-4">
{{--         {{$inactive_commandes->links()}}
 --}}    </div>
  


  
  




