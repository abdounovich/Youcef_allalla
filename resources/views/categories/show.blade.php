



<style>
    .text-gray {
    color: #aaa
}


</style>


    <div class="row text-center text-white mb-3">
        <div class="col-lg-7 mx-auto">
            <h1 class="display-4 shadow bg-dark rounded" style="opacity: 0.9">Liste des catégories</h1>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group  shadow-lg">
                <!-- list group item-->
                @foreach ($categories as $categorie)
                <li class="list-group-item  shadow">
                    <!-- Custom content-->

                        
                    <div class="media align-items-lg-center flex-column flex-lg-row ">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2">{{$categorie->nom}}</h5>
                            <div> <a href="{{route('categories.edit',$categorie->id) }}">
                                <i class="p-1 m-2 text-warning fa fa-edit"></i>
                            </a>
                            <a href="{{route('categories.delete',$categorie->id) }}">
                                <i class="p-1 m-2 text-danger fa fa-trash"></i>
                            </a>
                        </div>
                        </div><img src="{{$categorie->photo}}" alt="Generic placeholder image" width="50
                        " class=" rounded border border-dark with-3d-shadow ml-lg-5  order-1 order-lg-2">
                    </div> <!-- End -->




                </li>                    @endforeach
 <!-- End -->
                               <div class="m-2 p-2">{{$categories->links()}}</div>
 </ul> <!-- End -->

        </div>
    </div>

