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

/**
 * Import first CSV routes ("Control data file")
 */
Route::get('/control', 'ImportController@getControl')->name('control');
Route::post('/control_parse', 'ImportController@parseControl')->name('control_parse');
Route::post('/control_process', 'ImportController@processControl')->name('control_process');


/**
 * Import second CSV routes ("Compare data file")
 */
Route::get('/import', 'ImportController@getImport')->name('import');
Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');
Route::post('/import_process', 'ImportController@processImport')->name('import_process');
