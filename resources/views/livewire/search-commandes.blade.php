

<div>

    <div class="input-group mb-3">
        <select name="select" wire:model="categorie" class="form-control" >
            <option value="slug">slug</option>
            <option value="type">type</option>

           
        </select>
        <input type="search" wire:model.bounce.500ms="query" name="query" class="form-control" placeholder="Entrer le nom du produit">
      
      </div>
{{$message}}
@if ($message=="")
    
 

@endif
<div>






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
    @foreach ($commandes as $commande)
    @if ($commande->type=="1")
    
    
        <div style="border-width: 10px" class="card bg-dark border-secondary     mt-2 mb-1" >
            @include('commandes.simple')
        </div>
        @endIf
    @endforeach
    
    <div class="row text-center text-white mb-3">
        <div class="col-lg-7 mx-auto">
        <h1 class=" h4 mt-4 p-3 shadow bg-primary rounded" style="opacity: 0.9"> 
            confirmées :  
        </h1>
        </div>
    </div>
    @foreach ($commandes as $commande)
    @If($commande->type=="2")
    
    <div style="border-width: 10px" class="card bg-dark border-primary     mt-2 mb-1" >
    @include('commandes.simple')
    </div>
    @endIf
    @endforeach
    
    
    <div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-warning rounded" style="opacity: 0.9"> 
        en route :  
    </h1>
    </div>
    </div>
    @foreach ($commandes as $commande)
    
    
    @If($commande->type=="6")
    
    <div style="border-width: 10px" class="card bg-dark border-warning     mt-2 mb-1" >
    @include('commandes.simple')
    </div>
    @endIf
    @endforeach
    
    
    <div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-success rounded" style="opacity: 0.9"> 
        délivrée :  
    </h1>
    </div>
    </div>
    @foreach ($commandes as $commande)
    @If($commande->type=="3")
    
    <div style="border-width: 10px" class="card bg-dark border-success     mt-2 mb-1" >
    @include('commandes.simple')
    </div>
    @endIf
    
    @endforeach
    
    
    <div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-oranger rounded" style="opacity: 0.9"> 
        Aannuler par admin :  
    </h1>
    </div>
    </div>
    @foreach ($commandes as $commande)
    @If($commande->type=="4")
    
    <div style="border-width: 10px" class="card bg-dark border-oranger     mt-2 mb-1" >
    @include('commandes.simple')
    </div>
    @endIf
    
    @endforeach
    
    <div class="row text-center text-white mb-3">
    <div class="col-lg-7 mx-auto">
    <h1 class=" h4 mt-4 p-3 shadow bg-danger rounded" style="opacity: 0.9"> 
        annuller par client :  
    </h1>
    </div>
    </div>
    @foreach ($commandes as $commande)
    @If($commande->type=="5")
    
    <div style="border-width: 10px" class="card bg-dark border-danger     mt-2 mb-1" >
    @include('commandes.simple')
    </div>
    
    @endif
    
    @endforeach
    
    
    <br>
    
    <div class="d-flex justify-content-center m-4">
    </div>
    
    
    
    
    
    
    
    