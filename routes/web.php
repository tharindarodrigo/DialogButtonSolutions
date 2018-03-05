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


Route::group(['middleware'=> 'auth'], function(){
    Route::resource('companies', 'CompanyController');
    Route::resource('branches', 'BranchController');
    Route::resource('button-types', 'ButtonTypeController');
    Route::resource('buttons', 'ButtonController');


    Route::group(['prefix'=>'reports'], function(){
        Route::get('clicks', 'ButtonClickController@index');
    });
});


Route::any('button-click/{serial}', 'ButtonClickController@store');

Route::get('notifications', function () {
    return $buttons = \App\Button::with(['buttonType', 'company', 'branch'])->get();
});


Route::get('/company/{id}/branches', function ($id) {
    return \App\Branch::where('company_id', $id)->get();
});

Route::get('but', function (){
   return \App\ButtonClick::all();
});

Route::get('fire-button-trigger', function () {

    $data = \App\Button::with(['buttonType', 'company', 'branch'])->first();
    event(new \App\Events\ButtonTriggerEvent($data));
});


//Route::resource('button-types', 'ButtonTypeController');


Route::get('/companies/buttons', function () {
    return view('companies.buttons.index');
});

Route::get('/dashboard', function () {
    return view('buttons.dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
