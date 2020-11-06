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

Route::get('/', function () {
    return view('index')
    ->with("products",Product::all())
    ->with("categories",Category::all())
    ->with("sub_categories",SubCategory::all())
    ->with("commandes",Commande::all())
    ->with("clients",Client::all())




    ;
});

Route::match(['get', 'post'], '/botman', 'BotManController@handle');

Route::get('/botman/tinker', 'BotManController@tinker');


Route::get('products', 'ProductController@index')->name('products');
Route::post('products/add', 'ProductController@store')->name('products.add');
Route::get('products/edit/{id}', 'ProductController@edit')->name('products.edit');
Route::post('products/edit/{id}', 'ProductController@update')->name('products.edit');
Route::get('products/delete/{id}', 'ProductController@destroy')->name('products.delete');




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
Route::get('commandes/return/{id}', 'CommandeController@return')->name('commandes.return');




Route::get('remises', 'RemiseController@index')->name('remises');
Route::post('remises/add', 'RemiseController@store')->name('remises.add');
Route::get('remises/edit/{id}', 'RemiseController@edit')->name('remises.edit');
Route::post('remises/edit/{id}', 'RemiseController@update')->name('remises.edit');
Route::get('remises/delete/{id}', 'RemiseController@destroy')->name('remises.delete');


