<?php
use App\Client;
use App\Remise;
use App\Product;
use App\Category;
use App\Commande;
use App\SubCategory;
use Illuminate\Support\Str;
use App\Conversations\ByColorConversation;
use App\Conversations\ExampleConversation;
use App\Http\Controllers\BotManController;
use App\Conversations\ByTailleConversation;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;






$botman = resolve('botman');

$botman->hears('GET_START', function ($bot) {
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
$bot->reply( 'تشرفنا زيارتك لصفحة D-Zed Store');
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
    $bot->reply(ButtonTemplate::create('عذرًا ، لم أستطع فهمك 😕 '."\n". 'هذه قائمة بالأوامر التي أفهمها:')



    ->addButton(ElementButton::create('  🛒  تصفح منتجاتنا ')
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









$botman->hears('show_me_products', function ($bot) {

    $categories=Category::all();
    $elements=array();
    
 
  foreach ($categories as $categorie ) { 
      $text="";
    foreach ($categorie->subCat as $element) {
      $text=$text."   ".$element->nom;
    }
        $elements[]=Element::create($categorie->nom)
        ->subtitle($text)
        ->image($categorie->photo)
    ->addButton(ElementButton::create(" 🛒 إبدأ التسوق ")
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
    $products=Product::where("SubCat_id",$number)->where('quantity','>','0')->get();
    $total=$products->count();
    $nbr_aut_fb=10;
    $resultat=$total/$nbr_aut_fb;
    $reste = fmod($total, $nbr_aut_fb);
    $u="0.".$reste;
    $pages=$resultat-$u+1;
    for ($a=0; $a < $pages ; $a++) { 
        ${"element$a"}=array();
    }

    
    foreach ($products as $product ) {
        if ($product->product_type=="simple") { 
            $text="";
            $payload='select'.$product->id;}
        elseif($product->product_type=="color"){
                $payload='showColor'.$product->id;
                $text="";
                foreach ($product->color as $color) {
                 $text=$text.''.$color->couleur ." . ";}}
        elseif($product->product_type=="taille"){
                $payload='showTaille'.$product->id;
                $text="";
                foreach ($product->taille as $taille) {
                    $text=$text.''.$taille->taille ." . ";}}
                }
                $index=0;
                $i=0;
        $remises=Remise::where("product_id",$product->id)->first();
        if (!$remises) {
           
           
                foreach ($products as $product ) {
        $index=$index+1;

        ${"element$i"}[]=Element::create($product->nom)
        ->subtitle($text."\n"." السعر  ".$product->prix . " دج ")
        ->image($product->photo)
        ->addButton(ElementButton::create(' 🛒 إشتر هذا المنتج')
            ->payload($payload)
            ->type('postback'));
            if ($index==10) {
                $i=$i+1;
                $index=0;
            
    
}}
           

}


else {
$percentage=round(100-$remises->prix*100/$remises->produit->prix); 
$text=$text."\n"." (-".$percentage ."%) ".$remises->prix." DA : السعر الجديد ";
$elements[]=Element::create($product->nom)
->subtitle($text)
->image($product->photo)
->addButton(ElementButton::create(' 🛒 إشتر هذا المنتج')
    ->payload($payload)
    ->type('postback'));}


  

    for ($k=0;  $k<$pages ; $k++) { 
          $bot->reply(GenericTemplate::create()
        ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
        ->addElements( ${"element$k"}));
    }
       });



    $botman->hears('showColor([0-9]+)', function ( $bot,$number) {



        $product=Product::find($number);
        foreach ($product->color as $color ) {
            $elements[]=Element::create($color->couleur)
            ->subtitle(" السعر  ".$product->prix . " دج ")
            ->image($color->photo)
            ->addButton(ElementButton::create(' ✅ إشتر هذا المنتج')
                ->payload("byColorShow".$color->id)
                ->type('postback'));
    }
        $bot->reply(GenericTemplate::create()
        ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
        ->addElements($elements)
    );    
        
    });

    $botman->hears('byColorShow([0-9]+)', function ( $bot,$number) {
    $bot->startConversation(new ByColorConversation($number));});
    
    $botman->hears('showTaille([0-9]+)', function ( $bot,$number) {
    $product=Product::find($number);
    $taille_array=array();
    foreach ($product->taille as $taille ) {
    $taille_array[]=Button::create($taille->taille)->value("slectedTaille".$taille->id);}

        $bot->reply(Question::create(' 📏 إختر القياس المناسب ')->addButtons($taille_array));

        // $bot->startConversation(new ByTailleConversation($number));

    });


    $botman->hears('slectedTaille([0-9]+)', function ( $bot,$number) {

        $bot->startConversation(new ByTailleConversation($number));

        
        
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



    $botman->hears('my_commandes', function ( $bot) {


        $user = $bot->getUser();
        $facebook_id = $user->getId();
        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();
        $full_name=$firstname.'-'.$lastname;

$client=Client::whereFacebook($full_name)->first();


        $commandes=Commande::where("client_id",$client->id)->whereType('1')->orderBy('created_at', 'ASC')->get();
        $elements=array();
        foreach ($commandes as $commande ) {
            $elements[]=
            Element::create($commande->product->nom)
                ->image($commande->product->photo)
                ->addButton(ElementButton::create(' ❌ إلغاء الطلبية  ')
                    ->payload('cancelCommande'.$commande->id)
                    ->type('postback'));
        }
            $bot->reply(GenericTemplate::create()
            ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
            ->addElements($elements)
        );    


    });


    $botman->hears('cancelCommande([0-9]+)', function ( $bot,$number) {

$commande=Commande::find($number);
$commande->delete();
         $bot->reply("حسنا لقد تم إلغاء طلبك   ");  
        $bot->reply(Question::create('هل تريد إختيار منتج آخر ؟ ')->addButtons([
            Button::create(' ✅ نعم ')->value('show_me_products'),
            Button::create('   ❌ لا شكرا  ')->value('NoCancelAgain')
            ]));
        
    });





