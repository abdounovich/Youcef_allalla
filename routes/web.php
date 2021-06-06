<?php

use App\Client;
use App\Product;
use App\Category;
use App\Commande;
use App\SubCategory;
use Illuminate\Database\Eloquent\Builder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {

    return '<!DOCTYPE html>
    <html>
    <head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset("js/app.js") }}" type="text/js"></script>   
    
    <script>
    $(document).on("pageinit",function(){
    
      var pathname = $(location).attr("href");
      var leva = $("#le").attr("href");
      var prava = $("#pr").attr("href");
    
      $("body").on("swiperight",function(){
        <!--alert("You swiped right!");-->
        location.href=prava;
      });                       
      $("body").on("swipeleft",function(){
        <!--alert("You swiped left!");-->
        location.href=leva;
      });
    });
    </script>
    </head>
    <body>
    
    
    <div id="test_div" style="display: block;">
        <img src="test.gif" width="100px">
        <a id="le" href="http://sleepy-garden-77812.herokuapp.com/products/">left</a>
        <a id="pr" href="http://sleepy-garden-77812.herokuapp.com/clients">right</a>
    </div>';

});


Route::get('/', function () {
    return view('index')
    ->with("products",Product::all())
    ->with("categories",Category::all())
    ->with("sub_categories",SubCategory::all())
    ->with("commandes",Commande::all())
    ->with("InactivCommandes",Commande::whereType(1)->get())
    ->with("clients",Client::all())


    ;
});

Route::match(['get', 'post'], '/botman', 'BotManController@handle');

Route::get('/botman/tinker', 'BotManController@tinker');


Route::get('products', 'ProductController@index')->name('products');
Route::post('products/add/taille', 'ProductController@storeTaille')->name('products.add.taille');
Route::post('products/add/simple', 'ProductController@storeSimple')->name('products.add.simple');
Route::post('products/add/color', 'ProductController@storeColor')->name('products.add.color');
Route::post('products/add/complexe', 'ProductController@storeComplexe')->name('products.add.complexe');
Route::post('products/add/complexeStepe', 'ProductController@storeComplexeStep1')->name('products.add.complexeStep1');

Route::get('products/edit/{id}', 'ProductController@edit')->name('products.edit');


Route::post('products/edit/{id}', 'ProductController@update')->name('products.edit');
Route::get('products/delete/{id}', 'ProductController@destroy')->name('products.delete');
Route::get('products/steps/{step}/{id}', 'ProductController@steps')->name('products.steps');





Route::get('categories', 'CategoryController@index')->name('categories');
Route::post('categories/add', 'CategoryController@store')->name('categories.add');
Route::get('categories/edit/{id}', 'CategoryController@edit')->name('categories.edit');
Route::post('categories/edit/{id}', 'CategoryController@update')->name('categories.edit');
Route::get('categories/delete/{id}', 'CategoryController@destroy')->name('categories.delete');




Route::get('sub_categories', 'SubCategoryController@index')->name('sub_categories');
Route::post('sub_categories/add', 'SubCategoryController@store')->name('sub_categories.add');
Route::get('sub_categories/edit/{id}', 'SubCategoryController@edit')->name('sub_categories.edit');
Route::post('sub_categories/edit/{id}', 'SubCategoryController@update')->name('sub_categories.edit');
Route::get('sub_categories/delete/{id}', 'SubCategoryController@destroy')->name('sub_categories.delete');





Route::get('clients', 'ClientController@index')->name('clients');
Route::get('client/update/{id}', 'ClientController@update')->name('client.update');
Route::post('clients/add', 'ClientController@store')->name('clients.add');
Route::post('clients/edit/{id}', 'ClientController@edit')->name('clients.edit');
Route::get('clients/delete/{id}', 'ClientController@destroy')->name('clients.delete');
Route::get('client/{id}', 'ClientController@show')->name('client.show');




Route::get('commandes', 'CommandeController@index')->name('commandes');
Route::post('commandes/add', 'CommandeController@store')->name('commandes.add');
Route::get('commandes/edit/{id}', 'CommandeController@edit')->name('commandes.edit');
Route::post('commandes/update/{id}', 'CommandeController@update')->name('commandes.update');

Route::post('commandes/edit/{id}', 'CommandeController@update')->name('commandes.edit');
Route::get('commandes/delete/{id}', 'CommandeController@destroy')->name('commandes.delete');
Route::get('commandes/confirmation/{id}', 'CommandeController@confirmation')->name('commandes.confirmation');
Route::get('commandes/delivration/{id}', 'CommandeController@delivration')->name('commandes.delivration');
Route::get('commandes/done/{id}', 'CommandeController@done')->name('commandes.done');
Route::get('commandes/return/{id}', 'CommandeController@return')->name('commandes.return');
Route::get('commandes/annuler/{id}', 'CommandeController@annuler')->name('commandes.annuler');





Route::get('remises', 'RemiseController@index')->name('remises');
Route::post('remises/add', 'RemiseController@store')->name('remises.add');
Route::get('remises/add/{id}', 'RemiseController@indexById')->name('remises.addByIdShow');
Route::post('remises/add/{id}', 'RemiseController@storeById')->name('remises.addByIdPost');


Route::get('remises/edit/{id}', 'RemiseController@edit')->name('remises.edit');
Route::post('remises/edit/{id}', 'RemiseController@update')->name('remises.edit');
Route::get('remises/delete/{id}', 'RemiseController@destroy')->name('remises.delete');


Route::get('colors/delete/{id}', 'ColorController@destroy')->name('colors.delete');
Route::get('colors/edit/{id}', 'ColorController@edit')->name('colors.edit');
Route::post('colors/edit/{id}', 'ColorController@update')->name('colors.edit');
Route::get('colors/add/{id}', 'ColorController@create')->name('colors.add');
Route::post('colors/add', 'ColorController@store')->name('color.add');



Route::get('tailles/delete/{id}', 'TailleController@destroy')->name('tailles.delete');
Route::get('tailles/edit/{id}', 'TailleController@edit')->name('tailles.edit');
Route::post('tailles/edit/{id}', 'TailleController@update')->name('tailles.edit');
Route::get('tailles/add/{id}', 'TailleController@create')->name('tailles.add');
Route::post('tailles/add', 'TailleController@store')->name('taille.add');


Route::get('images/add/{id}', 'ImageController@index')->name('images');
Route::get('images/show/{id}', 'ImageController@show')->name('images.show');
Route::post('images/add/{id}', 'ImageController@store')->name('images.add');

Route::get('images/color/add/{id}', 'ImageController@indexColor')->name('images.color');
Route::get('images/color/show/{id}', 'ImageController@showColor')->name('images.color.show');
Route::post('images/color/add/{id}', 'ImageController@storeColor')->name('images.color.add');

Route::get('colis/add/', 'ColiController@index')->name('colis.index');
Route::post('colis/add/{id}', 'ColiController@store')->name('colis.add');




Route::get('update/{table_name}', 'UpdateController@index')->name('show');
Route::post('update/{table_name}', 'UpdateController@update')->name('update');




Route::get('/colis/test/', function () {

    $url = "https://api.yalidine.com/v1/parcels/"; // the parcel's creation endpoint
    $api_id = "58955441267299948423"; // your api ID
    $api_token = "f8GCfYr6yNNE8Exk1vIv34OFSjSoJ7oTRulGDVR52PgcmQ035jKJetdAqet9IhWp"; // your api token
    
    $data =
        array( // the array that contains all the parcels
            array ( // first parcel
                "order_id"=>"MyFirstOrder",
                "firstname"=>"Brahim",
                "familyname"=>"Mohamed",
                "contact_phone"=>"0123456789,",
                "address"=>"Cité Kaidi",
                "to_commune_name"=>"Bordj El Kiffan",
                "to_wilaya_name"=>"Alger",
                "product_list"=>"Presse à café",
                "price"=>3000,
                "freeshipping"=> true,
                "is_stopdesk"=> true,
                "has_exchange"=> 0,
                "product_to_collect" => null
            ),
            array ( // second parcel
                "order_id" =>"MySecondOrder",
                "firstname"=>"رفيدة",
                "familyname"=>"بن مهيدي",
                "contact_phone"=>"0123456789",
                "address"=>"حي الياسمين",
                "to_commune_name"=>"Ouled Fayet",
                "to_wilaya_name"=>"Alger",
                "product_list"=>"كتب الطبخ",
                "price"=>2400,
                "freeshipping"=>0,
                "is_stopdesk"=>0,
                "has_exchange"=> false,
            ),
           
           
        );
    
    $postdata = json_encode($data);
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "X-API-ID: ". $api_id,
            "X-API-TOKEN: ". $api_token,
            "Content-Type: application/json"
        )
    );
    
    $result = curl_exec($ch);
    curl_close($ch);
    
    header("Content-Type: application/json");
    echo $result;
 

   });