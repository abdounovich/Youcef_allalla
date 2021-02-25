<?php

namespace App\Conversations;

use App\Client;
use App\Product;
use App\Commande;
use App\Color;
use App\Taille;
use App\Remise;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use App\Conversations\botConversation;

class botConversation extends Conversation
{

    protected $product_id;
    protected $typ;

public function __construct(string $product_id,string $typ ) {

    $this->product_id = $product_id;
    $this->q="0";
    $this->typ = $typ;


}
    /**
     * First question
     */
    public function askNumber()
    {

       
       


if ( $this->product->quantity<$this->q) {
   $this->bot->reply("لا توجد لدينا كل هاته الكمية يرجى إختيار كمية أقل 🤷‍♂️ ");
   $this->askQuantity();

}
else {
  

        $this->product->quantity= $this->product->quantity-$this->q;
        $this->commande->client_id=$this->client->id;
        $this->commande->product_id=$this->product_id;
        $this->commande->commande_type=$this->typ;
        $this->commande->type="1";
        $this->commande->quantity=$this->q;
        if ($this->client->phone=="vide" && $this->client->address=="vide" && $this->client->wilaya=="vide" ) {
           $this->askQuestion();
           return;
          
        }else{ 
            $this->bot->reply("☎ رقم هاتفك هو :  ".$this->client->phone);
            $this->bot->reply(" 🇩🇿 ولايتك هي :  ".$this->client->wilaya);
            $this->bot->reply("🏠 عنوانك هو :  ".$this->client->address);
            $question=Question::create(' هل تود الإستمرار بهذا الرقم العنوان و الولاية  ؟   ')
            ->addButtons([
                Button::create(' ✍️ تغيير   ')
                ->value('change'),
                Button::create('  ✅ نعم إستمر ')
                    ->value('yess')
                    ]);
            
           }      

           
        
        $this->ask($question, function (Answer $answer) {
            if ($answer->getValue() === 'yess') {



                $this->key = array_search($this->client->wilaya, get_object_vars($this->obj));

                $this->WilayaNumber= substr($this->key, 1);
        
                $this->askLivriason($this->WilayaNumber);

               } else {                
                   
                $this->askQuestion();
               }
               


               });          

          
        
    }  
                           
      
       
    }

public function askQuestion(){

    
    
    $this->askPhone();

}


public function askPhone(){
    $this->ask(' من فضلك أدخل رقم هاتفك من خلال لوحة المفاتيح  ☎  ', function(Answer $answer1) {
        $this->phone = $answer1->getText();
        if (is_numeric($this->phone)) {
            $this->client->phone=$this->phone;
            $this->askWilaya();
           
        }
        else{$this->bot->reply(" خطأ , من فضلك أدخل رقم صحيح  ");
            $this->askPhone();
        }
      
    });
}


public function askAddress(){

        $this->ask(' من فضلك أدخل  عنوانك الكامل  🗺    ', function(Answer $answer) {
        $this->address = $answer->getText();
        $this->client->address=$this->address;
        $this->key = array_search($this->client->wilaya, get_object_vars($this->obj));

        $this->WilayaNumber= substr($this->key, 1);

        $this->askLivriason($this->WilayaNumber);});
}



public function askConfirmation($LivrPrice){
          
 
    $this->bot->reply('   ☺ المرحلة الأخيرة  ');
    $this->bot->typesAndWaits(1);
    $this->bot->reply(' 🛒 تأكيد الطلبية');  

  
    $this->attachment = new Image($this->photo, [
        'custom_payload' => true,
    ]);
    
    // Build message object
    $this->message = OutgoingMessage::create('This is my text')
                ->withAttachment( $this->attachment);
    
    
    $this->bot->reply($this->message);
    $this->bot->reply($this->msgText ." : ".$this->msgValue);
    $this->bot->reply('  الكمية : '.$this->q);
    $this->bot->reply(' ☎ الهاتف  : '. $this->client->phone);
    $this->bot->reply(' 🏠 العنوان  : '. $this->client->address);
    $this->bot->reply(' 🇩🇿 الولاية  : '.$this->client->wilaya);

    $this->remise=Remise::where("product_id",$this->product_id)->first();
    if ($this->remise) {
        $this->prix=$this->remise->prix;
    }
    $this->commande->total_price=$this->prix*$this->q;
    $this->lePrixProduits=$this->commande->total_price;
    $this->lePrixLivraison=$LivrPrice;
    $this->LePrixTotal= $this->lePrixProduits + $this->lePrixLivraison;
    $this->bot->reply('  ثمن المنتوج  : '.$this->lePrixProduits." دج ");
    $this->bot->reply(' تكلفة التوصيل  : '.$this->lePrixLivraison." دج ");
    $question=Question::create( 'المبلغ الإجمالي  💵 : '.$this->LePrixTotal." دج ")->addButtons([
        Button::create(' ❎ إلغاء الطلب')->value('NoCancel'),
        Button::create(' ✅ تأكيد الطلبية')->value('yes'),
    ]);
    $this->ask($question, function (Answer $answer) {
    
        
        if($answer->getValue() === 'yes') {
    
            $this->bot->typesAndWaits(1);
            $this->finalStep();    
        }
        else {
            $this->bot->typesAndWaits(1);

            $this->bot->reply("حسنا لقد تم إلغاء طلبك   ");  
            $this->bot->typesAndWaits(1);
    
            $this->bot->reply(Question::create('هل تريد إختيار منتج آخر ؟ ')->addButtons([
                Button::create('   ❌ لا شكرا  ')->value('NoCancelAgain'),
                Button::create(' ✅ نعم ')->value('show_me_products'),
                ]));
        }
       
    });
    
    
    

}



public function getTicket(){

    if ($this->TypeOfLivraison=="home") {
      $this->textOfType=" التوصيل إلى المنزل ";
      $this->valOftype=$this->home;
    }else{
        $this->textOfType=" التوصيل إلى مكتب YALIDINE "."ب".$this->commande2->client->wilaya;
        $this->valOftype=$this->desk;
    }
 
     $html = '
     <!-- Start Ticket -->
     <div class="ticket-wrapper">
         <table class="ticket-table">
             <tr>
                 <td class="first-col">
                     <!-- title -->
                     <div class="ticket-name-div">
                         <span class="ticket-event-longtitle">'.$this->commande2->product->nom.'</span>
                         <span style=" font-size:12px; margin:6px; float: right ">
                         '.$this->commande2->created_at->format(" H:i    Y/m/d  ").'
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
                                 
                                         <b><span style="color: black;background-color:rgb(250, 235, 29);padding:5px; margin-top:-5px; float:left">'.$this->LePrixTotal.'</span></div>
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
                                                                        </div>
                                   
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
     
';

$css = 'body {
    font-family: "Almarai", sans-serif;background-color: #fff;
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
width: 250px;
}
.ticket-ticket-details .second-col {
padding: 4px 0px 0px 32px;
text-align: right;
width: 150px;
}
.ticket-ticket-details .third-col {
    padding: 4px 0px 0px 32px;

text-align: right;
width: 100px;

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
}}';
$google_fonts = "Roboto";
    
    $data = array('html'=>$html,
                  'css'=>$css,
                  'google_fonts'=>$google_fonts);
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, "https://hcti.io/v1/image");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    
    curl_setopt($ch, CURLOPT_POST, 1);
    // Retrieve your user_id and api_key from https://htmlcsstoimage.com/dashboard
    curl_setopt($ch, CURLOPT_USERPWD, "c31f8774-3b05-48d4-a0cd-2f8430fa0212" . ":" . "eaad6421-2d87-4977-87cf-9cd7322ed4fd");
    
    $headers = array();
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
    }
    curl_close ($ch);
    $res = json_decode($result,true);
   
  
    $this->attachment = new Image($res['url'], [
        'custom_payload' => true,
    ]);
    
    // Build message object
    $this->message = OutgoingMessage::create('This is my text')
                ->withAttachment($this->attachment);
    $this->bot->reply($this->message); 
       $this->commande2->save();
    $this->client->save();


}

public function finalStep(){
    $this->product->save();
    $this->commande->slug="CM";
    $this->commande->save();
    $this->commande2=Commande::find( $this->commande->id);
    $this->key = array_search( $this->client->wilaya, get_object_vars($this->obj));
    $this->commande2->slug="CM".$this->commande->id."".$this->key;
 
    $this->bot->reply("    شكرا لك 😍 "); 
    $this->bot->reply("  لقد تم حفظ طلبك بنجاح  ✅");
  
   


    $this->bot->reply(" سنتصل بك قريبا لتأكيد طلبيتك  😊"); 
    $this->bot->reply(Question::create(' 🚚  عملية التسليم تكون في غضون 24 إلى 48 ساعة والدفع عند الإستلام  🤝')
            ->addButtons([
                Button::create(' ❌ إلغاء الطلبية ')
                    ->value('cancelCommande'.$this->commande->id),
         
                    Button::create(' 🛒  طلبياتي  ')
                    ->value('my_commandes'),
                    Button::create('➕ إشتر منتج آخر ')
                    ->value('show_me_products'),
                    
                    ])) ;

  $this->getTicket();

}
public function askWilaya(){
    $this->ask('🇩🇿  من فضلك أدخل رقم ولايتك     ', function(Answer $answer) {
        $this->wilaya = $answer->getText();

        if (is_numeric($this->wilaya)) {







${"W".$this->wilaya}="W".$this->wilaya;
 $this->client->wilaya=$this->obj->${"W".$this->wilaya};
            
            $this->askAddress();
        }
        else{$this->bot->reply(" خطأ , من فضلك أدخل  رقم الولاية فقط ");
            $this->askWilaya();
        }
    

    });
}


    public function askQuantity()
    {
        
            $this->q="0";
        $question5=Question::create('   ما الكمية التي تريد شرائها ؟  🔢   ')
        ->addButtons([
            Button::create('1')
                ->value('q1'),
            Button::create('2')
                ->value('q2'),
            Button::create('3')
                ->value('q3'),
            Button::create('4')
                ->value('q4'),
         Button::create(' أدخل الكمية 👇')
                ->value('Qmanuel')
                ]);
        
        
$this->ask($question5, function (Answer $answer) {

        switch ($answer->getValue()) {
            case "q1":
            $this->q="1";
            $this->askNumber();
            break;
            case "q2":
            $this->q="2";
            $this->askNumber();
            break;
            case "q3":
            $this->q="3";
            $this->askNumber();
            break;
            case "q4":
            $this->q="4";
            $this->askNumber();
            break;

                   
            case "Qmanuel":
            $this->ask(' من فضلك أدخل الكمية من خلال لوحة المفاتيح    ', function(Answer $answer) {
            $this->q = $answer->getText();
            $this->askNumber();
            
                    });
                               
           
          }
     
    
});


       

    }


    public function askLivriason($wil)
    {

        $url = "https://api.yalidine.com/v1/deliveryfees/".$wil; // the wilayas endpoint
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'X-API-ID: '."80153160526942779734",
                'X-API-TOKEN: '."np3A1Ezh8BjgNS2ivR139nsoewmmLXLUu7uSfeFVWKy5xfQRowFptHZx8O70Jr6C"
            ),
        ));
        
        $response_json = curl_exec($curl);
        curl_close($curl);
        $responses = json_decode($response_json);
        $this->home=$responses->data[0]->home_fee;
        $this->desk=$responses->data[0]->desk_fee;
        
      



$this->bot->reply("يمكن أن نرسل لك طلبيتك إلى منزلك أو يمكنك التنقل بنفسك إلى مكتب yalidine في ولايتك  ");
$this->bot->reply(" سعر التوصيل إلى المنزل هو : ".$this->home ." دج ");
$this->bot->reply(" سعر التوصيل إلى مكتب Yalidine في الولاية  هو : ".$this->desk ." دج ");
        $question=Question::create( 'إختر طريقة التوصيل  : ')->addButtons([
            Button::create(' 🏠 إلى المنزل ')->value('home'),
            Button::create('  🚗 مكتب  Yalidine')->value('desk')

        ]);
        $this->ask($question, function (Answer $answer) {
        
            
            if($answer->getValue() === 'home') {
$this->TypeOfLivraison="home";
                return $this->askConfirmation($this->home);


            }else{
                $this->TypeOfLivraison="desk";
              return  $this->askConfirmation($this->desk);


            }
        
        });
        
    }
    /**
     * Start the conversation
     */
    public function run()
    {


        $this->user = $this->bot->getUser();
        $this->facebook_id =  $this->user->getId();
        $this->firstname = $this->user->getFirstname();
        $this->lastname =  $this->user->getLastname();
        $this->full_name= $this->firstname.'-'. $this->lastname;
        $this->client=Client::where('facebook', $this->full_name)->first();

        $this->commande=new Commande();
        if ($this->typ=="simple") {
            $this->product=Product::find($this->product_id);
            $this->photo= $this->product->photo;
            $this->quantity=$this->product->quantity;
            $this->prix=$this->product->prix;
            $this->msgText="";
            $this->msgValue=$this->product->nom;
            $this->commande->taille= '0';
            $this->commande->color= '0';



}elseif ($this->typ=='taille') {
    $this->product=Taille::find($this->product_id);
    $this->product_id=$this->product->product_id;
    $this->prix=$this->product->product->prix;
    $this->photo=$this->product->product->photo;
    $this->quantity=$this->product->quantity;
    $this->commande->taille= $this->product->id;
    $this->msgText="  المقاس ";
    $this->commande->color= '0';
    $this->msgValue=$this->product->taille;

}
elseif ($this->typ=='color') {
    $this->product=Color::find($this->product_id);
    $this->product_id=$this->product->product_id;
    $this->prix=$this->product->product->prix;
    $this->quantity=$this->product->quantity;
    $this->photo=$this->product->photo;
    $this->commande->color= $this->product->id;
    $this->commande->taille= '0';

    $this->msgText=" اللون ";
    $this->msgValue=$this->product->couleur;
}
elseif ($this->typ=='complexe') {
    $this->product=Taille::find($this->product_id);
    $this->product_id=$this->product->product_id;
    $this->prix=$this->product->product->prix;
    $this->photo=$this->product->product->photo;
    $this->quantity=$this->product->quantity;
    $this->commande->taille= $this->product->id;
    $this->msgText=$this->product->color->couleur."  المقاس ";
    $this->commande->color= $this->product->color->id;
    $this->msgValue=$this->product->taille;

}




$this->jsonobj = '{
    "W1":"أدرار",
    "W2":"الشلف",
    "W3":"الأغواط",
    "W4":"أم البواقي",
    "W5":"باتنة",
    "W6":"بجاية",
    "W7":"بسكرة",
    "W8":"بشار",
    "W9":"البليدة",
"W01":"أدرار",
"W33":"إليزي",
"W04":"أم البواقي",
"W03":"الأغواط",
"W09":"البليدة",
"W10":"البويرة",
"W32":"البيض",
"W16":"الجزائر",
"W17":"الجلفة",
"W02":"الشلف",
"W36":"الطارف",
"W26":"المدية",
"W28":"المسيلة",
"W45":"النعامة",
"W39":"الوادي",
"W05":"باتنة",
"W06":"بجاية",
"W34":"برج بوعريريج",
"W07":"بسكرة",
"W08":"بشار",
"W35":"بومرداس",
"W12":"تبسة",
"W13":"تلمسان",
"W11":"تمنراست",
"W14":"تيارت",
"W42":"تيبازة",
"W15":"تيزي وزو",
"W38":"تيسمسيلت",
"W37":"تيندوف",
"W18":"جيجل",
"W40":"خنشلة",
"W19":"سطيف",
"W20":"سعيدة",
"W21":"سكيكدة",
"W41":"سوق أهراس",
"W22":"سيدي بلعباس",
"W23":"عنابة",
"W44":"عين الدفلى",
"W46":"عين تيموشنت",
"W47":"غرداية",
"W48":"غليزان",
"W24":"قالمة",
"W25":"قسنطينة",
"W27":"مستغانم",
"W29":"معسكر",
"W43":"ميلة",
"W30":"ورقلة",
"W31":"وهران"
}';

$this->obj = json_decode($this->jsonobj);


        
        $this->askQuantity();
    }
}