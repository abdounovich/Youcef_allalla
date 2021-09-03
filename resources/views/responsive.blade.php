<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>body{
      background-color: #f7f7f7;
      margin-top:20px;
  }
  
  .main-timeline {
      position: relative
  }
  
  .main-timeline:before {
      content: "";
      display: block;
      width: 2px;
      height: 100%;
      background: #c6c6c6;
      margin: 0 auto;
      position: absolute;
      top: 0;
      left: 0;
      right: 0
  }
  
  .main-timeline .timeline {
      margin-bottom: 40px;
      position: relative
  }
  
  .main-timeline .timeline:after {
      content: "";
      display: block;
      clear: both
  }
  
  .main-timeline .icon {
      width: 18px;
      height: 18px;
      line-height: 18px;
      margin: auto;
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0
  }
  
  .main-timeline .icon:before,
  .main-timeline .icon:after {
      content: "";
      width: 100%;
      height: 100%;
      border-radius: 50%;
      position: absolute;
      top: 0;
      left: 0;
      transition: all 0.33s ease-out 0s
  }
  
  .main-timeline .icon:before {
      background: #fff;
      border: 2px solid #232323;
      left: -3px
  }
  
  .main-timeline .icon:after {
      border: 2px solid #c6c6c6;
      left: 3px
  }
  
  .main-timeline .timeline:hover .icon:before {
      left: 3px
  }
  
  .main-timeline .timeline:hover .icon:after {
      left: -3px
  }
  
  .main-timeline .date-content {
      width: 50%;
      float: left;
      margin-top: 22px;
      position: relative
  }
  
  .main-timeline .date-content:before {
      content: "";
      width: 36.5%;
      height: 2px;
      background: #c6c6c6;
      margin: auto 0;
      position: absolute;
      top: 0;
      right: 10px;
      bottom: 0
  }
  
  .main-timeline .date-outer {
      width: 125px;
      height: 125px;
      font-size: 16px;
      text-align: center;
      margin: auto;
      z-index: 1
  }
  
  .main-timeline .date-outer:before,
  .main-timeline .date-outer:after {
      content: "";
      width: 125px;
      height: 125px;
      margin: 0 auto;
      border-radius: 50%;
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      transition: all 0.33s ease-out 0s
  }
  
  .main-timeline .date-outer:before {
      background: #fff;
      border: 2px solid #232323;
      left: -6px
  }
  
  .main-timeline .date-outer:after {
      border: 2px solid #c6c6c6;
      left: 6px
  }
  
  .main-timeline .timeline:hover .date-outer:before {
      left: 6px
  }
  
  .main-timeline .timeline:hover .date-outer:after {
      left: -6px
  }
  
  .main-timeline .date {
      width: 100%;
      margin: auto;
      position: absolute;
      top: 27%;
      left: 0
  }
  
  .main-timeline .month {
      font-size: 18px;
      font-weight: 700
  }
  
  .main-timeline .year {
      display: block;
      font-size: 30px;
      font-weight: 700;
      color: #232323;
      line-height: 36px
  }
  
  .main-timeline .timeline-content {
      width: 50%;
      padding: 20px 0 20px 50px;
      float: right
  }
  
  .main-timeline .title {
      font-size: 19px;
      font-weight: 700;
      line-height: 24px;
      margin: 0 0 15px 0
  }
  
  .main-timeline .description {
      margin-bottom: 0
  }
  
  .main-timeline .timeline:nth-child(2n) .date-content {
      float: right
  }
  
  .main-timeline .timeline:nth-child(2n) .date-content:before {
      left: 10px
  }
  
  .main-timeline .timeline:nth-child(2n) .timeline-content {
      padding: 20px 50px 20px 0;
      text-align: right
  }
  
  @media only screen and (max-width: 991px) {
      .main-timeline .date-content {
          margin-top: 35px
      }
      .main-timeline .date-content:before {
          width: 22.5%
      }
      .main-timeline .timeline-content {
          padding: 10px 0 10px 30px
      }
      .main-timeline .title {
          font-size: 17px
      }
      .main-timeline .timeline:nth-child(2n) .timeline-content {
          padding: 10px 30px 10px 0
      }
  }
  
  @media only screen and (max-width: 767px) {
      .main-timeline:before {
          margin: 0;
          left: 7px
      }
      .main-timeline .timeline {
          margin-bottom: 20px
      }
      .main-timeline .timeline:last-child {
          margin-bottom: 0
      }
      .main-timeline .icon {
          margin: auto 0
      }
      .main-timeline .date-content {
          width: 95%;
          float: right;
          margin-top: 0
      }
      .main-timeline .date-content:before {
          display: none
      }
      .main-timeline .date-outer {
          width: 110px;
          height: 110px
      }
      .main-timeline .date-outer:before,
      .main-timeline .date-outer:after {
          width: 110px;
          height: 110px
      }
      .main-timeline .date {
          top: 30%
      }
      .main-timeline .year {
          font-size: 24px
      }
      .main-timeline .timeline-content,
      .main-timeline .timeline:nth-child(2n) .timeline-content {
          width: 95%;
          text-align: center;
          padding: 10px 0
      }
      .main-timeline .title {
          margin-bottom: 10px
      }
  }</style>
  </head>
  <body >

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->

<div class="container">
  <div class="container">
    <div class="main-timeline">
    
                            <!-- start experience section-->
                            <div class="timeline">
                                <div class="icon"></div>
                                <div class="date-content">
                                    <div class="date-outer">
                                        <span class="date">
                                                <span class="month">2 Years</span>
                                        <span class="year">2013</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="timeline-content">
                                    <h5 class="title">Visual Art &amp; Design</h5>
                                    <p class="description">
08h00 - 10h00                                    </p>
                                </div>
                            </div>
                            <!-- end experience section-->
    
                         
    
                          
                          
    
                        </div>
    </div>

  </div>
  </body>
</html>