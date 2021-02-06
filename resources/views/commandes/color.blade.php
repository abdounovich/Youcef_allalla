
    <div class="card-body text-left btn " 
    data-toggle="collapse" 
    data-target="#product_collapse{{$commande->id}}" 
    aria-expanded="false" 
    aria-controls="collapseExample">

        <div class="card-text">
            @include('commandes.links')
            @php
                $color=App\Color::find($commande->color);

            @endphp

<p class="h4  text-white text-wrap" > 
    @if ($commande->type=="1")
        <i class="btn btn-warning btn-circle"></i>
    @elseif($commande->type=="2")
    <i class="btn btn-primary btn-circle"></i>
    @elseif($commande->type=="3")
    <i class="btn btn-success btn-circle"></i>
    @elseif($commande->type=="4")
    <i class="btn btn-danger btn-circle"></i>
    @elseif($commande->type=="5")
    <i class="btn btn-danger btn-circle"></i>
    @elseif($commande->type=="6")
    <i class="btn btn-info btn-circle"></i>
  @endif 
  {{$commande->product->nom}}        <span class="text-white"> X {{$commande->quantity}}</span>

  <a class="btn btn-danger  btn-circle float-right  mr-1" href="{{route('commandes.delete',$commande->id)}}"  >
    <span class="     fa fa-trash  "></span>
</a>

  </p>            <p class="text-white text-wrap " >couleur : {{$color->couleur}} <span class=" text-dark">X {{$commande->quantity}}</span></p>

            <img class="img-thumbnail custom  p-0 " src="{{$color->photo}}" alt="">



            @include('commandes.items')


    
        </div>


    </div>


   @include('commandes.clientList')