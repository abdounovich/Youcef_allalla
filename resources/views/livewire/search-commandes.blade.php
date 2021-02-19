<div>

      
  

    <p>
        <div class="row ml-0">
        <a class="btn btn-primary col col-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
             <i class="fa fa-filter"></i> Filtrer</a>
             <input type="search" wire:model.bounce.500ms="query" name="query" class="form-control col col-8 ml-4" 
             placeholder="Rechercher">
        </div>
      @if ($commandes->count()=="0")
    <p class="mt-3 ml-2 text-danger h5">Pas de résultat pour : {{$query}}</p>
    @endif
 
      </p>
      <div class="collapse" id="collapseExample">
        <button class="btn btn-danger text-left "   wire:click="change('all')"  name="categorie" id="inlineRadio1"> <i class="fa fa-times-circle"></i> effacer filtre</button>
        <hr>
        <div class="card card-body">
            
<span class="text-center">Par commande</span><hr>
    
<div class="row">
    <button class="btn btn-link text-left "   wire:click="change('slug')"  name="categorie" id="inlineRadio1">code</button>
<button  class="btn btn-link text-left "    wire:click="change('total_price')"  name="categorie" id="inlineRadio1">Prix total</button>
</div>
<div class="row">
<div class="col col-10 ml-4">
        <input class="form-check-input " type="radio" wire:click="changetype('1')" name="categorie" id="inlineRadio1" >
            <label class="form-check-label ml-1" for="inlineRadio1">Non confirmées</label>
            <br>
            <input class="form-check-input " type="radio" wire:click="changetype('2')" name="categorie" id="inlineRadio2" >
            <label class="form-check-label ml-1" for="inlineRadio2">Confirmées</label>
            <br>
            <input class="form-check-input " type="radio" wire:click="changetype('6')" name="categorie" id="inlineRadio1" >
            <label class="form-check-label ml-1" for="inlineRadio1">En route</label> 
            <br>
            <input class="form-check-input " type="radio" wire:click="changetype('3')" name="categorie" id="inlineRadio1" >
            <label class="form-check-label ml-1" for="inlineRadio1">Délivrées</label>
            <br>
            <input class="form-check-input " type="radio" wire:click="changetype('4')" name="categorie" id="inlineRadio2" >
            <label class="form-check-label ml-1" for="inlineRadio2">Annuller Par Client</label>
            <br>
            <input class="form-check-input " type="radio" wire:click="changetype('5')" name="categorie" id="inlineRadio1" >
            <label class="form-check-label ml-1" for="inlineRadio1">Annuler Par Admin</label> 
            </div>
</div>
        
         

<hr>
<span class="text-center">Par produit</span><hr>
<div class="row ">
    

<button class="btn btn-link "   wire:click="change('nom')"  name="categorie" id="inlineRadio1">nom du produit</button>
<button  class="btn btn-link "    wire:click="change('taille')"  name="categorie" id="inlineRadio1">Taille</button>
<button  class="btn btn-link "    wire:click="change('couleur')"  name="categorie" id="inlineRadio1">Couleur</button>
</div>
<hr>
<span class="text-center">Par client</span><hr>
<div class="row">
    

<button class="btn btn-link "   wire:click="change('facebook')"  name="categorie" id="inlineRadio1">Nom du client</button>
<button  class="btn btn-link "    wire:click="change('wilaya')"  name="categorie" id="inlineRadio1">Wilaya</button>
<button  class="btn btn-link "    wire:click="change('phone')"  name="categorie" id="inlineRadio1">Telephone</button>
   </div> 
        </div>
      </div>






    <style>
        .text-gray {
           color: #aaa
       }
       
       img {
           height: 170px;
           width: 140px
       }
       .btn-circle {
         width: 30px;
         height: 30px;
         text-align: center;
         padding: 2px;
         font-size: 18px;
         border-radius: 15px;
       }
       img {
           height: 170px;
           width: 140px
       }
       .bg-c-blue {
           background: linear-gradient(45deg,#3a96cc,#0176fc);
       }
       
       .custom{
       
           width: 50px;
           height: 50px;
       
       }
       </style>
       
       
     
    
   

    @foreach ($commandes as $commande)
        <div style="border-width: 10px" 
        @if ($commande->type=="1")
        class="card bg-dark border-secondary     mt-2 mb-1"
        @elseIf($commande->type=="2")
        class="card bg-dark border-primary     mt-2 mb-1"
        @elseIf($commande->type=="6")
        class="card bg-dark border-warning     mt-2 mb-1"
        @elseIf($commande->type=="3")
        class="card bg-dark border-success     mt-2 mb-1"
        @elseIf($commande->type=="4")
        class="card bg-dark border-danger     mt-2 mb-1"
        @elseIf($commande->type=="5")
        class="card bg-dark border-orange     mt-2 mb-1"

        @endif  >
            @include('commandes.simple')
        </div>

    @endforeach
    

    <script type="text/javascript">
        window.onscroll = function(ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('loadMore');
            }
        };
   </script>
    

</div>
