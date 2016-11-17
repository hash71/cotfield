<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('test', function () {
    return view('index');
});

Route::get('bal', function () {
    return URL::to('/');

});

Route::post('ajax', function () {
//    return url('/');
    return [
        ['id'=>1,'option'=>'a'],
        ['id'=>2,'option'=>'a'],
        ['id'=>3,'option'=>'a'],
        ['id'=>4,'option'=>'a'],
    ];
});