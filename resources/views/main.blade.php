
@extends('layouts.master')

@section('title', 'Home')
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


@section('content')



@if (\Session::has('success'))
    <div class="alert  alert-info  text-right ">
        <ul>
            <li class="p-2">{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
@php
date_default_timezone_set("Africa/Algiers");
   $actifTime=date('H:i');
@endphp


<div class="timeline-wrapper clearfix">
  <div class="timeline-content-day">
      <div class="timeline-line"></div>

          
       
   
          @foreach ($Today_appointments as $appointment)
              
      <div class="timeline-content-item "  @if ($actifTime>=$appointment->debut && $actifTime<$appointment->fin)
        class="active" 
   @endif data-timeline="hour-8">
          <span>{{$appointment->debut}}</span>
          <div class="timeline-content-item-reveal">
              <a href="#">
                  <img src="https://picsum.photos/g/300/300">
                  <span>Lorem Ipsum</span>
              </a>
          </div>
      </div>              @endforeach


 

  
  </div>
</div>



  <div class="row mt-5">
    @if ($Today_appointments->count()=='0')
        <div  class="col col-12 bg-dark text-white mt-5 " style="opacity: 0.9"><h2 class="p-4 float-right">لا توجد مواعيد لنهار اليوم</h2></div>
   @else
    <h3 class="p-2 text-white">مواعيد اليوم </h3>
    <table class="table table-striped table-dark responsive" style="opacity:0.9 ">
      <thead class=" bg-success text-right">
        <tr>
          <th scope="col">#</th>          

          <th scope="col">الفيسبوك</th>
          <th scope="col"> الحلاقة </th>
          <th scope="col">الموعد  </th>
          <th scope="col"></th>
          <th scope="col"></th>




        </tr>
      </thead>
      <tbody class=" text-right">
        @php
        date_default_timezone_set("Africa/Algiers");
           $actifTime=date('H:i');
        @endphp
        @foreach ($Today_appointments as $Today_appointment)
      
       
       
        @php


        ini_set("allow_url_fopen", 1);
        
                      $userInfoData=file_get_contents('https://graph.facebook.com/v2.6/'.$Today_appointment->client->fb_id.'?fields=profile_pic&access_token='.$config);
                      $userInfo = json_decode($userInfoData, true);
                  $picture = $userInfo['profile_pic'] ;
        
        @endphp
       
     

        @if ($Today_appointment->ActiveType==5)
            <tr class="bg-warning" ><td  class="bg-warning"></td>
              <td  class="bg-warning text-dark">@php $debut = date('H:i', strtotime($Today_appointment->debut));
                echo "محجوز ";
                @endphp</td>
              <td  class="bg-warning"></td>
              <td  class="bg-warning"></td>
              <td  class="bg-warning"></td>
              <td  class="bg-warning"></td>
              

            </tr>
      
            
        @else
            
      
        <tr @if ($actifTime>=$Today_appointment->debut && $actifTime<$Today_appointment->fin)
             class="bg-info" 
        @endif>
    <input type="hidden" name="" value="   ">
          <th scope="row">{{ $loop->index +1}}
               
       </th>
          <td  class="align-middle clearfix" style="position: relative;"><img class=" border rounded-circle ml-2" width="50" height="50" src="{{$picture}}" alt="">
            <span  dir="ltr" style=" 
            display:inline-flex;
            width: 100px;
            overflow: hidden;
            white-space: nowrap;
          text-overflow: ellipsis;"><a  class="text-white" href="sendMsg/{{$Today_appointment->fb_id}}">{{$Today_appointment->facebook}}</a></span>  <span dir="ltr" style=" position: absolute;
            top:1px;
            font-size:10px;
            right:1px; width:30px;height:30px; 
    min-width: 14px;
    text-align: center;
    line-height: 24px;
    box-shadow: 1px 1px 1px black;
 " class="badge badge-success rounded-circle "> {{$Today_appointment->client->points}}</span> 
           </td>
         
       
        <td class="align-middle">{{$Today_appointment->type->type}}</td>
         <td class="align-middle">@php $demain = date('H:i', strtotime($Today_appointment->debut));
          echo $demain;
          @endphp</td>
           
<td> 
  
  
  <input  class="m-2 p-2" type="checkbox" id="cb{{$Today_appointment->id}}" @if ($Today_appointment->ActiveType=="2" )
  checked 
  @endif onchange="myFunction('{{$Today_appointment->id}}','cb{{$Today_appointment->id}}')"
   data-on="حاضر" data-off="غائب" data-onstyle="outline-success"
   data-offstyle="outline-danger"  data-toggle="toggle">

  </td>
<td>  @php
      $theId=$Today_appointment->id;
  @endphp  <a  class="btn btn-danger " data-toggle="modal" data-target="#exampleModal{{$theId}}"><i class=" fa fa-trash fa-2x"></i>   </a>
  </td> 
        </tr>
        @endif      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" dir="rtl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> تأكيد إلغاء الموعد </h5>
         
        </div>
        <div class="modal-body  text-right"  >
هل تريد حقا إلغاء هذا الموعد ؟         </div>
        <div class="modal-footer row float-right text-right">
         <div class="col">
         <form action="/annulerByAdmin" id="myForm" method="post"> 
            @csrf           
            <input type="hidden" name="id" value="{{$Today_appointment->id}}">
            <a  href="/annulerByAdmin/" class="btn btn-danger  text-white col-4"> نعم </a>

            <a class="btn btn-secondary text-white col-4" data-dismiss="modal">  لا شكرا </a>
          </form> </div> 

        </div>
      </div>
    </div>
  </div>
        @endforeach
      </tbody>
    </table> @endif
  </div> 


<script> function sendMessage() {
  document.getElementById("myForm").submit();}</script>








<div class="container">
  <div class="row mt-5">
    @if ($Tomorow_appointments->count()=='0')
        <div  class="col col-12 bg-dark text-white mt-5  " style="opacity: 0.9"><h2 class="p-4 float-right">لا توجد مواعيد لنهار الغد</h2></div>
   @else
    <h3 class="p-2 text-white">مواعيد الغد </h3>
    <table class="table table-striped table-dark"style="opacity:0.9">
      <thead class=" bg-success text-right">
        <tr>
          <th scope="col">#</th>          

          <th scope="col">الفيسبوك</th>
          
          <th scope="col"> الحلاقة </th>

          <th scope="col">الموعد  </th>

        </tr>
      </thead>
      <tbody class=" text-right">
     
        @foreach ($Tomorow_appointments as $Tomorow_appointment)
     @php
      
        ini_set("allow_url_fopen", 1);
                      $userInfoData=file_get_contents('https://graph.facebook.com/v2.6/'.$Tomorow_appointment->client->fb_id.'?fields=profile_pic&access_token='.$config);
                      $userInfo = json_decode($userInfoData, true);
                  $picture = $userInfo['profile_pic'] ;
        @endphp  
        @if ($Tomorow_appointment->ActiveType==5)
        <tr class="bg-warning" ><td  class="bg-warning"></td>
          <td  class="bg-warning text-dark">@php $debut = date('H:i', strtotime($Tomorow_appointment->debut));
                echo "محجوز ";
            @endphp</td>
          <td  class="bg-warning"></td>
          <td  class="bg-warning"></td>
          

        </tr>
  
        
    @else
        <tr>
          <th scope="row">{{ $loop->index+1 }}
          </th>
        
          <td  class="align-middle clearfix" style="position: relative;"><img class=" border rounded-circle ml-2" width="50" height="50" src="{{$picture}}" alt="">
            {{$Tomorow_appointment->facebook}}  <span dir="ltr"  style=" position: absolute;
            top:1px;
            font-size:13px;
            right:1px; width:30px;height:30px; 
    min-width: 14px;
    text-align: center;
    line-height: 24px;
    box-shadow: 1px 1px 1px black;
 " class="badge badge-success   text-center rounded-circle  ">{{$Tomorow_appointment->client->points}}</span> 
        {{--   <form action="{{route("client.editpoints",$Tomorow_appointment->client->id)}}" method="post">
            @csrf
          <input type="text" class=" form-control " name="points" value="{{$Tomorow_appointment->client->points}}" id="">            
          <button class="btn btn-primary" type="submit">تغيير</button>

        </form> --}}</td>
         
       
        <td class="align-middle">{{$Tomorow_appointment->type->type}}</td>
         <td class="align-middle">@php $demain = date('H:i', strtotime($Tomorow_appointment->debut));
          echo $demain;
          @endphp</td>
           

        </tr>
    @endIf
        @endforeach
      </tbody>
    </table> @endif
  </div>
</div>




<div class="container">
  <div class="row mt-5">
    @if ($AfterTomoro_appointments->count()=='0')
        <div  class="col col-12 bg-dark text-white mt-5  " style="opacity: 0.9"><h2 class="p-4 float-right">لا توجد مواعيد لبعد الغد</h2></div>
   @else
    <h3 class="p-2 text-white">مواعيد بعد غد </h3>
    <table class="table table-striped table-dark"style="opacity:0.9">
      <thead class=" bg-success text-right">
        <tr>
          <th scope="col">#</th>          

          <th scope="col">الفيسبوك</th>
          
          <th scope="col"> الحلاقة </th>

          <th scope="col">الموعد  </th>

        </tr>
      </thead>
      <tbody class=" text-right">
      
        @foreach ($AfterTomoro_appointments as $AfterTomoro_appointment)
        @php
      
        ini_set("allow_url_fopen", 1);
                      $userInfoData=file_get_contents('https://graph.facebook.com/v2.6/'.$AfterTomoro_appointment->client->fb_id.'?fields=profile_pic&access_token='.$config);
                      $userInfo = json_decode($userInfoData, true);
                  $picture = $userInfo['profile_pic'] ;
        @endphp  
        
        @if ($AfterTomoro_appointment->ActiveType==5)
        <tr class="bg-warning" ><td  class="bg-warning"></td>
          <td  class="bg-warning text-dark">@php $debut = date('H:i', strtotime($AfterTomoro_appointment->debut));
                echo "محجوز ";
            @endphp</td>
          <td  class="bg-warning"></td>
          <td  class="bg-warning"></td>
          

        </tr>
  
        
    @else
    <tr>
          <th scope="row">{{ $loop->index +1}}</th>
          


            <td  class="align-middle clearfix" style="position: relative;"><img class=" border rounded-circle ml-2" width="50" height="50" src="{{$picture}}" alt="">
              {{$AfterTomoro_appointment->facebook}}  <span dir="ltr"  style=" position: absolute;
              top:1px;
              font-size:13px;
              right:1px; width:30px;height:30px; 
      min-width: 14px;
      text-align: center;
      line-height: 24px;
      box-shadow: 1px 1px 1px black;
   "class="badge badge-success text-center  rounded-circle  ">{{$AfterTomoro_appointment->client->points}}</span> 
           {{--  <form action="{{route("client.editpoints",$AfterTomoro_appointment->client->id)}}" method="post">
              @csrf
            <input type="text" class=" form-control" name="points" value="{{$AfterTomoro_appointment->client->points}}" id="">            
            <button class="btn btn-primary" type="submit">تغيير</button>

          </form> --}}</td>

         
       
        <td class="align-middle">{{$AfterTomoro_appointment->type->type}}</td>
         <td class="align-middle">@php $demain = date('H:i', strtotime($AfterTomoro_appointment->debut));
          echo $demain;
          @endphp</td>
            

        </tr>
    @endif
        @endforeach
      </tbody>
    </table> @endif
  </div>
</div>






<div class="container p-2">
  <div class="row">
    @if ($Inactif_appointments->count()=='0')
    <div  class="col col-12 text-white bg-dark " style="opacity: 0.9"><h2 class="p-4 float-right">   لا توجد مواعيد سابقة </h2></div>

   
@else
    <h3 class="p-2 text-white">المواعيد السابقة :</h3>
    <table class="table table-striped table-dark"style="opacity:0.9">
      <thead class=" bg-success text-right">
        <tr>
          <th scope="col">#</th>          

          <th scope="col">الفيسبوك</th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col">الوقت </th>
        </tr>
      </thead>
      <tbody class=" text-right">
     
        @foreach ($Inactif_appointments as $Inactif_appointment)
          @php
      
        ini_set("allow_url_fopen", 1);
                      $userInfoData=file_get_contents('https://graph.facebook.com/v2.6/'.$Inactif_appointment->client->fb_id.'?fields=profile_pic&access_token='.$config);
                      $userInfo = json_decode($userInfoData, true);
                  $picture = $userInfo['profile_pic'] ;
        @endphp  
        <tr>
          <th scope="row">{{ $loop->index+1 }}</th>
          <td  class="align-middle clearfix col col-5" style="position: relative;"><img class=" border rounded-circle ml-2" width="50" height="50" src="{{$picture}}" alt="">
            {{$Inactif_appointment->facebook}}  <span dir="ltr"  style=" position: absolute;
            top:1px;
            font-size:13px;
            right:1px; width:30px;height:30px; 
    min-width: 14px;
    text-align: center;
    line-height: 24px;
    box-shadow: 1px 1px 1px black;
 " class="badge badge-success text-center  rounded-circle  ">{{$Inactif_appointment->client->points}}</span> 
   <form action="{{route("client.editpoints",$Inactif_appointment->client->id)}}" method="post">
    @csrf
  <td><input type="text" class=" form-control " name="points" value="{{$Inactif_appointment->client->points}}" id="">            
  </td><td><button class="btn btn-primary " type="submit">تغيير</button>
</td>
</form>
          </td>


         
       
         <td class="align-middle col col-3"> @php  carbon\Carbon::setLocale('ar');
          echo $Inactif_appointment->created_at->diffForHumans(); @endphp    </td>

        </tr>
    
        @endforeach
      </tbody>
    </table>
   @endif
  </div>
</div>




<div class=" container">
     <div  class="row d-flex justify-content-center">
     <div  >{{$Inactif_appointments->links('vendor.pagination.bootstrap-4')}}
    </div>
   </div> 
  </div>



  <script>
  function myFunction($fid,$cbid) {
    var checkBox=document.getElementById($cbid);

   
/*     window.location = "/actif/"+$fid;
 */  
    

 if (checkBox.checked == true){
  window.location = "/actif/"+$fid+"/2";
  } else {
    window.location = "/actif/"+$fid+"/1";

 }

}

;</script>
@stop