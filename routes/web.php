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
//    return view('index');
    return view('project_create');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('projects/create', 'ProjectController@create');

Route::post('projects/store', 'ProjectController@store');

Route::post('ajax_select2_options_list/{module_name}', 'ProjectController@ajaxGetOptions');

Route::post('ajax_project_create_option/{module_name}', 'ProjectController@ajaxCreateOption');

//Route::get('datatables', 'DatatablesController@getIndex');

//Route::get('datatables/data', 'DatatablesController@anyData');

Route::get('test', function () {
    $project_id = time() . str_random(3);
    return view('test', compact('project_id'));
});


Route::any('upload/{id?}', 'FileUploadController@upload');

Route::get('download/{id}', 'FileController@download');

Route::get('initial_file_list/{project_id}/{element_id}', 'FileController@initial_file_list');

//Route::get('sales_report', 'ReportsController@getSalesReport');
//Route::get('ajax_sales_report', 'ReportsController@ajaxSalesReport');

Route::get('report', 'ReportsController@getReport');
Route::get('ajax_report', 'ReportsController@ajaxReport');

Route::get('bal', function () {
//    dd(\App\OptionList::where('id', 1)->first()->list);
});

Route::get('ini', function () {
    return phpinfo();
});





