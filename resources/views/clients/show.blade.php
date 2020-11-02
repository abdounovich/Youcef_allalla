



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
            <h1 class="h4 p-2 shadow bg-dark" style="opacity: 0.9">Liste des clients</h1>
        </div>
    </div>


<div class="container">
    <div class="row">
        @foreach ($clients as $client)
            <div class=" clearfix col col-12 bg-dark mt-2 mb-1 p-2 rounded " style="opacity: 0.9">
                       <div class="bg-dark">
<div class="float-right btn btn-danger rounded-circle "> 
            <a href="{{route('clients.delete',$client->id) }}">
                <i class="  text-white  fa fa-trash"></i>
            </a>
        </div>
            <div class=" float-left my-2 mr-2"><img style="width: 100px; height:100px" src="{{$client->photo}}"  class=" img-thumbnail" alt=""></div>
            <div class="mt-2 text-info h5 ">{{$client->facebook}} </div>
            <div class=" text-white"><i class="text-success fa fa-map-marker mr-2 "></i>{{$client->address}}</div>
            </div>
            <div class=" text-white mr-2">
                <div class=" float-right col col-12 p-2 "><i class=" text-warning fa fa-phone  mr2"></i><span class="mx-3 h5">  {{$client->phone}}</span></div>
                <div class=" float-right col col-12 p-2 "><i class=" text-warning fa fa-shopping-cart  mr2"></i><span class="mx-3 h5">commandes : {{$client->commandes->count()}}</span></div>
           
        </div>


            </div>
        @endforeach
    </div>
</div>




      <div class="m-2 p-2">{{$clients->links()}}</div>

