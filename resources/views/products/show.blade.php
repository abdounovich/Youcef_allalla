



<style>
    .text-gray {
    color: #aaa
}

img {
    height: 170px;
    width: 140px
}
</style>


    <div class="row text-center text-white mb-5">
        <div class="col-lg-7 mx-auto">
            <h1 class="display-4 shadow bg-dark" style="opacity: 0.9">Liste des produits</h1>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group  shadow-lg">
                <!-- list group item-->
                @foreach ($produits as $produit)
                <li class="list-group-item  shadow">
                    <!-- Custom content-->

                        
                    <div class="media align-items-lg-center flex-column flex-lg-row ">
                        <div class="media-body order-2 order-lg-1">
                            <div class=" h5 mt-0 font-weight-bold mb-2">{{$produit->nom}}  
                                <br>                            
                           <div> <a href="{{route('products.edit',$produit->id) }}">
                                <i class="p-1 m-2 text-warning fa fa-edit"></i>
                            </a>
                            <a href="{{route('products.delete',$produit->id) }}">
                                <i class="p-1 m-2 text-danger fa fa-trash"></i>
                            </a>
                        </div>








                            
                            </div>
                          



                            

                        <p class="font-italic text-muted mb-0 small">{{$produit->descreption}}</p>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">{{$produit->prix}} Da</h6>
                           
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">{{$produit->SubCategories->nom}}->{{$produit->SubCategories->categories->nom}}  </h6>
                           
                            </div>
                                
                          
                         
                         
                        </div>
                        <img src="{{$produit->photo}}" alt="Generic placeholder image" width="200" class=" rounded border border-dark with-3d-shadow ml-lg-5  order-1 order-lg-2">
                    </div> <!-- End -->

                </li>                    @endforeach
 <!-- End -->
                               <div class="m-2 p-2">{{$produits->links()}}</div>
 </ul> <!-- End -->

        </div>
    </div>

