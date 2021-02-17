<div>


<div class="bg-white text-dark">
    Commande
    <hr>
    <br>
<button class="btn btn-link "   wire:click="change('slug')"  name="categorie" id="inlineRadio1">code</button>
<button  class="btn btn-link "    wire:click="change('total_price')"  name="categorie" id="inlineRadio1">Prix total</button>
<br>
<div class="row">
<div class="col col-4 ml-4">
        <input class="form-check-input " type="radio" wire:click="changetype('1')" name="categorie" id="inlineRadio1" >
            <label class="form-check-label ml-1" for="inlineRadio1">Non confirmées</label>
            <br>
            <input class="form-check-input " type="radio" wire:click="changetype('2')" name="categorie" id="inlineRadio2" >
            <label class="form-check-label ml-1" for="inlineRadio2">Confirmées</label>
            <br>
            <input class="form-check-input " type="radio" wire:click="changetype('6')" name="categorie" id="inlineRadio1" >
            <label class="form-check-label ml-1" for="inlineRadio1">En route</label> 
        </div>
        <div class="col col-4">
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
        
         

<br>
Produit
<hr>

<br>
<button class="btn btn-link "   wire:click="change('nom')"  name="categorie" id="inlineRadio1">nom du produit</button>
<button  class="btn btn-link "    wire:click="change('taille')"  name="categorie" id="inlineRadio1">Taille</button>
<button  class="btn btn-link "    wire:click="change('couleur')"  name="categorie" id="inlineRadio1">Couleur</button>

    <br>
    Client
    <hr>

<br>
<button class="btn btn-link "   wire:click="change('facebook')"  name="categorie" id="inlineRadio1">Nom du client</button>
<button  class="btn btn-link "    wire:click="change('taille')"  name="categorie" id="inlineRadio1">Wilaya</button>
<button  class="btn btn-link "    wire:click="change('phone')"  name="categorie" id="inlineRadio1">Telephone</button>
    <br>
</button>

</div>


{{$categorie}}
   {{--  <div class="form-check form-check-inline">

<input class="form-check-input" type="radio" wire:model="categorie" value="slug" name="categorie" id="inlineRadio1" >
        <label class="form-check-label" for="inlineRadio1">Code</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" wire:model="categorie" value="type" name="categorie" id="inlineRadio2" >
        <label class="form-check-label" for="inlineRadio2">type</label>
      </div>

      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" wire:model="categorie" value="nom" name="categorie" id="inlineRadio1" >
        <label class="form-check-label" for="inlineRadio1">Produit</label>
      </div>

      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" wire:model="categorie" value="total_price" name="categorie" id="inlineRadio1" >
        <label class="form-check-label" for="inlineRadio1">Prix</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" wire:model="categorie" value="facebook" name="categorie" id="inlineRadio2" >
        <label class="form-check-label" for="inlineRadio2">client</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" wire:model="categorie" value="wilaya" name="categorie" id="inlineRadio2" >
        <label class="form-check-label" for="inlineRadio2">wilaya</label>
      </div> 
     
    
 --}}
      <input type="search" wire:model.bounce.500ms="query" name="query" class="form-control" placeholder="Entrer le nom du produit">
      
   @if ($commandes->count()=="0")
   <p class="m-3 text-danger h4">Pas de résultat pour : {{$query}}</p>

   @endif








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
        <div style="border-width: 10px" class="card bg-dark border-secondary     mt-2 mb-1" >
            @include('commandes.simple')
        </div>

    @endforeach
    

    <div class="row text-center text-white my-5">
        <div class="col-lg-7 mx-auto">
            <button  class="btn btn-primary" @if ($TakeLimit>$commandes->count()) 
                disabled class='btn btn-danger'    @endif  wire:click="loadMore" type="button">Afficher plus</button>
        </div>
        </div> 
    

</div>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.3.7/jquery.jscroll.min.js"></script>
<script type="text/javascript">
    $('ul.pagination').hide();
   
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<div>.................</div>',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });

</script> --}}