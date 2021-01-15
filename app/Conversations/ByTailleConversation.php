<?php

namespace App\Conversations;

use App\Client;
use App\Product;
use App\Commande;
use App\Taille;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class ByTailleConversation extends Conversation
{

    protected $product_id;

public function __construct(string $product_id ) {

    $this->product_id = $product_id;
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
        $taille=Taille::find($this->product_id);
        $taille->quantity=$taille->quantity-1;
        $taille->save();
        $this->commande=new Commande();
        $this->commande->client_id=$this->client->id;
        $this->commande->product_id=$taille->product_id;
        $this->commande->type="1";
        $this->commande->commande_type="taille";
        $this->commande->taille=$this->product_id;

      
        $this->ask(' من فضلك أدخل رقم هاتفك من خلال لوحة المفاتيح  ☎ ', function(Answer $answer) {
            // Save result
            $this->phone = $answer->getText();
            $this->client->phone=$this->phone;
            $this->ask(' من فضلك أدخل  عنوانك الكامل  🗺  ', function(Answer $answer) {
                // Save result
                $this->address = $answer->getText();
                $this->client->address=$this->address;


                
            $this->commande->save();
            $this->client->save();
            $this->bot->reply("   😍 شكرا لك "); 
            $this->bot->reply("  لقد تم حفظ طلبك بنجاح  ✅"); 
            
            $this->bot->reply(Question::create('  😊 سنتصل بك قريبا لتأكيد طلبيتك  ')
                    ->addButtons([
                        Button::create(' ❌ إلغاء الطلبية ')
                            ->value('my_commandes'),
                        Button::create('➕ إشتر منتج آخر ')
                            ->value('show_me_products'),
                    ]));
            
                    // $bot->startConversation(new ByTailleConversation($number));
            
            



            });
            


        });
    

      
       
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askNumber();
    }
}
