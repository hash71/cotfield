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

//Auth::routes();

use Maatwebsite\Excel\Facades\Excel;

Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::get('myphpinfo', 'HomeController@phpfileinfo');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'ReportsController@getReport');
    Route::get('dashboard', 'ReportsController@getReport');
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('register', 'RegisterController@getRegister');
    Route::post('register', 'RegisterController@postRegister');
    Route::get('/home', 'HomeController@index');
    Route::get('projects/create', 'ProjectController@create');
    Route::post('projects/store', 'ProjectController@store');
    Route::get('projects/{project_id}/edit', 'ProjectController@edit');
    Route::put('projects/{project_id}', 'ProjectController@update');
    Route::delete('projects/{project_id}', 'ProjectController@destroy');
    Route::post('ajax_select2_options_list/{module_name}', 'ProjectController@ajaxGetOptions');
    Route::post('ajax_project_create_option/{module_name}', 'ProjectController@ajaxCreateOption');
    Route::any('upload/{id?}', 'FileUploadController@upload');
    Route::get('download/{id}', 'FileController@download');
    Route::get('initial_file_list/{project_id}/{element_id}', 'FileController@initial_file_list');
    Route::get('report', 'ReportsController@getReport');
    Route::get('ajax_report', 'ReportsController@ajaxReport');
    Route::get('user_list', 'UserController@user_list');
    Route::post('ajax_user_list', 'UserController@ajax_user_list');
    Route::get('edit_user/{id}', 'UserController@edit');
    Route::put('update_user/{id}', 'UserController@update');
    Route::get('monthly_excel_upload', 'MonthlyExcelController@index');
    Route::post('monthly_excel_store', 'MonthlyExcelController@store');
    Route::get('monthly_excel_delete', 'MonthlyExcelController@delete');
    Route::delete('monthly_excel_delete', 'MonthlyExcelController@destroy');
    Route::get('excel_report', 'ExcelReportController@index');
    Route::get('ajax_excel_report', 'ExcelReportController@ajaxExcelReport');
});

//Route::get('test', function () {
//    return view('test');
//});
//Route::post('s3', function (\Illuminate\Http\Request $request) {
//
//    $filename = Storage::disk('s3')->putFileAs('cots', $request->file('my_file'), $request->file('my_file')->getClientOriginalName());
//    $content = Storage::get($filename);
//    $size = Storage::size($filename);
//    $mime = Storage::mimeType($filename);
//    return response($content, 200, [
//        'Content-Type' => $mime,
//        'Content-Description' => 'File Transfer',
//        'Content-Disposition' => "inline; filename={$filename}",
//        'Content-Transfer-Encoding' => 'binary',
//    ]);
//});