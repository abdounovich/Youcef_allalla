{{-- <div class="dropdown">
    <a class="  float-right " type="button" id="dropdownMenuButton" data-toggle="dropdown"  aria-expanded="false">
     <i style="font-size: 20px" class="fa fa-ellipsis-v text-white"></i>
    </a>
</div>  --}}

  
<hr class="bg-white ">
        @if ($commande->type=="1" OR $commande->type=="2"  OR $commande->type=="6" )
        <a class="btn btn-danger  btn-circle float-left  mr-1" href="{{route('commandes.annuler',$commande->id)}}"  >
            <span class="     fa fa-remove  "></span>
        </a>
        @endif
        
        @if ($commande->type=="2")
        <a class="btn btn-success btn-circle float-left   mr-1" href="{{route('commandes.delivration',$commande->id) }}">
            <span class="  fa fa-truck   "></span>
        </a> 

        <form method="POST" action="{{route('colis.add') }}"  enctype="multipart/form-data">
            @csrf

     



              <input type="text" name="order_id" value="{{$commande->slug}}">
              <input type="text" name="firstname" value="{{$commande->client->full_name}}">
              <input type="text" name="familyname" value="{{$commande->client->id}}">
              <input type="text" name="contact_phone" value="{{$commande->client->phone}}">
              <input type="text" name="address" value="{{$commande->client->adress}}">
              <input type="text" name="to_commune_name" value="{{$commande->client->wilaya}}">
              <input type="text" name="to_wilaya_name" value="{{$commande->client->wilaya}}">
              <input type="text" name="product_list" value="{{$commande->product->name}}">
              <input type="text" name="price" value="{{$commande->total_price}}">
              <input type="text" name="freeshipping" value="false">
              <input type="text" name="is_stopdesk" value="true">
              <input type="text" name="has_exchange" value="false">
              <input type="text" name="product_to_collect" value="null">

          
            <button type="submit" class="btn btn-primary">Bordreau YALIDINE</button>
          </form>
        
        <a class="btn btn-warning btn-circle float-left   mr-1" href="{{route('commandes.return',$commande->id) }}">
            <span class="    fa fa-refresh    "></span>
        </a>
        @endif
        
        @if ($commande->type=="1")
        <a class="btn btn-primary btn-circle float-left   mr-1" href="{{route('commandes.confirmation',$commande->id) }}">
            <span class="    fa fa-arrow-down    "></span>
        </a> 






        @endif
        
        
        @if ($commande->type=="6")
        <a class="btn btn-success btn-circle float-left mr-1" href="{{route('commandes.done',$commande->id) }}">
            <span class="    fa fa-check   "></span>
        </a> 
        <a class="btn btn-warning btn-circle float-left   mr-1" href="{{route('commandes.return',$commande->id) }}">
            <span class="    fa fa-refresh  "></span>
        </a> 
        @endif
    </div>
    
