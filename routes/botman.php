<?php
use App\Client;
use App\Remise;
use App\Product;
use App\Category;
use App\Commande;
use App\SubCategory;
use Illuminate\Support\Str;
use App\Conversations\ExampleConversation;
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;






$botman = resolve('botman');

$botman->hears('GET_STARTED', function ($bot) {
    $user = $bot->getUser();
    $facebook_id = $user->getId();
    // Access last name
    $firstname = $user->getFirstname();
// Access last name
$lastname = $user->getLastname();
$full_name=$firstname.'-'.$lastname;
// Access Username
$username=Client::whereFacebook($full_name)->count();
if ($username=="0") {
    $client=new Client();
    $client->facebook=$full_name;
    $client->slug=Str::random(10) ;
    $client->fb_id=$facebook_id;
    $client->phone="aucun numero de telephone";
    $client->address="aucune adresse";
    $config=Config::get('botman.facebook.token');

    ini_set("allow_url_fopen", 1);
    
                  $userInfoData=file_get_contents('https://graph.facebook.com/v2.6/'.$client->fb_id.'?fields=profile_pic&access_token='.$config);
                  $userInfo = json_decode($userInfoData, true);
              $picture = $userInfo['profile_pic'] ;
    
   
    $client->photo=$picture;


    $client->save();



}
$bot->reply($full_name . ' : مرحبا بك ☺ ');
$bot->reply( 'تشرفنا زيارتك لصفحة NNNN');
$bot->reply(ButtonTemplate::create('   أنا روربوت المحادثة التلقائية  🤖  كيف يمكنني خدمتك ؟  ')
->addButton(ElementButton::create('  🛒 إبدأ التسوق الآن ')
	    ->type('postback')
	    ->payload('show_me_products')
    )
    ->addButton(ElementButton::create(' 👨‍🏫 كيفية الشراء')
    ->type('postback')
    ->payload('steps')	)
	->addButton(ElementButton::create(' 💬 تواصل مع المبرمج')
    ->url('https://www.messenger.com/t/merahi.adjalile')
	)
);


});



$botman->fallback(function($bot) {
    $bot->reply('sorry');

});



$botman->hears('1', function ($bot) {
$categories=Category::all();
$text="0";
foreach ($categories as $categorie ) {
foreach ($categorie->subCat as $element) {
    $bot->reply($element->nom);
}
}

;
});






$botman->hears('show_me_products', function ($bot) {

    $categories=Category::all();
    $elements=array();
 
  foreach ($categories as $categorie ) { 
      $text="";
    foreach ($categorie->subCat as $element) {
      $text=$text." -- ".$element->nom;
    }
        $elements[]=Element::create($categorie->nom)
        ->subtitle($text)
        ->image($categorie->photo)
        ->addButton(ElementButton::create($categorie->nom)
            ->payload('sous_cat_'.$categorie->id)
            ->type('postback')
    );

    }
        $bot->reply(GenericTemplate::create()
        ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
        ->addElements($elements)
    );    
   


});

$botman->hears('sous_cat_([0-9]+)', function($bot,$number) {
$sous_cats=SubCategory::where("cat_id",$number)->get();
$elements=array();
foreach ($sous_cats as $sous_cat ) {
    $elements[]=
    Element::create($sous_cat->nom)
        ->image($sous_cat->photo)
        ->addButton(ElementButton::create(' 🛍 تصفح المنتجات')
            ->payload('product_'.$sous_cat->id)
            ->type('postback'));
}
    $bot->reply(GenericTemplate::create()
    ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
    ->addElements($elements)
);    
});



$botman->hears('product_([0-9]+)', function($bot,$number) {
    $products=Product::where("SubCat_id",$number)->get();
    $elements=array();
    foreach ($products as $product ) {


        if ($product->product_type=="simple") {
            
            $text="  السعر ".$product->prix."  دج ";
            $payload='select'.$product->id;
        }
            elseif($product->product_type=="color"){
                $payload='showColor'.$product->id;

                $text="";

                foreach ($product->color as $color) {
                 $text=$text.''.$color->couleur .",";}
               
            }
            
            elseif($product->product_type=="taille"){
                $payload='showTaille'.$product->id;

                $text="";

                foreach ($product->taille as $taille) {
                    $text=$text.''.$taille->taille .",";
                  
               }
            
            
            }
       /*  $remises=Remise::where("product_id",$product->id)->first();
        if (!$remises) {
$text=$product->prix." Da";
}else {
$percentage=round(100-$remises->prix*100/$remises->produit->prix);



 
$text="-".$percentage ."%\n".$remises->prix." DA : السعر الجديد ";



} */

        $elements[]=Element::create($product->nom)
            ->subtitle($text)
            ->image($product->photo)
            ->addButton(ElementButton::create('إشتر هذا المنتج')
                ->payload($payload)
                ->type('postback'));
    }
        $bot->reply(GenericTemplate::create()
        ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
        ->addElements($elements)
    );    
    });



    $botman->hears('showColor([0-9]+)', function ( $bot,$number) {

        $bot->reply(" color list should be here");


        $product=Product::find($number);
        foreach ($product->color as $color ) {
            $elements[]=Element::create($color->couleur)
            ->subtitle("color")
            ->image($color->photo)
            ->addButton(ElementButton::create('إشتر هذا المنتج')
                ->payload("byColorShow".$color->id)
                ->type('postback'));
    }
        $bot->reply(GenericTemplate::create()
        ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
        ->addElements($elements)
    );    
        
    });

    $botman->hears('byColorShow([0-9]+)', function ( $bot,$number) {
        $bot->startConversation(new ByColorConversation($number));

    });

    $botman->hears('showTaille([0-9]+)', function ( $bot,$number) {
        $bot->reply(" Taille list should be here");

    });


    $botman->hears('select([0-9]+)', function ( $bot,$number) {

        $bot->startConversation(new ExampleConversation($number));

        
        
    });

    $botman->hears('NoCancel', function ( $bot) {
        $bot->reply("حسنا لقد تم إلغاء طلبك   ");  
        $bot->reply(Question::create('هل تريد إختيار منتج آخر ؟ ')->addButtons([
            Button::create(' ✅ نعم ')->value('show_me_products'),
            Button::create('   ❌ لا شكرا  ')->value('NoCancelAgain')
            ]));

    });
    $botman->hears('NoCancelAgain', function ( $bot) {
        $bot->reply("حسنا   ");  
    });



