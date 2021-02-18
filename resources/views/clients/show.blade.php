



<style>
    .text-gray {
    color: #aaa
}

img {
    height: 170px;
    width: 140px
}

.tooltip {
  position: relative;
  display: inline-block;
  z-index: -1;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 140px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: -1;
  bottom: 150%;
  left: 50%;
  margin-left: -75px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>



<div class="container mb-5">

<div class="row">
<button class="btn btn-info  my-5 " onclick="myFunction()">

    Copier</button> <span class="tooltiptext m-3" id="myTooltip"></span>

<div class="tooltip clearfix col col-12 bg-dark  mb-2 p-2 rounded " style="opacity: 0.9">
<textarea class="form-control" name="" id="myInput"  rows="5" >@foreach ($pending_clients as $pending_client){{$pending_client->phone}},@endforeach</textarea>

</div> </div>

<script>
    function myFunction() {
      var copyText = document.getElementById("myInput");
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      document.execCommand("copy");
      
      var tooltip = document.getElementById("myTooltip");
      tooltip.innerHTML = " Copied :)";
    }
    
    function outFunc() {
      var tooltip = document.getElementById("myTooltip");
      tooltip.innerHTML = "Copy to clipboard";
    }
    </script>




@livewire('search-client')

</div>

