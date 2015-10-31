<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* Just for scraping test auto login is given, it will only work in local not in development or staging server */
if( env('APP_ENV')=='local'  && ! empty( $_REQUEST['api'] ) && $_REQUEST['api']=='testing')
{
    Auth::loginUsingId(2);
}

Route::get('file', 'User\PropertyController@signUpForm');

Route::get('/', 'HomeController@index');
Route::get('home', ['as'=>'home', 'uses'=>'HomeController@index']);
Route::get('about-us', ['as'=>'about', 'uses'=>'PagesController@about']);
Route::get('contact-us', ['as'=>'contact', 'uses'=>'PagesController@contact']);

Route::get('login', ['as'=>'login', 'uses'=>'Auth\AuthController@getLogin']);
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', ['as'=>'logout', 'uses'=>'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('register', ['as'=>'register', 'uses'=>'Auth\AuthController@getRegister']);
Route::post('register', 'Auth\AuthController@postRegister');

/* Start of All Images Custom Url */
get('images/property/{filename}', function ($filename)
{
    return Image::make(storage_path(Config::get('image_path')['property_images']) . '/' . $filename)->response();
});

get('images/property/thumbnail/{filename}', function ($filename)
{
    return Image::make(storage_path(Config::get('image_path')['property_images']) . '/thumbnail/' . $filename)->response();
});

get('images/property/medium/{filename}', function ($filename)
{
    return Image::make(storage_path(Config::get('image_path')['property_images']) . '/medium/' . $filename)->response();
});

Route::group(['prefix' => "admin", 'middleware' => ['auth','admin'], 'namespace' => 'Admin'], function() {
    Route::get('/', 'DashboardController@index');
    Route::get('dashboard', ['as'=>'dashboard', 'uses'=> 'DashboardController@index']);
});

Route::group(['middleware' => 'auth', 'namespace' => 'User'], function() {
    Route::get('property-list', ['as'=>'property_list', 'uses'=>'PropertyController@getPropertyList']);
    Route::get('property-list-ajax', ['as'=>'property_list', 'uses'=>'PropertyController@getPropertyListAjax']);
});
