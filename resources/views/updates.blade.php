






<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="{{ asset('js/app.js',true )}}" type="text/js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@600&display=swap" rel="stylesheet">    <title> @yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Changa&display=swap" rel="stylesheet"><style>
           body{
    
        background:gainsboro;  /* fallback for old browsers */
/* background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);  /* Chrome 10-25, Safari 5.1-6 */
 /* background: linear-gradient(to right, #0083B0, #00B4DB); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
 
    font-family: 'Changa', sans-serif;
 }
 #loading {width: 100%;height: 100%;top: 0px;left: 0px;position: fixed;display: block; z-index: 99}
#loading-image {position: absolute;top: 40%;left: 45%;z-index: 100} 
/* The side navigation menu */
.sidebar a:hover:not(.active) {
      background-color: #555;
      color:black;
  background-color:white;
;
  }
  .bg-dzed{
    background-color:rgb(255, 197, 6);
  }
  .text-dzed{
    color:rgb(255, 197, 6);
  }
    </style>
        @livewireStyles

</head>
  <body>







      <table class="table table-dark p-1 m-2" style="width: 99%">
        <thead>
          <tr>
              @foreach ($columns as $column)
                              <td scope="col"> @if ($column=="id" OR $column=="created_at" OR $column=="updated_at" )
                                  @else{{$column}}
                              @endif</td>

              @endforeach
           
          </tr>
        </thead>
        <tbody>
          
          @foreach ($data as $item)
          <form method="POST" action="{{route('update',$table_name) }}" enctype="multipart/form-data">
            @csrf
            <tr>
                @foreach ($columns as $column)
            
                @php
                ${"var".$column}=$column;
                    $val=$item->${"var".$column};
                @endphp
                
                
                   <th>  @if ($column=="id" OR $column=="created_at" OR $column=="updated_at" )
                     <input   type="hidden"  value="{{$val}}" name="{{$column}}" >
                   @else
                   <input   type="text"  value="{{$val}}" name="{{$column}}" >

                
                   @endif  </th>
            
            
                
                @endforeach
                <td><button type="submit" class="btn btn-primary ">modifier</button>
</td>
         
          </tr>  
         
            </form>
            @endforeach
                  

     
        </tbody>
      </table>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
    

</body>
</html>










 










