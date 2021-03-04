
<div>

      
  

  <p>
      <div class="row ml-0">
      <a class="btn btn-primary col col-3" data-toggle="collapse" href="#collapseExample" 
      role="button" aria-expanded="false" aria-controls="collapseExample">
           <i class="fa fa-filter"></i> Filtrer        </a>
           <input type="search" wire:model.bounce.500ms="query" name="query" class="form-control col col-8 ml-3" 
           placeholder="Rechercher">
      </div>
    @if ($produits->count()=="0")
  <p class="mt-3 ml-2 text-danger h5">Pas de résultat pour : {{$query}}</p>
  @endif

    </p>
    <div class="collapse" id="collapseExample">
      <button class="btn btn-danger text-left "   wire:click="change('all')"  name="categorie" id="inlineRadio1"> 
        <i class="fa fa-times-circle"></i> effacer filtre</button>
      <hr>
      <div class="card card-body">
          
  
<div class="row">
  
<button class="btn btn-link "   wire:click="change('nom')"  name="categorie" id="inlineRadio1">nom du produit</button>
<button  class="btn btn-link"    wire:click="change('prix')"  name="categorie" id="inlineRadio1">Prix </button>
<div class="col col-10 ml-4">
      <input class="form-check-input " type="radio" wire:click="changetype('simple')" name="categorie" id="inlineRadio1" >
          <label class="form-check-label ml-1" for="inlineRadio1">Simple</label>
          <br>
          <input class="form-check-input " type="radio" wire:click="changetype('taille')" name="categorie" id="inlineRadio2" >
          <label class="form-check-label ml-1" for="inlineRadio2">Taille</label>
          <br>
          <input class="form-check-input " type="radio" wire:click="changetype('color')" name="categorie" id="inlineRadio1" >
          <label class="form-check-label ml-1" for="inlineRadio1">Couleur</label> 
          <br>
          <input class="form-check-input " type="radio" wire:click="changetype('complexe')" name="categorie" id="inlineRadio1" >
          <label class="form-check-label ml-1" for="inlineRadio1">Couleur + taille</label>
     
          </div>
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



     * {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
     </style>
     
     
   
  
 
    
    
    
        @foreach ($produits as $produit)
        
    <div class="card bg-dark text-white p-2 mt-5 shadow-lg" >
      <img class="card-img-top img-thumbnail p-1" style="width: 100%; height:300px" src="{{$produit->photo}}" alt="Card image">



      @if ($produit->image->count()==0)
          
      @else

      <div class="container">

        @foreach ($produit->image as $image)
            
      <div class="mySlides">
        <div class="numbertext">1 / 6</div>
        <img src="{{$image->image}}" style="width:100% ;height:250px;display: block; margin-left: auto; margin-right: auto ">
      </div>
    
         @endforeach
    
      <a class="prev" onclick="plusSlides(-1)">❮</a>
      <a class="next" onclick="plusSlides(1)">❯</a>
    
     
    
      <div class="row" >
    
        @foreach ($produit->image as $image)
    <div style="  margin: auto;  text-align: center;">
        <div class="column">{{$loop->index}}
          <img class="demo cursor" src="{{$image->image}}" style="width:50px; height:50px;" onclick="currentSlide({{$loop->index}})" alt="The Woods">
       </div> </div>
        @endforeach
    
      </div>
    </div>
    
    <script>
    var slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
    }
    </script>
          @endif


      <div class="card-body">
        <h4 class="card-title">{{$produit->nom}}</h4>
      
        <hr>
        <p>{{$produit->SubCategories->nom}} -> {{$produit->SubCategories->categories->nom}}</p>
        <p class="card-text">{{$produit->descreption}}</p>
        @if ($produit->product_type=="taille")
    
        <div class="row">
          @foreach ($produit->taille as $taille)
              <div class=" col-4 p-2">
              <p class="card-text  h5  ">{{$taille->taille}} :  
             <span class="ml-1 text-success">{{$taille->quantity}}</span> </p> 
            </div>
              @endforeach
              </div>
        @elseIf ($produit->product_type=="color")
        <div class="row">
          @foreach ($produit->color as $color)
                  
            
              <div class=" col-4 p-2">
              <img class=" img-thumbnail " src="{{$color->photo}}" style="width: 50px; height:50px" alt=""><p></p>
              <p class="card-text  h5  ">{{$color->couleur}} :  </p>
              <p class="card-text  text-success h5 ">{{$color->quantity}} </p> 
            </div>
              @endforeach
              </div>
        @endif
       
        <hr>
      @php
          $remises=App\Remise::where("product_id",$produit->id)->first();
          if (!$remises) {
    echo"<p class='card-text text-info h5'>prix : ".$produit->prix."da</p>";
    }else {
    $percentage=round(100-$remises->prix*100/$remises->produit->prix);
    
    
    
    echo '   <p class="card-text text-info h5  "> <del class="text-danger">'.$produit->prix.' da  </del> 
          <span class="text-success ml-3">'.$remises->prix.' da</span>                      
          <span class="badge p-1 ml-3 badge-info"> - '.$percentage.' % </span>
        </p>';
    
    }
    
      @endphp
        <hr>
    
        @if ($produit->product_type=="complexe")
           
         <div class="row">
          @foreach ($produit->color as $color)
                      
                
          <div class=" col-4 p-2">
                <p class="card-text  h5  ">{{$color->couleur}} </p>
    <img class=" img-thumbnail " src="{{$color->photo}}" style="width: 50px; height:50px" alt=""><p></p>
          @foreach ($color->taille as $taille)
              
        
          <div class=" p-2">
          <p class="card-text  h5  ">{{$taille->taille}} :  
         <span class="ml-1 text-success">{{$taille->quantity}}</span> </p> 
        </div>
          @endforeach
        </div>
      
        
          @endforeach  
       
      </div> 
        @endif
        @if ($produit->product_type=="simple")
        <p class="card-text h5">reste : <span class="text-success">{{$produit->quantity}}</span>  
        @endif
          <a class="btn btn-warning btn-circle float-right  mr-2  " href="{{route('products.edit',$produit->id) }}">
            <span class="text-white  fa fa-edit   "></span>
        </a>
        @if ($produit->product_type=="complexe")
    
        <a class="btn btn-success btn-circle float-right  mr-2 " href="{{route('products.steps',['1',$produit->id])}}">
          <span class=" text-white fa fa-plus   "></span>
        </a>
        @endif
    
        <a class="btn btn-info btn-circle float-right  mr-2  " href="{{route('remises.addByIdShow',$produit->id) }}">
          <span class="text-white  fa fa-level-down   "></span>
      </a>
        <a class="btn btn-danger btn-circle float-right  mr-2 " href="{{route('products.delete',$produit->id)}}">
            <span class=" text-white  fa fa-trash  "></span>
        </a></p>
    
    
      </div>
    </div>
               
                 @endforeach
  
                 <script type="text/javascript">
                  window.onscroll = function(ev) {
                      if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                          window.livewire.emit('loadMore');
                      }
                  };
             </script>

 
  <br><br>

</div>





