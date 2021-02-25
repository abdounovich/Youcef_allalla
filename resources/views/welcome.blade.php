<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BotMan Studio</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Almarai&display=swap" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
body {
    font-family: 'Almarai', sans-serif;background-color: #fff;
color: #535353;
margin: 5px;
}
table {
border-collapse: collapse;
padding: 0;
width: 100%;
}
td {
padding: 0;
vertical-align: top;
}
.ticket-title {
color: #999;
font-size: 16px;
letter-spacing: 0;
line-height: 16px;
margin-top: 10px;
}
.ticket-info {
color: #535353;
font-size: 14px;
line-height: 21px;
}
.ticket-wrapper {
border: 2px solid #999;
border-top: 12px solid rgb(250, 235, 29);
margin: 15px auto 0;
padding-bottom: 15px;
width: 650px;
}
.ticket-wrapper:first-child {
margin-top: 0;
}
.ticket-table {}
.ticket-table .first-col {
width: 570px;
}
.ticket-logo {
border-left: 2px dashed #ccc;
text-align: center;
vertical-align: middle;
}
.ticket-logo img {
height: 150px;
width: 150px;
margin: 0px;
}
.ticket-name-div {
border-bottom: 2px dotted #ccc;
margin: 0 12px 0 22px;
padding: 15px 0px 15px 0;
text-align: left;
}
.ticket-event-longtitle {
color: #535353;
font-size: 22px;
letter-spacing: -1px;
line-height: 22px;
}
.ticket-event-shorttitle {
color: #535353;
font-size: 18px;
letter-spacing: -1px;
line-height: 22px;
}
.ticket-event-details {
border-bottom: 2px dotted #ccc;
margin: 0 12px 0px 22px;
padding: 15px 0px 15px 0;
text-align: left;
}
.ticket-event-details .first-col {
text-align: left;
width: 50%;
}
.ticket-event-details .second-col {
text-align: right;
vertical-align: top;
width: 50%;
}
.ticket-venue {
color: #535353;
font-size: 14px;
line-height: 21px;
}
.ticket-venue:first-child {
font-size: 16px;
}
.ticket-ticket-details {
margin: 0 12px 0px 22px;
text-align: left;
}
.ticket-ticket-details .first-col {
border-right: 2px dashed #ccc;
padding: 10px;
text-align: right;
vertical-align: top;
width: 900px;
}
.ticket-ticket-details .second-col {
padding: 4px 0px 0px 32px;
text-align: right;
width: 90px;
}
.ticket-ticket-details .third-col {
    padding: 4px 0px 0px 32px;

text-align: right;
width: 90px;

}
.ticket-qr-code{
height: 50px;

width: 50px;
}
/* Print specific styles */
@media print {
a[href]:after, abbr[title]:after {
    content: "";
}
.ticket-wrapper {
    width: 16cm;
}
.ticket-table .first-col {
    width: 13.8cm;
}
.ticket-logo img {
    height: auto;
    max-width: 100%;
}
.ticket-ticket-details .first-col {
    width: 4cm;
}
.ticket-ticket-details .second-col {
    width: 6cm;
}
.ticket-ticket-details .third-col {
    width: 2.5cm;
}
@page {
    margin: 1cm;
}}
    </style>
</head>
<body>



     <!-- Start Ticket -->
<div class="ticket-wrapper">
    <table class="ticket-table">
        <tr>
            <td class="first-col">
                <!-- title -->
                <div class="ticket-name-div">
                    <span class="ticket-event-longtitle">NIKE JUST DO IT</span>
                    <span style=" font-size:12px; margin:6px; float: right ">
                        2020/02/20  10:05
                    </span> 

                </div>
                <!-- /.ticket-name-div -->
                <!-- venue details start -->
                <div class="ticket-event-details">
                    <table>
                        <tr>
                            <td class="first-col">
                         

    

                                      <div class="ticket-venue">
                                        '.$this->commande2->client->address.'
                                     </div>
     
                                     <!-- /.ticket-venue -->
                                     <div class="ticket-venue">
                                         <b>'.$this->commande2->client->wilaya.'</b>
                                     </div>

                            </td>
                            <!-- /.first-col -->
                            <td class="second-col">
                               
                                <div class="ticket-title" style="margin-top: -2px">
                                    : الطلبية خاصة بـ  
                                  </div>
                                  <!-- /.ticket-title -->
                                  <div class="ticket-info" style="margin-top: 5px">
                                    '.$this->commande2->client->facebook.'                                  </div>
                                  <!-- /.ticket-info -->
                                

                            </td>
                           
                            <!-- /.second-col -->
                        </tr>
                    </table>
                </div>
                <!-- /.ticket-event-details -->
                <!-- ticket details start -->
                <div class="ticket-ticket-details">
                    <table>
                        <tr>
                            <td class="first-col">
                               
                                <!-- /.ticket-info -->
                                <div class="ticket-title">
                                </div>
                                <!-- /.ticket-title -->
                                <div class="ticket-title" style="margin-top: -10px">
                                   سعر البضاعة 
                                
                                    <span style="color: black; float:left"> <b>'.$this->commande2->total_price.'</b> دج </span>
                                </div>
                                     <div class="ticket-title">
                                        كلفة التوصيل                                      
                                        <span style="color: black; float:left"> <b>'.$this->valOfType.'</b> دج </span>
                                    </div>
                                        <div class="ticket-title" style="padding-top:10px; margin-top:15px; border-top: 2px dashed #ccc;" >
                                    السعر الإجمالي                                      
                            
                                    <b><span style="color: black;background-color:rgb(250, 235, 29);padding:5px; margin-top:-5px; float:left">4535 DZD</span></div>
                                    </b>                              
                                                                   
                                <!-- /.ticket-info -->
                            </td>
                            <!-- /.first-col -->
                            <td class="second-col">
                                <div class="ticket-title">
                                    طريقة التوصيل 
                                 </div>
                                 <!-- /.ticket-title -->
                                 <div class="ticket-info" >
                                    '.$this->TypeOfLivraison.'                                </div>
                              
                            </td>
                            <!-- /.second-col -->
                            <td class="third-col">
                                <div class="ticket-title">
                                    كود الطلبية  
                                </div>
                                <!-- /.ticket-title -->
                                <div class="ticket-info" style="background-color:rgb(250, 235, 29);text-align: center; margin-top:5px" >
                                  <b><span  style="color:black; ">  '.$this->commande2->slug.'  </span> </b>                             </div>
                                 
                            </td>
                            <!-- /.third-col -->
                        </tr>

                    </table>
                </div>
                <!-- /.ticket-ticket-details -->
            </td>
            <!-- /.first-col -->
            <td class="ticket-logo">
            <img class="ticket-qr-code" src="https://res.cloudinary.com/ds9qfm1ok/image/upload/v1614278674/logo1_govtcv.jpg" alt="logo"/>                      
            <img style=" width:80px; height:80px" src="https://res.cloudinary.com/ds9qfm1ok/image/upload/v1614278672/qr-code_x9eanz.png" alt="qrcode"/>

  </td>

            <!-- /.ticket-logo -->
        </tr>
    </table>
    <!-- /.ticket-table -->
</div>
<!-- /.ticket-wrapper -->
<!-- End Ticket -->




</body>
</html>