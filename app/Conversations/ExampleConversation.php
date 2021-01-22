<?php

namespace App\Conversations;

use App\Client;
use App\Product;
use App\Commande;
use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class ExampleConversation extends Conversation
{

    protected $product_id;

public function __construct(string $product_id ) {

    $this->product_id = $product_id;
    $this->q="0";

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
        $this->product=Product::find($this->product_id);

if ( $this->product->quantity<$this->q) {
   $this->bot->reply("لا توجد لدينا كل هاته الكمية يرجى إختيار كمية أقل ");
   $this->askQuantity();

}
else {
  

        $this->product->quantity= $this->product->quantity-$this->q;


        $this->commande=new Commande();
        $this->commande->client_id=$this->client->id;
        $this->commande->product_id=$this->product_id;
        $this->commande->commande_type="simple";
        $this->commande->type="1";
        $this->commande->quantity=$this->q;



        
        if ($this->client->phone=="vide" AND $this->client->address=="vide" ) {
            $this->ask(' من فضلك أدخل رقم هاتفك من خلال لوحة المفاتيح  ☎  ', function(Answer $answer) {
                $this->phone = $answer->getText();
                $this->client->phone=$this->phone;
                
                $this->ask(' من فضلك أدخل  عنوانك الكامل  🗺    ', function(Answer $answer) {
                $this->address = $answer->getText();
                $this->client->address=$this->address;
                $this->product->save();
                $this->commande->save();
                $this->client->save();
                $this->bot->reply("    شكرا لك 😍 "); 
                $this->bot->reply("  لقد تم حفظ طلبك بنجاح  ✅"); 
                $this->bot->reply(Question::create('    سنتصل بك قريبا لتأكيد طلبيتك  😊 ')
                        ->addButtons([
                            Button::create(' ❌ إلغاء الطلبية ')
                                ->value('cancelCommande'.$this->commande->id),
                            Button::create('➕ إشتر منتج آخر ')
                                ->value('show_me_products'),
                                Button::create(' 🛒  طلبياتي  ')
                                ->value('my_commandes'),])) ;
           });});
          
        }else{ 
            $this->bot->reply(" رقم هاتفك هو : ☎ ".$this->client->phone);
            $this->bot->reply(" عنوانك هو :  🏠 ".$this->client->address);

            $question=Question::create(' هل تود الإستمرار بهذا الرقم والعنوان ؟   ')
            ->addButtons([
                Button::create(' ✍️ تغيير   ')
                ->value('change'),
                Button::create('  ✅ نعم إستمر ')
                    ->value('yes')
               
                    
                    
                    
                    ]);
            
           }      

           
        
        $this->ask($question, function (Answer $answer) {
            if ($answer->getValue() === 'yes') {
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
                                ->value('show_me_products')
                          
                                ,])) ;
            } else {
                $this->ask(' من فضلك أدخل رقم هاتفك من خلال لوحة المفاتيح  ☎  ', function(Answer $answer) {
                    $this->phone = $answer->getText();
                    $this->client->phone=$this->phone;
                    
                    $this->ask(' من فضلك أدخل  عنوانك الكامل  🗺    ', function(Answer $answer) {
                    $this->address = $answer->getText();
                    $this->product->save();
                    $this->client->address=$this->address;$this->commande->save();
                    $this->client->save();
                    $this->bot->reply("    شكرا لك 😍 "); 
                    $this->bot->reply("  لقد تم حفظ طلبك بنجاح  ✅"); 
                    $this->bot->reply(Question::create('    سنتصل بك قريبا لتأكيد طلبيتك  😊 ')
                            ->addButtons([
                                Button::create(' ❌ إلغاء الطلبية ')
                                    ->value('cancelCommande'.$this->commande->id),
                                Button::create('➕ إشتر منتج آخر ')
                                    ->value('show_me_products'),
                                    Button::create(' 🛒  طلبياتي  ')
                                    ->value('my_commandes'),])) ;
               }); });            }

          
        });
    }  
                           
      
       
    }


    public function askQuantity()
    {
        $this->q="0";
        $question1=Question::create('   ما الكمية التي تريد شرائها ؟   ')
        ->addButtons([
            Button::create('1')
                ->value('q1'),
            Button::create('2')
                ->value('q2'),
            Button::create('3')
                ->value('q3'),
            Button::create('4')
                ->value('q4'),
            Button::create('5')
                ->value('q5'),
         
                Button::create('👇 أدخل الكمية')
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

                    case "q5":
                        $this->q="5";
                        $this->askNumber();
                        break;
                        

                        case "q6":
                            $this->q="6";
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
    }
}
