<?php

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

Route::resource('/gallerys', 'GalleryController', ['only' => ['index', 'show']]);


Auth::routes();

Route::get('/home', 'LoginController@index');
Route::post('/pincode','LoginController@login');
Route::get('/verify','LoginController@verify');



Route::post('articles/index','ArticleController@index');
Route::get('articles','ArticleController@show');

Route::get('about','AboutController@index');
Route::get('about/{post}','AboutController@show');


Route::resource('/gallerys', 'GalleryController', ['only' => ['index', 'show']]);




