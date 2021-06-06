<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>swipeleft demo</title>
  <link rel="stylesheet" href="//code.jquery.com/mobile/1.5.0-alpha.1/jquery.mobile-1.5.0-alpha.1.min.css">
  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="//code.jquery.com/mobile/1.5.0-alpha.1/jquery.mobile-1.5.0-alpha.1.min.js"></script>
  <style>
  html, body { padding: 0; margin: 0; }
  html, .ui-mobile, .ui-mobile body {
    height: 105px;
  }
  .ui-mobile, .ui-mobile .ui-page {
    min-height: 105px;
  }
  #nav {
    font-size: 200%;
    width:17.1875em;
    margin:17px auto 0 auto;
  }
  #nav a {
    color: #777;
    border: 2px solid #777;
    background-color: #ccc;
    padding: 0.2em 0.6em;
    text-decoration: none;
    float: left;
    margin-right: 0.3em;
  }
  #nav a:hover {
    color: #999;
    border-color: #999;
    background: #eee;
  }
  #nav a.selected,
  #nav a.selected:hover {
    color: #0a0;
    border-color: #0a0;
    background: #afa;
  }
  div.box {
    width: 30em;
    height: 3em;
    background-color: #108040;
  }
  div.box.swipeleft {
    background-color: #7ACEF4;
  }
  </style>
</head>
<body>
 
<h3>Swipe the green rectangle in the left direction to change its color:</h3>
<div class="box"></div>
 
<script>
$(function(){
  // Bind the swipeleftHandler callback function to the swipe event on div.box
  $( "div.box" ).on( "swipeleft", swipeleftHandler );
 
  // Callback function references the event target and adds the 'swipeleft' class to it
  function swipeleftHandler( event ){
    $( event.target ).addClass( "swipeleft" );
  }
});
</script>
 
</body>
</html>