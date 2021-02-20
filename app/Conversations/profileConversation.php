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
use App\Conversations\profileConversation;

class profileConversation extends Conversation
{

   

public function __construct() {

  


}
    /**
     * First question
     */
   



public function askPhone(){
    $this->ask(' من فضلك أدخل رقم هاتفك من خلال لوحة المفاتيح  ☎  ', function(Answer $answer1) {
        $this->phone = $answer1->getText();
        if (is_numeric($this->phone)) {
            $this->client->phone=$this->phone;
            $this->askAddress();
           
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
        $this->askWilaya();});
}




public function askWilaya(){
    $this->ask('🇩🇿  من فضلك أدخل رقم ولايتك     ', function(Answer $answer) {
        $this->wilaya = $answer->getText();

        if (is_numeric($this->wilaya)) {







${"W".$this->wilaya}="W".$this->wilaya;
 $this->client->wilaya=$this->obj->${"W".$this->wilaya};
$this->client->save(); 
$this->bot->reply("☑ لقد تم تعديل بياناتك بنجاح  ");           
        }
        else{$this->bot->reply(" خطأ , من فضلك أدخل  رقم الولاية فقط ");
            $this->askWilaya();
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
"W31":"وهران"}';

$this->obj = json_decode($this->jsonobj);


        
        $this->askPhone();
    }
}
