



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

</style>







    <div class="row text-center text-white ">
        <div class="col-lg-7 mx-auto">
            <h1 class="h5 shadow bg-dark p-3" style="opacity: 0.9">Liste des produits avec remise</h1>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group  shadow-lg">
                <!-- list group item-->
                @foreach ($remises as $remise)




                <div class="card bg-dark text-white p-2 mt-5" >
                    <img class="card-img-top img-thumbnail p-1" style="width: 100%; height:300px" src="{{$remise->produit->photo}}" alt="Card image">
                    <div class="card-body">
                      <h4 class="card-title">{{$remise->produit->nom}}</h4>
                      <hr>
                      <p class="card-text">{{$remise->produit->descreption}}</p>
                      <hr>@php
    $percentage=round(100-$remise->prix*100/$remise->produit->prix);

@endphp
                      <p class="card-text text-info h5  "> <del class="text-danger">{{$remise->produit->prix}} da  </del> 
                        <span class="text-success ml-3"> {{$remise->prix}} da</span>                      
                        <span class='badge p-1 ml-3 badge-info'> - {{$percentage}} % </span>
                      </p>


                      <hr>
                      <p class="card-text h5">reste: <span class="text-success">{{$remise->produit->quantity}}</span> <a class="btn btn-warning btn-circle float-right  mr-2  " href="{{route('remises.edit',$remise->id) }}">
                        <span class="text-white  fa fa-edit   "></span>
                    </a>
                    <a class="btn btn-danger btn-circle float-right  mr-2 " href="{{route('remises.delete',$remise->id)}}">
                        <span class=" text-white  fa fa-trash  "></span>
                    </a></p>


                    </div>
                  </div>
                  
               @endforeach
 <!-- End -->
                               <div class="d-flex justify-content-center m-4">{{$remises->links()}}</div>
 </ul> <!-- End -->

        </div>
    </div>

