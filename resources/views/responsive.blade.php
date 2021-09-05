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
body {
  background: #ccc;
}

.timeline-wrapper {
  display: block;
  width: 90%;
  height: 15rem;
  position: relative;
  color: #fff;
  text-align: center;
  margin: 0 auto;
}
.timeline-wrapper .timeline-line {
  display: block;
  width: 93.9%;
  height: 1px;
  background: white;
  position: absolute;
  top: 50%;
  -webkit-box-shadow: 0 0 1px black;
  -moz-box-shadow: 0 0 1px black;
  box-shadow: 0 0 1px black;
  left: 3%;
  margin-left: 2.5px;
}
.timeline-wrapper .timeline-content-day {
  height: 100%;
}
.timeline-wrapper .timeline-content-item {
  background: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7);
  width: 6%;
  display: inline-block;
  position: relative;
  height: 100%;
  margin-right: -5px;
  -webkit-transition: width .5s;
  -moz-transition: width .5s;
  -o-transition: width .5s;
  transition: width .5s;
  z-index: 1;
}
.timeline-wrapper .timeline-content-item > span {
  height: 2rem;
  display: block;
  font-weight: bold;
  position: absolute;
  top: 50%;
  margin-top: -.25em;
  width: 100%;
  text-shadow: 0 0 2px black;
  cursor: pointer;
}
.timeline-wrapper .timeline-content-item > span:before {
  content: " ";
  display: block;
  width: .5em;
  height: .5em;
  background: white;
  margin: 0 auto .5em auto;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  -webkit-box-shadow: 0 0 1px black;
  -moz-box-shadow: 0 0 1px black;
  box-shadow: 0 0 1px black;
}
.timeline-wrapper .timeline-content-item .timeline-content-item-reveal {
  display: none;
  position: absolute;
  left: 0;
  top: 50%;
  margin-top: -50%;
  width: 100%;
}
.timeline-wrapper .timeline-content-item .timeline-content-item-reveal a {
  display: block;
  width: 100%;
  height: 100%;
}
.timeline-wrapper .timeline-content-item .timeline-content-item-reveal a img {
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  max-height: 100%;
  max-width: 100%;
  border: 3px solid white;
  -webkit-box-shadow: 0 0 2px black;
  -moz-box-shadow: 0 0 2px black;
  box-shadow: 0 0 2px black;
}
.timeline-wrapper .timeline-content-item .timeline-content-item-reveal a span {
  position: absolute;
  width: 250%;
  margin-left: -75%;
  bottom: -2rem;
  left: 0;
  font-family: serif;
  font-size: 1.3em;
  font-style: italic;
  text-decoration: none;
  white-space: nowrap;
  color: white;
  text-shadow: 0 0 2px rgba(0, 0, 0, 0.5), 0 0 1px black;
}
.timeline-wrapper .timeline-content-item .timeline-content-item-reveal a span:after {
  content: "\203A";
  margin-left: .3em;
}
.timeline-wrapper .timeline-content-item.active {
  width: 10%;
}
.timeline-wrapper .timeline-content-item.active .timeline-content-item-reveal {
  display: block;
}


    </style>
  </head>
  <body  style="    font-family: 'Cairo', sans-serif">
    
@php
    $apps=App\Appointment::where("ActiveType","1")->get();
@endphp


    <div class="timeline-wrapper clearfix">
      <div class="timeline-content-day">
          <div class="timeline-line"></div>
              @foreach ($apps as $app)
                  
          <div class="timeline-content-item " data-timeline="hour-8">
              <span>{{$app->debut}}</span>
              <div class="timeline-content-item-reveal">
                  <a href="#">
                      <img src="https://picsum.photos/g/300/300">
                      <span>Lorem Ipsum</span>
                  </a>
              </div>
          </div>              @endforeach

  
     

      
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