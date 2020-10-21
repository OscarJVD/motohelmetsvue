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