



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
    background: linear-gradient(45deg,#1b9ee9,#010a14);
}

.custom{

    width: 50px;
    height: 50px;

}
</style>


    <div class="row text-center text-white mb-3">
        <div class="col-lg-7 mx-auto">
            <h1 class="display-4 shadow bg-dark rounded" style="opacity: 0.9">Liste des sous catégories</h1>
        </div>
    </div>



        <div class=" text-white" style="opacity: 0.8">
        @foreach ($categories as $categorie)
            <div class="bg-dark mt-2 p-2">
<h2 class="text-white p-2 text-center">{{$categorie->nom}}</h2>
        @foreach ($categorie->subCat as $sub_cat)

        <div class="card bg-c-blue  mt-2">
          <div class="card-body text-left ">
          <p class="card-text">
          <img class="img-thumbnail custom  p-0" src="{{$sub_cat->photo}}" alt="">
          <span class="h5 mx-2">{{$sub_cat->nom}} </span>
          <a class="btn btn-warning btn-circle float-right  mt-2 mr-1" href="{{route('sub_categories.edit',$sub_cat->id) }}">
            <span class="text-white  fa fa-pencil   "></span>
        </a>
        <a class="btn btn-danger btn-circle float-right mt-2 mr-1" href="{{route('sub_categories.delete',$sub_cat->id)}}">
            <span class=" text-white  fa fa-trash  "></span>
        </a>
          </p>
    
          </div>
        </div>
    
        @endforeach
    </div>
    <br>


        @endforeach
         
      
      
          
      
       
      
        </div>
      
      
      
        
      
      
      


    <div class="row" >
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group  shadow-lg">
                <!-- list group item-->
                @foreach ($sub_categories as $sub_cat)
                <li class="list-group-item  shadow">
                    <!-- Custom content-->

                        
                    <div class="media align-items-lg-center flex-column flex-lg-row ">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2">{{$sub_cat->nom}}</h5>
                            <div> <a href="{{route('sub_categories.edit',$sub_cat->id) }}">
                                <i class="p-1 m-2 text-warning fa fa-edit"></i>
                            </a>
                            <a href="{{route('sub_categories.delete',$sub_cat->id) }}">
                                <i class="p-1 m-2 text-danger fa fa-trash"></i>
                            </a>
                        </div><img src="{{$sub_cat->photo}}" alt="Generic placeholder image"  class=" rounded border border-dark with-3d-shadow ml-lg-5  order-1 order-lg-2">
                    </div> <!-- End -->

                </li>                    @endforeach
 <!-- End -->
                               <div class="m-2 p-2">{{$sub_categories->links()}}</div>
 </ul> <!-- End -->

        </div>
    </div>

