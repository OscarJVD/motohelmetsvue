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