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
        $product=Product::find($this->product_id);
        $product->quantity=$product->quantity-1;
        $product->save();
        $this->commande=new Commande();
        $this->commande->client_id=$this->client->id;
        $this->commande->product_id=$this->product_id;
        $this->commande->commande_type="simple";
        $this->commande->type="1";      
        $this->ask(' من فضلك أدخل رقم هاتفك من خلال لوحة المفاتيح  ☎  ', function(Answer $answer) {
            // Save result
            $this->phone = $answer->getText();
            $this->client->phone=$this->phone;
            $this->ask(' من فضلك أدخل  عنوانك الكامل  🗺    ', function(Answer $answer) {
                // Save result
                $this->address = $answer->getText();
                $this->client->address=$this->address;


                
            $this->commande->save();
            $this->client->save();
            $this->bot->reply("  لقد تم حفظ طلبك بنجاح  ✅"); 
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
