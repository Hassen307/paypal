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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() {

Route::post('/mobilenumber', ['as'=>'mobilenumber','uses'=>'MobileController@mobilenumber']);

Route::get('/validnumber', ['as'=>'validnumber','uses'=>'MobileController@validnumber']);
Route::get('/viewmobile', ['as'=>'viewmobile','uses'=>'MobileController@show']);
Route::get('/page', ['as'=>'page','uses'=>'MobileController@index']);
Route::get('/page3', ['as'=>'page3','uses'=>'MobileController@index3']);
Route::get('/page2', ['as'=>'page','uses'=>'MobileController@index2']);
Route::post('/image', ['as'=>'image','uses'=>'MobileController@image']);
Route::post('/profile', ['as'=>'profile','uses'=>'MobileController@profile']);



Route::get('/checkout', ['as'=>'checkout','uses'=>'PaypalController@checkout'] );

Route::get('done', function () {
    return "Done";
});

Route::get('cancel', function () {
    return "Cancel";
});


Route::post('/paypalregister', ['as'=>'paypalregister','uses'=>'HomeController@store']);
Route::get('/users', ['as'=>'users','uses'=>'HomeController@index2']);

Route::get('/logout', 'Auth\LoginController@logout');
});