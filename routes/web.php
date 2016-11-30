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
//    return view('welcome');
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('projects/create', function () {
    return view('index');
});

Route::get('bal', function () {
    return URL::to('/');

});

Route::post('ajax_select2_options_list/{module_name}', function ($module_name) {
    return \App\OptionList::where('option', $module_name)->orderBy('id','DESC')->pluck('list','id');
});

Route::post('ajax_project_create_option/{module_name}', 'ProjectController@ajaxCreateOption');


Route::get('datatables', 'DatatablesController@getIndex');
Route::get('datatables/data', 'DatatablesController@anyData');

Route::get('bal', function () {
    return \App\OptionList::where('option', 'project_status')->pluck('list','id');
});


