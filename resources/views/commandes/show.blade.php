



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
   
   .custom{
   
       width: 50px;
       height: 50px;
   
   }
   </style>
   
   

@include('commandes.enroute')
@include('commandes.delivred')
@include('commandes.annuler_par_admin')
@include('commandes.annuler_par_client')