<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="{{ asset('js/app.js',true )}}" type="text/js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@600&display=swap" rel="stylesheet">    <title> @yield('title')</title>
    <style>
           body{
    
    background:url(https://images.unsplash.com/photo-1496950866446-3253e1470e8e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1650&q=80);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    font-family: 'Sora', sans-serif;    }
    </style>
</head>
  <body>
  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
      <div class="container">
        <a class="navbar-brand" href="#">LOGO HERE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Acceuil
                    <span class="sr-only">(current)</span>
                  </a>
            </li>
            <li class="nav-item"> <a  class="nav-link" href="/products" >Produits</a></li>
            <li class="nav-item"><a href="/clients" class="nav-link" >Clients</a></li>
              <li class="nav-item"><a href="/commandes"class="nav-link" >Commandes</a></li>
                <li class="nav-item"><a href="/categories" class="nav-link" >Categories</a></li>
                  <li class="nav-item"><a href="/sub_categories" class="nav-link" >Sous-Categories</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container" style="height:50px">

    </div>

      <div class="container ">
        @yield('content')
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
    


</body>
</html>