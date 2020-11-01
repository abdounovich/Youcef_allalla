



<style>
    .text-gray {
    color: #aaa
}

img {
    height: 170px;
    width: 140px
}
</style>


    <div class="row text-center text-white mb-3">
        <div class="col-lg-7 mx-auto">
            <h1 class="display-4 shadow bg-dark rounded" style="opacity: 0.9">Liste des sous catégories</h1>
        </div>
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

