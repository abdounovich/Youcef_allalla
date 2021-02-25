<?php
use App\Color;
use App\Client;
use App\Remise;
use App\Taille;
use App\Product;
use App\Category;
use App\Commande;
use App\SubCategory;
use Illuminate\Support\Str;
use App\Conversations\botConversation;
use App\Conversations\ByColorConversation;
use App\Conversations\ExampleConversation;
use App\Conversations\profileConversation;
use App\Http\Controllers\BotManController;
use App\Conversations\ByTailleConversation;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;








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
    $client->phone="vide";
    $client->address="vide";
    $client->wilaya="vide";
    $config=Config::get('botman.facebook.token');

    ini_set("allow_url_fopen", 1);
    
                  $userInfoData=file_get_contents('https://graph.facebook.com/v2.6/'.$client->fb_id.'?fields=profile_pic&access_token='.$config);
                  $userInfo = json_decode($userInfoData, true);
              $picture = $userInfo['profile_pic'] ;
    
   
    $client->photo=$picture;


    $client->save();



}
$bot->reply($full_name . ' : مرحبا بك ☺ ');
$bot->typesAndWaits(1);
$bot->reply( 'تشرفنا زيارتك لصفحتنا  D-Zed Store');
$bot->typesAndWaits(1);
$bot->reply(ButtonTemplate::create('   🤖  كيف يمكنني خدمتك ؟  ')
->addButton(ElementButton::create('  🛒 إبدأ التسوق الآن ')
	    ->type('postback')
	    ->payload('show_me_products')
    )
    ->addButton(ElementButton::create(' 👨‍🏫 كيفية الشراء')
    ->type('postback')
    ->payload('steps')	)
	->addButton(ElementButton::create(' 💬 إستفسار ')
    ->url('https://www.messenger.com/t/merahi.adjalile')
	)
);


});




$botman->fallback(function($bot) {
    $bot->typesAndWaits(1);

    $bot->reply(ButtonTemplate::create('عذرًا ، لم أستطع فهمك 😕 '."\n". 'هذه قائمة بالأوامر التي أفهمها:')



    ->addButton(ElementButton::create('  🛒  تصفح منتجاتنا ')
    ->type('postback')
    ->payload('show_me_products')
)
->addButton(ElementButton::create(' 👨‍🏫 كيفية الشراء')
->type('postback')
->payload('steps')	)
->addButton(ElementButton::create(' 💬 إستفسار')
->url('https://www.messenger.com/t/merahi.adjalile')
)
);

});



$botman->hears('steps', function($bot) {

    $bot->reply(' 🤭  لتسهيل عملية الشراء إختصرتها لك في 3 مراحل بسيطة  للغاية  😁 : ');
    $bot->typesAndWaits(1);
    $bot->reply('1⃣ :  اختر المنتج  وخصائصه ( لون / مقاس / كمية ) واضغط على زر شراء الموجود أسفل كل صورة ');
    $bot->reply(' 2⃣ :  أدخل  رقم  هاتفك لكي نتصل بك من أجل تأكيد طلبيتك ');
    $bot->reply(' 3⃣ :   أدخل العنوان الذي نرسل إليه الطلبية   ');
    $bot->reply('بعد قيامك بهاته المراحل البسيطة تكون قد أتممت عملية الشراء ');
    $bot->reply('  في حالة قيامك  بعدة طلبيات ستستفيد من تخفيضات خاصة حسب الكمية أو المبلغ الإجمالي للطلبية  ');
    $bot->reply(' سيتصل بك بعدها أحد أعضاء الصفحة لتأكيد طلبيتك والإجابة على إستفساراتك  ');
    $bot->reply('في حالة عدم إستلام الزبون للطلبية فإنه يفقد جميع الإمتيازات مستقبلا في الصفحة مثل العروض الخاصة والتخفيضات ونقاط الوفاء');

    $bot->typesAndWaits(1);
    $bot->reply(ButtonTemplate::create('يمكنك الآن بدأ التسوق بكل سهولة  😍 ')
    ->addButton(ElementButton::create('🛍 إبدأ التسوق الآن')
        ->type('postback')
        ->payload('show_me_products')
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
    $bot->typesAndWaits(1);

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
$bot->typesAndWaits(1);

    $bot->reply(GenericTemplate::create()
    ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
    ->addElements($elements)
);    
});



$botman->hears('product_([0-9]+)', function($bot,$number1) {
    $products=Product::where("SubCat_id",$number1)->where('quantity','>','0')->get();
    $sub_cat=SubCategory::find($number1);
    $total=$products->count();


    if ($total=="0") {     
        $bot->reply(Question::create(" 👌 سنقوم قريبا بإضافة منتجات جديدة  في قسم  ".$sub_cat->nom ." ال".$sub_cat->categories->nom)->addButtons([
            Button::create('  الرئيسية  🏠 ')->value('show_me_products'),
            Button::create("قسم ال".$sub_cat->categories->nom." 🔝 ")->value('sous_cat_'.$sub_cat->categories->id)

            ]));
        
          


    }else{
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
            elseif($product->product_type=="complexe"){
                $payload='showComplexe'.$product->id;
                $text="";
                foreach ($product->color as $color) {
                   
                 $text=$text.' '.$color->couleur  ; 
                 $text= $text." (";
                 foreach ($color->taille as $taille) {
                    $text=$text.' '.$taille->taille  ;
                   
                   }
                   $text= $text.") ";
                }
                
                
                }
        elseif($product->product_type=="color"){
                $payload='showColor'.$product->id;
                $text="";
                foreach ($product->color as $color) {
                 $text=$text.' '.$color->couleur  ;}}
        elseif($product->product_type=="taille"){
                $payload='showTaille'.$product->id;
                $text="";
                foreach ($product->taille as $taille) {
                    $text=$text.' '.$taille->taille ;}}
                
                $index=0;
                $i=0;
        $remises=Remise::where("product_id",$product->id)->first();
        if (!$remises) {
           
           
            
        $index=$index+1;

        ${"element$i"}[]=Element::create($product->nom)
        ->subtitle($text."\n"." السعر   ".$product->prix . " دج "."\n".$product->descreption)
        ->image($product->photo)
        ->addButton(ElementButton::create(' 🛒 إشتر هذا المنتج')
            ->payload($payload)
          ->type('postback'))
            ->addButton(ElementButton::create('   🔍 تكبير الصورة  ')
            ->url($product->photo));
            if ($index==10) {
                $i=$i+1;
                $index=0;
            
    
}
           

}


else {
$percentage=round(100-$remises->prix*100/$remises->produit->prix); 
$text=$text."\n"."(-".$percentage ."%)"." السعر الجديد : ".$remises->prix."دج"."\n".$product->descreption;

    ${"element$i"}[]=Element::create($product->nom)
    ->subtitle($text)
    ->image($product->photo)
    ->addButton(ElementButton::create(' 🛒 إشتر هذا المنتج')
    ->payload($payload)
  ->type('postback'))
    ->addButton(ElementButton::create('   🔍 تكبير الصورة  ')
    ->url($product->photo));
        if ($index==10) {
            $i=$i+1;
            $index=0;


}}
    }

  
    $bot->typesAndWaits(1);

    for ($k=0;  $k<$pages ; $k++) { 
        
          $bot->reply(GenericTemplate::create()
        ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
        ->addElements( ${"element$k"}));
    }}
       });



    $botman->hears('showColor([0-9]+)', function ( $bot,$number2) {



        $product=Product::find($number2);
        $remise=Remise::where("product_id",$number2)->first();
        if ($remise) {
            $product->prix=$remise->prix;
        }
       

        foreach ($product->color as $color ) {
            $elements[]=Element::create($color->couleur)
            ->subtitle(" السعر  ".$product->prix . " دج "."\n".$product->descreption)
            ->image($color->photo)
            ->addButton(ElementButton::create(' ✅ إشتر هذا المنتج')
                ->payload("byColorShow".$color->id)
                ->type('postback'))
                ->addButton(ElementButton::create('   🔍 تكبير الصورة  ')
                ->url($color->photo));
    }
    $bot->typesAndWaits(1);

        $bot->reply(GenericTemplate::create()
        ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
        ->addElements($elements)
    );    
        
    });


    $botman->hears('byColorShow([0-9]+)', function ( $bot,$number3) {
        $messages=array("   أحسنت الإختيار 👌 "  ,    " 😍 إختيار رائع  "  , "👏 إختيار موفق");
        $bot->reply(   $messages[array_rand($messages)]);

        $bot->startConversation(new botConversation($number3,'color'));
});











$botman->hears('showComplexe([0-9]+)', function ( $bot,$number2) {



    $product=Product::find($number2);
    $remise=Remise::where("product_id",$number2)->first();
    if ($remise) {
        $product->prix=$remise->prix;
    }
   

    foreach ($product->color as $color ) {
        $les_tailles="";

        foreach ($color->taille as $taille ) {
        $les_tailles=$les_tailles." ".$taille->taille;

        }
        $elements[]=Element::create($color->couleur)
        ->subtitle($les_tailles."\n"." السعر  ".$product->prix . " دج "."\n".$product->descreption)
        ->image($color->photo)
        ->addButton(ElementButton::create(' ✅ إشتر هذا المنتج')
            ->payload("byComplexeShow".$color->id)
            ->type('postback'))
            ->addButton(ElementButton::create('   🔍 تكبير الصورة  ')
            ->url($color->photo));
}
$bot->typesAndWaits(1);

    $bot->reply(GenericTemplate::create()
    ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
    ->addElements($elements)
);    
    
});


$botman->hears('byComplexeShow([0-9]+)', function ( $bot,$number3) {

    $product=Color::find($number3);
    $taille_array=array();
    foreach ($product->taille as $taille ) {
    $taille_array[]=Button::create($taille->taille)->value("slectedTailleComplexe".$taille->id);}
    $bot->typesAndWaits(1);
    $messages=array("   أحسنت الإختيار 👌 "  ,    " 😍 إختيار رائع  "  , "👏 إختيار موفق");
    $bot->reply(   $messages[array_rand($messages)]);
        $bot->reply(Question::create(' 📏 إختر المقاس المناسب ')->addButtons($taille_array));



});



$botman->hears('slectedTailleComplexe([0-9]+)', function ( $bot,$number5) {
    $bot->typesAndWaits(1);
  $bot->reply('جيد جدا 👌');

    $bot->startConversation(new botConversation($number5,'complexe'));

    
    
});





    $botman->hears('showTaille([0-9]+)', function ( $bot,$number3) {
    $product=Product::find($number3);
    $taille_array=array();
    foreach ($product->taille as $taille ) {
    $taille_array[]=Button::create($taille->taille)->value("slectedTaille".$taille->id);}
    $bot->typesAndWaits(1);
    $messages=array("   أحسنت الإختيار 👌 "  ,    " 😍 إختيار رائع  "  , "👏 إختيار موفق");
    $bot->reply(   $messages[array_rand($messages)]);
        $bot->reply(Question::create(' 📏 إختر المقاس المناسب ')->addButtons($taille_array));


    });


    $botman->hears('slectedTaille([0-9]+)', function ( $bot,$number4) {
        $bot->typesAndWaits(1);
      $bot->reply('جيد جدا 👌');

        $bot->startConversation(new botConversation($number4,'taille'));

        
        
    });
    $botman->hears('select([0-9]+)', function ( $bot,$number5) {
        $bot->typesAndWaits(1);
        $messages=array("   أحسنت الإختيار 👌 "  ,    " 😍 إختيار رائع  "  , "👏 إختيار موفق");
        $bot->reply(   $messages[array_rand($messages)]);

        $bot->startConversation(new botConversation($number5,'simple'));

        
        
    });

    $botman->hears('NoCancel', function ( $bot) {
        $bot->typesAndWaits(1);

        $bot->reply("حسنا لقد تم إلغاء طلبك   ");  
        $bot->typesAndWaits(1);

        $bot->reply(Question::create('هل تريد إختيار منتج آخر ؟ ')->addButtons([
            Button::create(' ✅ نعم ')->value('show_me_products'),
            Button::create('   ❌ لا شكرا  ')->value('NoCancelAgain')
            ]));

    });

    $botman->hears('NoCancelAgain', function ( $bot) {
        $bot->typesAndWaits(1);

        $bot->reply("✅ حسنا   ");
        $bot->reply(" شكرا على زيارتك ونترقب رؤيتك في أقرب وقت  😊 ");  
  
    });



    $botman->hears('my_commandes', function ( $bot) {


        $bot->typesAndWaits(1);
        $user = $bot->getUser();
        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();
        $full_name=$firstname.'-'.$lastname;
        $client=Client::whereFacebook($full_name)->first();
        $commandes1=Commande::where("client_id",$client->id)->whereType("1")->get();
        $commandes2=Commande::where("client_id",$client->id)->whereType("2")->get();
        $commandes3=Commande::where("client_id",$client->id)->whereType("3")->get();
        $commandes6=Commande::where("client_id",$client->id)->whereType("6")->get();

        $cmd_array=array();

        if ($commandes1->count()>"0") {
            $cmd_array[]=Button::create("⚠ غير مؤكدة".' ('.$commandes1->count().")")->value("CommandeByType1");

        }
        if ($commandes2->count()>"0") {
            $cmd_array[]=Button::create(" 🆗 مؤكدة".' ('.$commandes2->count().")")->value("CommandeByType2");

        }
        if ($commandes6->count()>"0") {
            $cmd_array[]=Button::create(" 🚚 قيد التوصيل ".' ('.$commandes6->count().")")->value("CommandeByType6");

        }
        if ($commandes3->count()>"0") {
            $cmd_array[]=Button::create(" ✅ مستلمة ".' ('.$commandes3->count().")")->value("CommandeByType3");

        }
       
if (empty($cmd_array)) {
    $bot->reply("  لا توجد أي طلبية مسجلة بإسمك  😓  ");
    $bot->reply(ButtonTemplate::create('   يمكنك الآن تقديم أول طلبية بكل سهولة  ☺️ ')
->addButton(ElementButton::create('  🛒 تصفح المنتجات   ')
 ->type('postback')
 ->payload('show_me_products')
)
->addButton(ElementButton::create(' 👨‍🏫 كيفية الشراء')
->type('postback')
->payload('steps')	)
->addButton(ElementButton::create(' 💬 إستفسار ')
->url('https://www.messenger.com/t/merahi.adjalile')
)
);

}        else{
    $bot->typesAndWaits(1);            
    $bot->reply(Question::create(' إختر  نوع الطلبية ')->addButtons($cmd_array));
}
    });
    
$botman->hears('CommandeByType([0-9]+)', function ( $bot,$number7) {
    $bot->typesAndWaits(1);
    $user = $bot->getUser();
    $firstname = $user->getFirstname();
    $lastname = $user->getLastname();
    $full_name=$firstname.'-'.$lastname;
    $client=Client::whereFacebook($full_name)->first();
    $commandes=Commande::where("client_id",$client->id)->whereType($number7)->get();
    



       
      


        
        foreach ($commandes as $commande ) {




            $bot->reply(GenericTemplate::create()
            ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
            ->addElements([
                Element::create($commande->product->nom)
                    ->subtitle($commande->slug)
                    ->image($commande->product->photo)
                    
                    
                    ->addButton(ElementButton::create(' ℹ حالة الطلبية  ')
                        ->payload('CommandeStatue'.$commande->id)
                        ->type('postback'))
                         
                    ->addButton(ElementButton::create(' ❌ إلغاء الطلبية  ')
                    ->payload('cancelCommande'.$commande->id)
                    ->type('postback')
            )
            ])
        );




           
         
    
        }


    });


    $botman->hears('CommandeStatue([0-9]+)', function ( $bot,$number6) {
        date_default_timezone_set("Africa/Algiers");

        $commande=Commande::find($number6);
        switch ($commande->type) {
            case 1:
        $bot->reply("حالة الطلبية :"."".$commande->slug);
        $bot->reply(" ⚠ غير مؤكدة سنتصل بك قريبا ");


                break;
            case 2:
        $bot->reply("حالة الطلبية :".$commande->slug);
        $bot->reply(" 🟢  مؤكدة في إنتظار التوصيل  ");
                break;
            case 3:
                $bot->reply("حالة الطلبية :".$commande->slug);
 
        $bot->reply(" ✅  تم إستلام الطلبية  بنجاح");
                break;
            case 6:
                $bot->reply("حالة الطلبية :".$commande->slug);

                    $bot->reply(" 🚚 طلبية قيد التوصيل     ");
                            break;


                            case 4:
                                $bot->reply("حالة الطلبية :".$commande->slug);
                                $bot->reply("  طلبية  ملغاة  من طرف الأدمين     ");
                                $bot->reply("  تاريخ إلغاء الطلبية :".$commande->updated_at);

                                        break;


                                        case 5:
                                            $bot->reply("حالة الطلبية :".$commande->slug);
                                            $bot->reply("   لقد قمت بإلغاء هاته الطلبية   ");
                                            $bot->reply("  تاريخ إلغاء الطلبية :".$commande->updated_at);

                                                    break;
        }

    });


    $botman->hears('cancelCommande([0-9]+)', function ( $bot,$number7) {
        $commande=Commande::find($number7);
        if ($commande->product->product_type=="simple") {

            $produit=Product::find($commande->product->id);
            $produit->quantity=$produit->quantity+$commande->quantity;
            $produit->save();

        }
        elseif ($commande->product->product_type=="taille") {

            $produit=Taille::find($commande->taille);
            $produit->quantity=$produit->quantity+$commande->quantity;
            $produit->save();
        } 
        elseif ($commande->product->product_type=="color") {
            $produit=Color::find($commande->color);
            $produit->quantity=$produit->quantity+$commande->quantity;
            $produit->save();

        } 
        elseif ($commande->product->product_type=="complexe") {
            $produit=Taille::find($commande->taille);
            $produit->quantity=$produit->quantity+$commande->quantity;
            $produit->save();

        } 
    if ($commande->type=="1") {
        $commande->type=5;
        $commande->save();
        $bot->typesAndWaits(1);

         $bot->reply(" لقد تم إلغاء الطلبية ".$commande->slug." بنجاح  😄 ");  
         $bot->typesAndWaits(1);

        $bot->reply(Question::create('هل تريد إختيار منتج آخر ؟ ')->addButtons([
            Button::create(' ✅ نعم ')->value('show_me_products'),
            Button::create('   ❌ لا شكرا  ')->value('NoCancelAgain')
            ]));
    }
    else{

        $bot->reply("أنا آسف ، لا يمكنك إلغاء هذه الطلبية الآن لأنك قمت بتأكيدها من قبل ");  
        $bot->typesAndWaits(1);

       $bot->reply(Question::create('هل تريد إختيار منتج آخر ؟ ')->addButtons([
           Button::create(' ✅ نعم ')->value('show_me_products'),
           Button::create('   ❌ لا شكرا  ')->value('NoCancelAgain')
           ]));
    }
        
    });

    $botman->hears('PRO([0-9]+)', function($bot,$number1) {
        $product=Product::find($number1);
   if ($product->product_type=="simple") { 
                $text="";
                $payload='select'.$product->id;}
                elseif($product->product_type=="complexe"){
                    $payload='showComplexe'.$product->id;
                    $text="";
                    foreach ($product->color as $color) {
                       
                     $text=$text.' '.$color->couleur  ; 
                     $text= $text." (";
                     foreach ($color->taille as $taille) {
                        $text=$text.' '.$taille->taille  ;
                       
                       }
                       $text= $text.") ";
                    }
                    
                    
                    }
            elseif($product->product_type=="color"){
                    $payload='showColor'.$product->id;
                    $text="";
                    foreach ($product->color as $color) {
                     $text=$text.' '.$color->couleur  ;}}
            elseif($product->product_type=="taille"){
                    $payload='showTaille'.$product->id;
                    $text="";
                    foreach ($product->taille as $taille) {
                        $text=$text.' '.$taille->taille ;}
                    
                    }
                    
                   
            $remises=Remise::where("product_id",$product->id)->first();
            if (!$remises) {
            $element[]=Element::create($product->nom)
            ->subtitle($text."\n"." السعر   ".$product->prix . " دج "."\n".$product->descreption)
            ->image($product->photo)
            ->addButton(ElementButton::create(' 🛒 إشتر هذا المنتج')
                ->payload($payload)
              ->type('postback'))
                ->addButton(ElementButton::create('   🔍 تكبير الصورة  ')
                ->url($product->photo));}
        
    else {
    $percentage=round(100-$remises->prix*100/$remises->produit->prix); 
    $text=$text."\n"."(-".$percentage ."%)"." السعر الجديد : ".$remises->prix."دج"."\n".$product->descreption;
        $element[]=Element::create($product->nom)
        ->subtitle($text)
        ->image($product->photo)
        ->addButton(ElementButton::create(' 🛒 إشتر هذا المنتج')
        ->payload($payload)
        ->type('postback'))
        ->addButton(ElementButton::create('   🔍 تكبير الصورة  ')
        ->url($product->photo));
          
        
    }
        $bot->typesAndWaits(1);
    
            
              $bot->reply(GenericTemplate::create()
            ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
            ->addElements($element));
           });
        
    






         

           $botman->hears('my_profile', function($bot) {
            $bot->startConversation(new profileConversation());

            
        });

