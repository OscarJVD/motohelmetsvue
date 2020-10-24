<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/brands', 'BrandController');
Route::get('admin/brands/destroy/{id}', ['as' => 'brands/destroy', 'uses' => 'BrandController@destroy']);
Route::get('admin/brands/restore/{id}', ['as' => 'brands/restore', 'uses' => 'BrandController@restore']);
Route::get('admin/brands/force/{id}', ['as' => 'brands/force', 'uses' => 'BrandController@forcedelete']);
Route::post('admin/brands/paper_bin', ['as' => 'brands/paper_bin', 'uses' => 'BrandController@show']);
Route::post('admin/brands/update/{id}', ['as'=>'brands/update', 'uses'=>'BrandController@update']);

Route::resource('admin/categories', 'CategoryController');
Route::get('admin/categories/destroy/{id}', ['as' => 'categories/destroy', 'uses' => 'CategoryController@destroy']);
Route::get('admin/categories/restore/{id}', ['as' => 'categories/restore', 'uses' => 'CategoryController@restore']);
Route::get('admin/categories/force/{id}', ['as' => 'categories/force', 'uses' => 'CategoryController@forcedelete']);
Route::post('admin/categories/paper_bin', ['as' => 'categories/paper_bin', 'uses' => 'CategoryController@show']);
Route::post('admin/categories/update/{id}', ['as'=>'categories/update', 'uses'=>'CategoryController@update']);

Route::resource('admin/subcategories', 'SubcategoryController');
Route::get('admin/subcategories/destroy/{id}', ['as' => 'subcategories/destroy', 'uses' => 'SubcategoryController@destroy']);
Route::get('admin/subcategories/restore/{id}', ['as' => 'subcategories/restore', 'uses' => 'SubcategoryController@restore']);
Route::get('admin/subcategories/force/{id}', ['as' => 'subcategories/force', 'uses' => 'SubcategoryController@forcedelete']);
Route::post('admin/subcategories/paper_bin', ['as' => 'subcategories/paper_bin', 'uses' => 'SubcategoryController@show']);
Route::post('admin/subcategories/update/{id}', ['as'=>'subcategories/update', 'uses'=>'SubcategoryController@update']);

Route::resource('admin/products', 'ProductController');
Route::get('admin/products/destroy/{id}', ['as' => 'products/destroy', 'uses' => 'ProductController@destroy']);
Route::get('admin/products/restore/{id}', ['as' => 'products/restore', 'uses' => 'ProductController@restore']);
Route::get('admin/products/force/{id}', ['as' => 'products/force', 'uses' => 'ProductController@forcedelete']);
Route::post('admin/products/paper_bin', ['as' => 'products/paper_bin', 'uses' => 'ProductController@show']);
Route::post('admin/products/update/{id}', ['as'=>'products/update', 'uses'=>'ProductController@update']);


Route::resource('admin/orders', 'OrderController');
Route::get('admin/orders/destroy/{id}', ['as' => 'orders/destroy', 'uses' => 'OrderController@destroy']);
Route::get('admin/orders/restore/{id}', ['as' => 'orders/restore', 'uses' => 'OrderController@restore']);
Route::get('admin/orders/force/{id}', ['as' => 'orders/force', 'uses' => 'OrderController@forcedelete']);
Route::post('admin/orders/paper_bin', ['as' => 'orders/paper_bin', 'uses' => 'OrderController@show']);
Route::post('admin/orders/update/{id}', ['as'=>'orders/update', 'uses'=>'OrderController@update']);

Route::resource('admin/promotions', 'PromotionController');
Route::get('admin/promotions/destroy/{id}', ['as' => 'promotions/destroy', 'uses' => 'PromotionController@destroy']);
Route::get('admin/promotions/restore/{id}', ['as' => 'promotions/restore', 'uses' => 'PromotionController@restore']);
Route::get('admin/promotions/force/{id}', ['as' => 'promotions/force', 'uses' => 'PromotionController@forcedelete']);
Route::post('admin/promotions/paper_bin', ['as' => 'promotions/paper_bin', 'uses' => 'PromotionController@show']);
Route::post('admin/promotions/update/{id}', ['as'=>'promotions/update', 'uses'=>'PromotionController@update']);


Route::resource('admin/methodpayments', 'MethodPaymentController');
Route::get('admin/methodpayments/destroy/{id}', ['as' => 'methodpayments/destroy', 'uses' => 'MethodPaymentController@destroy']);
Route::get('admin/methodpayments/restore/{id}', ['as' => 'methodpayments/restore', 'uses' => 'MethodPaymentController@restore']);
Route::get('admin/methodpayments/force/{id}', ['as' => 'methodpayments/force', 'uses' => 'MethodPaymentController@forcedelete']);
Route::post('admin/methodpayments/paper_bin', ['as' => 'methodpayments/paper_bin', 'uses' => 'MethodPaymentController@show']);
Route::post('admin/methodpayments/update/{id}', ['as'=>'methodpayments/update', 'uses'=>'MethodPaymentController@update']);

