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
  

  <div class="d-flex justify-content-center bg-dark" style="opacity: 0.9">

          <a href="/" class="  text-white m-2  p-2" type="button">Acceuil</a>
          <a href="/products" class=" float-right  text-white m-2 p-2" type="button">Produits</a>
          <a href="/clients" class=" float-right  text-white m-2 p-2" type="button">Clients</a>
          <a href="/commandes" class=" float-right  text-white m-2 p-2" type="button">Commandes</a>
          <a href="/categories" class=" float-right  text-white m-2 p-2" type="button">Categories</a>
          <a href="/sub_categories" class="float-right  text-white m-2 p-2" type="button">Sous-Categories</a>
</div>

      <div class="container">
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