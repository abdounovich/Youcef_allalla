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
        $this->taille=Taille::find($this->product_id);
        $this->taille->quantity=$this->taille->quantity-1;
        $this->commande=new Commande();
        $this->commande->client_id=$this->client->id;
        $this->commande->product_id=$this->taille->product_id;
        $this->commande->type="1";
        $this->commande->commande_type="taille";
        $this->commande->taille=$this->product_id;

      
        if ($this->client->phone=="vide" AND $this->client->address=="vide" ) {
            $this->ask(' من فضلك أدخل رقم هاتفك من خلال لوحة المفاتيح  ☎  ', function(Answer $answer) {
                $this->phone = $answer->getText();
                $this->client->phone=$this->phone;
                
                $this->ask(' من فضلك أدخل  عنوانك الكامل  🗺    ', function(Answer $answer) {
                $this->address = $answer->getText();
                $this->client->address=$this->address;
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
            $this->bot->reply(": رقم هاتفك هو ".$this->client->phone);
            $this->bot->reply(": عنوانك هو  ".$this->client->address);

            $question=Question::create(' هل تود الإستمرار بهذا الرقم والعنوان ?   ')
            ->addButtons([
                Button::create('  نعم إستمر ')
                    ->value('yes'),
                Button::create('تغيير   ')
                    ->value('change')]);
            
           }      

           
        
        $this->ask($question, function (Answer $answer) {
            if ($answer->getValue() === 'yes') {
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
            } else {
                $this->ask(' من فضلك أدخل رقم هاتفك من خلال لوحة المفاتيح  ☎  ', function(Answer $answer) {
                    $this->phone = $answer->getText();
                    $this->client->phone=$this->phone;
                    
                    $this->ask(' من فضلك أدخل  عنوانك الكامل  🗺    ', function(Answer $answer) {
                    $this->address = $answer->getText();
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

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askNumber();
    }
}
