



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
    background: linear-gradient(45deg,#3a96cc,#0176fc);
}

.custom{

    width: 50px;
    height: 50px;

}
</style>


    <div class="row text-center text-white mb-3">
        <div class="col-lg-7 mx-auto">
            <h1 class=" h4 p-3 shadow bg-dark rounded" style="opacity: 0.9">Liste des sous catégories</h1>
        </div>
    </div>



        <div class=" text-white " style="opacity: 0.9">
        @foreach ($categories as $categorie)
            <div class="bg-dark mt-2 p-2">
<h2 class="text-white p-2 text-center mr-0">{{$categorie->nom}} <a class="btn btn-warning btn-circle  ml-1" href="{{route('categories.edit',$categorie->id) }}">
    <span class="text-white  fa fa-pencil border-dark   "></span>
</a></h2> 
        @foreach ($categorie->subCat as $sub_cat)

        <div class="card bg-c-blue border-dark  mt-2 mb-2">
          <div class="card-body text-left ">
          <p class="card-text">
          <img class="img-thumbnail custom  p-0" src="{{$sub_cat->photo}}" alt="">
          <span class="h5 mx-2">{{$sub_cat->nom}} </span>
          <a class="btn btn-warning btn-circle float-right  mt-2 mr-1" href="{{route('sub_categories.edit',$sub_cat->id) }}">
            <span class="text-white  fa fa-pencil border-dark   "></span>
        </a>
        <a class="btn btn-danger btn-circle float-right mt-2 mr-1" href="{{route('sub_categories.delete',$sub_cat->id)}}">
            <span class=" text-white  fa fa-trash border-dark "></span>
        </a>
          </p>
    
          </div>
        </div>
    
        @endforeach
    </div>
    <br>


        @endforeach
         
      
      
          
      
       
      
        </div>
      
      
      
        <div class="d-flex justify-content-center m-4">{{$sub_categories->links()}}</div>
      
      
      


 

