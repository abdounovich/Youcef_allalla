
@extends('layouts.master')

@section('title', 'Clients')



@section('content')


<table class="table border-top-0  bg-success  rounded mt-4 ">

    <tr>
           <td class="align-middle p-5">        
               <i class="fa fa-calendar fa-5x  "></i>
           </td>
   
           <td class="align-middle text-white" style="font-size: 50px">
               المواعيد 
           </td>
   
           <td class="align-middle" style="font-size: 50px">
               <span class="badge badge-dark text-white p-4 ">{{$appointments->count()}}</span>
           </td>
        
     
        </tr>  
        <tr ><td class="text-center " colspan="3"  style="font-size: 50px"> 
                <a  href="/main" class=" col col-12 btn btn-dark p-3" style="font-size: 30px"> تصفح الجميع </a>
            </td></tr>   </table>



<table class="table border-top-0  bg-success  rounded mt-4 ">

    <tr>
           <td class="align-middle p-5">        
                <i class="fa fa-users fa-5x  "></i>
           </td>
   
           <td class="align-middle text-white" style="font-size: 50px">
               الزبائن 
           </td>
   
           <td class="align-middle" style="font-size: 50px">
               <span class=" badge badge-dark text-white p-4  ">{{$clients->count()}}</span>
           </td>
         
       </tr>  
       <tr ><td class="text-center " colspan="3"  style="font-size: 50px"> 
               <a  href="/clients" class=" col col-12 btn btn-dark p-3" style="font-size: 30px"> تصفح الجميع </a>
           </td></tr>
   </table>


 

<table class="table border-top-0  bg-success  rounded mt-4 ">

 <tr>
        <td class="align-middle p-5">        
            <i class="fa fa-list fa-5x  "></i>
        </td>

        <td class="align-middle text-white" style="font-size: 50px">
            الأنواع 
        </td>

        <td class="align-middle" style="font-size: 50px">
            <span class=" badge badge-dark text-white p-4 ">{{$types->count()}}</span>
        </td>
           
    </tr>  
    <tr ><td class="text-center " colspan="3"  style="font-size: 50px"> 
            <a  href="/types" class=" col col-12 btn btn-dark p-3" style="font-size: 30px"> تصفح الجميع </a>
        </td></tr>
</table>

 
  





@stop