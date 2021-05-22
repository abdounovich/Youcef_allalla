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

    return view('welcome');

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
Route::post('colis/add/', 'ColiController@store')->name('colis.add');




Route::get('/colis/test/{id}', function ($id) {



    $jsonobj = '{
        "1":"أدرار",
        "2":"الشلف",
        "3":"الأغواط",
        "4":"أم البواقي",
        "5":"باتنة",
        "6":"بجاية",
        "7":"بسكرة",
        "8":"بشار",
        "9":"البليدة",
    "01":"أدرار",
    "33":"إليزي",
    "04":"أم البواقي",
    "03":"الأغواط",
    "09":"البليدة",
    "10":"البويرة",
    "32":"البيض",
    "16":"الجزائر",
    "17":"الجلفة",
    "02":"الشلف",
    "36":"الطارف",
    "26":"المدية",
    "28":"المسيلة",
    "45":"النعامة",
    "39":"الوادي",
    "05":"باتنة",
    "06":"بجاية",
    "34":"برج بوعريريج",
    "07":"بسكرة",
    "08":"بشار",
    "35":"بومرداس",
    "12":"تبسة",
    "13":"تلمسان",
    "11":"تمنراست",
    "14":"تيارت",
    "42":"تيبازة",
    "15":"تيزي وزو",
    "38":"تيسمسيلت",
    "37":"تيندوف",
    "18":"جيجل",
    "40":"خنشلة",
    "19":"سطيف",
    "20":"سعيدة",
    "21":"سكيكدة",
    "41":"سوق أهراس",
    "22":"سيدي بلعباس",
    "23":"عنابة",
    "44":"عين الدفلى",
    "46":"عين تيموشنت",
    "47":"غرداية",
    "48":"غليزان",
    "24":"قالمة",
    "25":"قسنطينة",
    "27":"مستغانم",
    "29":"معسكر",
    "43":"ميلة",
    "30":"ورقلة",
    "31":"وهران"
    }';
    
    $obj = json_decode($jsonobj);



    




    $url = "https://api.yalidine.com/v1/communes/?has_stop_desk=true&wilaya_id=16"; // the communes endpoint
    $api_id = "58955441267299948423"; // your api ID
    $api_token = "f8GCfYr6yNNE8Exk1vIv34OFSjSoJ7oTRulGDVR52PgcmQ035jKJetdAqet9IhWp"; // your api token
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'X-API-ID: '. $api_id,
            'X-API-TOKEN: '. $api_token
        ),
    ));
    
    $response_json = curl_exec($curl);
    curl_close($curl);
    
    return $response_array = json_decode($response_json,true); // converting the json to a php array
    
    /* now handle the response_array like you need
    
        ...
    
    */


   });