



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


<div class="container">
    <div class="row">
        @foreach ($clients as $client)
            <div class=" clearfix col col-12 bg-dark my-2 rounded text-white" style="opacity: 0.9">
            <div class=" float-left my-2 mr-2"><img style="width: 100px; height:100px" src="{{$client->photo}}"  class=" img-thumbnail" alt=""></div>
            <div class="mt-2 ">{{$client->facebook}}  <div class="float-right btn btn-danger rounded-circle "> 
                <a href="{{route('clients.delete',$client->id) }}">
                    <i class="  text-white fa fa-trash"></i>
                </a>
            </div></div>
            <div class="mt-1 ">Telepone : {{$client->phone}}</div>
            <div class="mt-1 ">Commandes : {{$client->commandes->count()}}</div>
            <div class="mt-1 ">Address : {{$client->address}}</div>



            </div>
        @endforeach
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
                        </div class="clearfix">
                        <div class="float-right">
                        <img src="{{$client->photo}}" alt="Generic placeholder image" style="width:100px;height:100px" class=" mb-5 img-thumbnail  with-3d-shadow">
                    </div> </div>
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
                                <a href="">commandes : {{$client->commandes->count()}}</a> @endif</h6>
                                                          

                            </div>
                          
                         
                         
                       <!-- End -->

                </li>                    @endforeach
 <!-- End -->
                               <div class="m-2 p-2">{{$clients->links()}}</div>
 </ul> <!-- End -->

        </div>
    </div>

