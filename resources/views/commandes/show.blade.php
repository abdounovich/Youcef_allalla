
@extends('layouts.master')

@section('title', 'Ajouter des produits')



@section('content')

@if (\Session::has('success'))
    <div class="alert  alert-info p-2 m-4  text-left ">
        <ul>
            <li class="p-2 text-left">{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif







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
   

   .btn-orange{
       background-color:indianred;
   }
   .custom{
   
       width: 50px;
       height: 50px;
   
   }
   </style>
   
  

<div class="mt-5"></div>
@livewire('search-commandes')




@stop