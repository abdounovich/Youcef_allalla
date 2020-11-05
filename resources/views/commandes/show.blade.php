



<style>
    .text-gray {
    color: #aaa
}

img {
    height: 170px;
    width: 140px
}
</style>


    <div class="row text-center text-white my-5">
        <div class="col-lg-7 mx-auto">
            <h1 class=" h3 p-2 shadow bg-dark" style="opacity: 0.9">Liste des commandes en attente de confirmation</h1>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group  shadow-lg">
                <!-- list group item-->
                @foreach ($inactive_commandes as $commande)
                <li class="list-group-item  shadow">
                    <!-- Custom content-->

                        
                    <div class="media align-items-lg-center flex-column flex-lg-row ">
                        <div class="media-body order-2 order-lg-1">
                            <div class=" h5 mt-0 font-weight-bold mb-2">{{$commande->product->nom}}  
                                <br>                            
                           <div> 
                            <a href="{{route('commandes.delete',$commande->id) }}">
                                <i class="p-1 m-2 text-danger fa fa-trash"></i>
                            </a>
                        </div>








                            
                            </div>
                          



                            

                        <a href="{{route('client.show',$commande->client->slug) }}">
                            {{$commande->client->facebook}}
                        </a>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">{{$commande->product->prix}} Da</h6>
                           
                            </div>
                        
                                <a href="{{route('commandes.confirmation',$commande->id) }}" class="btn btn-primary" type="button" >confirmé</a>
                          
                         
                         
                        </div>                        <img src="{{$commande->product->photo}}" alt="Generic placeholder image" width="200" class=" rounded border border-dark with-3d-shadow ml-lg-5  order-1 order-lg-2">

                    </div> <!-- End -->

                </li>                    <p></p> @endforeach
 <!-- End -->
                               <div class="m-2 p-2">{{$inactive_commandes->links()}}</div>
 </ul> <!-- End -->

        </div>
    </div>



    <div class="row text-center text-white my-5">
        <div class="col-lg-7 mx-auto">
            <h1 class=" h3 p-2 shadow bg-dark" style="opacity: 0.9">Liste des commandes confirmées</h1>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group  shadow-lg">
                <!-- list group item-->
                @foreach ($active_commandes as $commande)
                <li class="list-group-item  shadow">
                    <!-- Custom content-->

                        
                    <div class="media align-items-lg-center flex-column flex-lg-row ">
                        <div class="media-body order-2 order-lg-1">
                            <div class=" h5 mt-0 font-weight-bold mb-2">{{$commande->product->nom}}  
                                <br>                            
                           <div> 
                            <a href="{{route('commandes.delete',$commande->id) }}">
                                <i class="p-1 m-2 text-danger fa fa-trash"></i>
                            </a>
                        </div>








                            
                            </div>
                          



                            

                        <a href="{{route('client.show',$commande->client->slug) }}">
                            {{$commande->client->facebook}}
                        </a>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">{{$commande->product->prix}} Da</h6>
                           
                            </div>
                        
                            <a href="{{route('commandes.return',$commande->id) }}" class="btn btn-primary" type="button" >retour</a>

                            <a href="{{route('commandes.delivration',$commande->id) }}" class="btn btn-success" type="button" >delivré</a>

                         
                         
                        </div>                        <img src="{{$commande->product->photo}}" alt="Generic placeholder image" width="200" class=" rounded border border-dark with-3d-shadow ml-lg-5  order-1 order-lg-2">

                    </div> <!-- End -->

                </li><p></p>                    @endforeach
 <!-- End -->
                               <div class="m-2 p-2">{{$active_commandes->links()}}</div>
 </ul> <!-- End -->

        </div>
    </div>



    <div class="row text-center text-white my-5">
        <div class="col-lg-7 mx-auto">
            <h1 class=" h3 p-2 shadow bg-dark" style="opacity: 0.9">Liste des commandes livrées</h1>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group  shadow-lg">
                <!-- list group item-->
                @foreach ($delivré_commandes as $commande)
                <li class="list-group-item  shadow">
                    <!-- Custom content-->

                        
                    <div class="media align-items-lg-center flex-column flex-lg-row ">
                        <div class="media-body order-2 order-lg-1">
                            <div class=" h5 mt-0 font-weight-bold mb-2">{{$commande->product->nom}}  
                                <br>                            
                           <div> 
                            <a href="{{route('commandes.delete',$commande->id) }}">
                                <i class="p-1 m-2 text-danger fa fa-trash"></i>
                            </a>
                        </div>
                            </div>
                        <a href="{{route('client.show',$commande->client->slug) }}">
                            {{$commande->client->facebook}}
                        </a>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">{{$commande->product->prix}} Da</h6>
                           </div></div><img src="{{$commande->product->photo}}" alt="Generic placeholder image" width="200" class=" rounded border border-dark with-3d-shadow ml-lg-5  order-1 order-lg-2">

                    </div> <!-- End -->

                </li>                    <p></p> @endforeach
 <!-- End -->
                               <div class="d-flex justify-content-center m-4">{{$delivré_commandes->links()}}</div>
 </ul> <!-- End -->

        </div>
    </div>
