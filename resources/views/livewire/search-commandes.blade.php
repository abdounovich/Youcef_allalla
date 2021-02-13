<div>

    <div class="input-group mb-3">
        <input type="search" wire:model.bounce.500ms="query" name="query" class="form-control" placeholder="Entrer le nom du produit">
      
      </div>
{{$message}}
@if ($message=="")
    
  <div class="row text-center text-white ">
        <div class="col-lg-7 mx-auto">
            <h1 class="h4 shadow bg-dark p-3" style="opacity: 0.9">Liste des produits</h1>
        </div>
    </div>

    
  
@endif

@include('commandes.non_confirmed')
@include('commandes.confirmed')
@include('commandes.enroute')
@include('commandes.delivred')
@include('commandes.annuler_par_admin')
@include('commandes.annuler_par_client')

