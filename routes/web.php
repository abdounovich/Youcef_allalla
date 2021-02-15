<?php

use App\Client;
use App\Product;
use App\Category;
use App\Commande;
use App\SubCategory;

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

Route::get('/2', function () {

    $commandes=Commande::whereHas('client', function (Builder $req) {
        $req->where('wilaya', 'ILIKE', '%'."قسنطينة".'%');
    });

})->get();
dd($commandes);




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
Route::post('clients/add', 'ClientController@store')->name('clients.add');
Route::get('clients/edit/{id}', 'ClientController@edit')->name('clients.edit');
Route::post('clients/edit/{id}', 'ClientController@update')->name('clients.edit');
Route::get('clients/delete/{id}', 'ClientController@destroy')->name('clients.delete');
Route::get('client/{id}', 'ClientController@show')->name('client.show');




Route::get('commandes', 'CommandeController@index')->name('commandes');
Route::post('commandes/add', 'CommandeController@store')->name('commandes.add');
Route::get('commandes/edit/{id}', 'CommandeController@edit')->name('commandes.edit');
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





