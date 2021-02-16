


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
     
    

      <input type="search" wire:model.bounce.500ms="query" name="query" class="form-control" placeholder="Entrer le nom du produit">
      
   
{{$message}}

@if ($message=="")
    
 

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
       
       
     
    
    <div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-secondary rounded" style="opacity: 0.9"> 
        Non-confirmées : 
    </h1>
    </div>
    </div> 

    <div class="infinite-scroll">

    @foreach ($commandes as $commande)
        <div style="border-width: 10px" class="card bg-dark border-secondary     mt-2 mb-1" >
            @include('commandes.simple')
        </div>
    @endforeach
    

    
    
 
 {{$commandes->links()}}   
</div>
     

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.3.7/jquery.jscroll.min.js"></script>
<script type="text/javascript">

    $('ul.pagination').hide();
    $('.infinite-scroll').jscroll({
            autoTrigger: true,
            debug: true,
            loadingHtml: '<div>loading...</div>',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
    });
</script>