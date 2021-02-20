<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Link with href
  </a>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Button with data-target
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div>
</div>  
    <div class="card-body   text-left btn " 
    data-toggle="collapse" 
    data-target="#product_collapse{{$commande->id}}" 
    aria-expanded="false" 
    aria-controls="collapseExample">   
    
    <div class="card-text">

   <div>
     <div class="dropdown dropleft float-right">
      <button class="btn text-white" type="button" id="dropdownMenuButton{{$commande->id}}" data-toggle="dropdown" >
       <i class="fa fa-2x text-bold fa-ellipsis-v"></i>
      </button>
      <div class="dropdown-menu " aria-labelledby="dropdownMenuButton{{$commande->id}}">
        <a class="text-dark m-2 p-2 "  href="{{route('commandes.delete',$commande->id)}}"  > 
          <i class="fa fa-trash text-danger m-2"></i> effacer</a>
        </div> 
    </div> 
       <span class="h4  text-white text-wrap" > 
         @if ($commande->type=="1")
             <i class="btn btn-secondary btn-circle"></i>
         @elseif($commande->type=="2")
         <i class="btn btn-primary btn-circle"></i>
         @elseif($commande->type=="3")
         <i class="btn btn-success btn-circle"></i>
         @elseif($commande->type=="4")
         <i class="btn btn-danger btn-circle"></i>
         @elseif($commande->type=="5")
         <i class="btn btn-orange btn-circle"></i>
         @elseif($commande->type=="6")
         <i class="btn btn-warning btn-circle"></i>
       @endif 
      
   
      <span class="text-wrap"> {{$commande->product->nom}}       
       <span class="text-white ml-2 text-info"> X {{$commande->quantity}}</span> </span>
      

       </span>
    </div>
<p></p>
            
 
       <img class="img-thumbnail custom  p-0 mt-2 " 
       style="width: 100%;height:250px" src="{{$commande->product->photo}}" alt="">

   @include('commandes.items')
   
   @include('commandes.links')

     </div>
    </div>
 @include('commandes.clientList') 