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

       
        $user = $this->bot->getUser();
        $facebook_id = $user->getId();
        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();
        $full_name=$firstname.'-'.$lastname;
        $this->client=Client::where('facebook',$full_name)->first();


if ( $this->product->quantity<$this->q) {
   $this->bot->reply("لا توجد لدينا كل هاته الكمية يرجى إختيار كمية أقل 🤷‍♂️ ");
   $this->askQuantity();

}
else {
  

        $this->product->quantity= $this->product->quantity-$this->q;


        $this->commande=new Commande();
        $this->commande->client_id=$this->client->id;
        $this->commande->product_id=$this->product_id;
        $this->commande->commande_type=$this->typ;
        $this->commande->type="1";
        $this->commande->quantity=$this->q;
        if ($this->client->phone=="vide" && $this->client->address=="vide" && $this->client->wilaya=="vide" ) {
           $this->askQuestion();
           return;
          
        }else{ 
            $this->bot->reply(" رقم هاتفك هو : ☎ ".$this->client->phone);
            $this->bot->reply(" ولايتك هي : 🇩🇿  ".$this->client->wilaya);
            $this->bot->reply(" عنوانك هو :  🏠 ".$this->client->address);
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

                $this->askConfirmation();
               } else {                $this->askQuestion();
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
        $this->askConfirmation();});
}
public function askConfirmation(){
          

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
    $this->bot->reply('  الكمية   : '.$this->q);
    $this->bot->reply('  الهاتف ☎ : '. $this->client->phone);
    $this->bot->reply('  العنوان   : '. $this->client->address);
    $this->bot->reply('  الولاية   : '.$this->client->wilaya);

    $remise=Remise::where("product_id",$this->product_id)->first();
  
    $this->commande->total_price=$this->prix*$this->q;
    $question=Question::create( 'المبلغ الإجمالي  💵 : '.$this->commande->total_price." دج ")->addButtons([
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


public function finalStep(){


    $this->product->save();
    $this->commande->save();
    $this->client->save();
    $this->bot->reply("    شكرا لك 😍 "); 
    $this->bot->reply("  لقد تم حفظ طلبك بنجاح  ✅"); 
    $this->bot->reply(Question::create('    سنتصل بك قريبا لتأكيد طلبيتك  😊 ')
            ->addButtons([
                Button::create(' ❌ إلغاء الطلبية ')
                    ->value('cancelCommande'.$this->commande->id),
         
                    Button::create(' 🛒  طلبياتي  ')
                    ->value('my_commandes'),
                    Button::create('➕ إشتر منتج آخر ')
                    ->value('show_me_products'),
                    
                    ])) ;
;


}
public function askWilaya(){
    $this->ask('🇩🇿  من فضلك أدخل رقم ولايتك     ', function(Answer $answer) {
        $this->wilaya = $answer->getText();

        if (is_numeric($this->wilaya)) {


$jsonobj = '{
"w01":"أدرار",
"w33":"إليزي",
"w04":"أم البواقي",
"w03":"الأغواط",
"w09":"البليدة",
"w10":"البويرة",
"w32":"البيض",
"w16":"الجزائر",
"w17":"الجلفة",
"w02":"الشلف",
"w36":"الطارف",
"w26":"المدية",
"w28":"المسيلة",
"w45":"النعامة",
"w39":"الوادي",
"w05":"باتنة",
"w06":"بجاية",
"w34":"برج بوعريريج",
"w07":"بسكرة",
"w08":"بشار",
"w35":"بومرداس",
"w12":"تبسة",
"w13":"تلمسان",
"w11":"تمنراست",
"w14":"تيارت",
"w42":"تيبازة",
"w15":"تيزي وزو",
"w38":"تيسمسيلت",
"w37":"تيندوف",
"w18":"جيجل",
"w40":"خنشلة",
"w19":"سطيف",
"w20":"سعيدة",
"w21":"سكيكدة",
"w41":"سوق أهراس",
"w22":"سيدي بلعباس",
"w23":"عنابة",
"w44":"عين الدفلى",
"w46":"عين تيموشنت",
"w47":"غرداية",
"w48":"غليزان",
"w24":"قالمة",
"w25":"قسنطينة",
"w27":"مستغانم",
"w29":"معسكر",
"w43":"ميلة",
"w30":"ورقلة",
"w31":"وهران"}';




$obj = json_decode($jsonobj);
${"w".$this->wilaya}="w".$this->wilaya;
 $this->client->wilaya=$obj->${"w".$this->wilaya};
            
            $this->askAddress();
        }
        else{$this->bot->reply(" خطأ , من فضلك أدخل  رقم الولاية فقط ");
            $this->askWilaya();
        }
    

    });
}


    public function askQuantity()
    {
        
        if ($this->typ=="simple") {
            $this->product=Product::find($this->product_id);
            $this->photo= $this->product->photo;
            $this->quantity=$this->product->quantity;
            $this->prix=$this->product->prix;
            $this->msgText="";
            $this->msgValue=$this->product->nom;


}elseif ($this->typ=='taille') {
    $this->product=Taille::find($this->product_id);
    $this->prix=$this->product->product->prix;
    $this->photo=$this->product->product->photo;
    $this->quantity=$this->product->quantity;
    $this->msgText="  المقاس ";
    $this->msgValue=$this->product->taille;

}
elseif ($this->typ=='color') {
    $this->product=Color::find($this->product_id);
    $this->prix=$this->product->product->prix;
    $this->quantity=$this->product->quantity;
    $this->photo=$this->product->photo;
    $this->msgText=" اللون :";
    $this->msgValue=$this->product->couleur;

}
        
        $this->q="0";
        $question1=Question::create('   ما الكمية التي تريد شرائها ؟  🔢   ')
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
                ->value('manuel')
                ]);
        
        
            

       
    
    $this->ask($question1, function (Answer $answer) {

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

                   
                            case "manuel":
                                $this->ask(' من فضلك أدخل الكمية من خلال لوحة المفاتيح    ', function(Answer $answer) {
                                    $this->q = $answer->getText();
                                    $this->askNumber();
                                });
                               
           
          }
     
    
});
       

    }
    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askQuantity();
    }}