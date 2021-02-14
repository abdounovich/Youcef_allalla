

<div>

    <div class="input-group mb-3">
        <input type="search" wire:model.bounce.500ms="query" name="query" class="form-control" placeholder="Entrer le nom du produit">
      
      </div>
{{$message}}
@if ($message=="")
    
 

@endif
<div>


@foreach ($commandes as $commande)
    <p>{{$commande->slug}}</p>
@endforeach</div>
