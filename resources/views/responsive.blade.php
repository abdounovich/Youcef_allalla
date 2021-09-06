<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">

    <title>Hello, world!</title>
    <style>
      div.timeline {
    list-style-type: none;
    position: relative;
}
div.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    right: 29px;
    width: 2px;
    height: 100%;
    z-index: 10;
}
div.timeline > div {
    margin: 20px 0;
    padding-right: 80px;
}
div.timeline > div:before {
    content: ' ';
    background: green;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid black;
    right: 15px;
    width: 30px;
    height: 30px;
    z-index: 10;

}


#the-active {


  
  background-image: url('https://picsum.photos/g/300/300');
}

    </style>
  </head>
  <body  style="    font-family: 'Cairo', sans-serif">
    <div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="timeline ">
            <div>
             <div style="position: relative;z-index:200" > 
              <img src="https://picsum.photos/g/300/300"
              style='  margin-top:-10px; width:50px; height:50px; margin-left:583px ' class="rounded-circle" alt=""></div>
           
                <a target="_blank" href="https://www.totoprayogo.com/#">New Web Design</a>
              <a href="#" class="float-right">21 March, 2014</a>
              
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
           </div>
            <div>
              <span href="#">18:00 - 19:00</span>
              <a href="#" class="float-right">4 March, 2014</a>
              <p>Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
            </div>
        
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->

 
  </body>
</html>