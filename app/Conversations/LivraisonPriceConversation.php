<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;

class LivraisonPriceConversation extends Conversation
{

    public $variable=0;
    
    public function AskPrice($wilaya)
    {


        $url = "https://api.yalidine.com/v1/deliveryfees/".$wilaya; // the wilayas endpoint
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
        ${"W".$wilaya}="W".$wilaya;
        $this->wilayaName=$this->obj->${"W".$wilaya};
        $this->bot->reply(" أهـــلا وســهــلا  بـنـاس ".$this->wilayaName." 😍 ");
    
        $this->bot->typesAndWaits(1);
        $this->bot->reply(ButtonTemplate::create(" ثمن التوصيل للمنزل هو ".$this->home." دج "."\n"."ثمن التوصيل لمكتب YALIDINE في  ولايتك  هو ".$this->desk." دج  ")
        ->addButton(ElementButton::create('🛍 إبدأ التسوق الآن')
            ->type('postback')
            ->payload('show_me_products')
        )
        
        );
        
    }

    public function askWilaya(){
      
        $this->ask('  لمعرفة سعر التوصيل يرجى كتابة رقم ولايتك 🇩🇿 ', function(Answer $answer) {
            $this->wilaya =$answer->getText();
            if (is_numeric($this->wilaya)AND $this->wilaya<49 AND $this->wilaya>0 ) {
    


                $this->AskPrice($this->wilaya);

            }
            else{
                
                if ( $this->variable<2) {
                    $this->bot->reply("  ✋ خطأ ,\n  أدخل رقم الولاية فقط 👇 ");
                    $this->variable=$this->variable+1;
                    $this->askWilaya();
                }
                else {
                    $this->bot->reply("  حدث خطأ ما !
                     يرجى إعادة المحاولة لاحقا  ");

                }

                
            }
        
    
        });
    }
    
    public function run()
    {
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
        $this->attachment = new Image('https://res.cloudinary.com/ds9qfm1ok/image/upload/v1618329949/171611099_189522426148517_6058507225347659126_n_oyghe3.png');
// Build message object
$this->message = OutgoingMessage::create('This is my text')
->withAttachment( $this->attachment);
$this->bot->reply( $this->message);
$this->bot->typesAndWaits(1);
       $this->askWilaya();
    }
}
