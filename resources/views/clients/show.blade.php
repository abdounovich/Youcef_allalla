



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
            <h1 class="display-4 shadow bg-dark" style="opacity: 0.9">Liste des clients</h1>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group  shadow-lg">
                <!-- list group item-->
                @foreach ($clients as $client)
                <li class="list-group-item  shadow">
                    <!-- Custom content-->

                        
                    <div class="media align-items-lg-center flex-column flex-lg-row ">
                        <div class="media-body order-2 order-lg-1">
                            <div class=" h5 mt-0 font-weight-bold mb-2"><a href="{{route('client.show',$client->slug) }}">
                                {{$client->facebook}}
                            </a> 
                                <br>                            
                           <div> 
                            <a href="{{route('clients.delete',$client->id) }}">
                                <i class="p-1 m-2 text-danger fa fa-trash"></i>
                            </a>
                        </div>
                    </div>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">{{$client->phone}} </h6>
                           
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">{{$client->address}}</h6>
                           
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">@if ($client->commandes->count()=="0")
                                    il y'a aucune commande
                                @else
                                <a href="">nombre de commandes : {{$client->commandes->count()}}</a> @endif</h6>
                                                          

                            </div>
                          
                         
                         
                        </div><img src="{{$client->photo}}" alt="Generic placeholder image" width="200" class=" rounded border border-dark with-3d-shadow ml-lg-5  order-1 order-lg-2">
                    </div> <!-- End -->

                </li>                    @endforeach
 <!-- End -->
                               <div class="m-2 p-2">{{$clients->links()}}</div>
 </ul> <!-- End -->

        </div>
    </div>

