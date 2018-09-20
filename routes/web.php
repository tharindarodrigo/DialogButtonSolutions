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

Route::get('/counter', function () {
    return view('counters');
});

Route::get('/parking-info', function (){
    return response()->json([
        'HO' => rand(0,20),
        'Foster Lane' => rand(0,20),
        'Mega' => rand(0,20),
        'Parkland' => rand(0,20),
        'DBN' => rand(0,20),
        'Akbar' => rand(0,20),
    ]);
});

Route::group(['middleware'=> 'auth'], function(){
    Route::resource('companies', 'CompanyController');
    Route::resource('branches', 'BranchController');
    Route::resource('button-types', 'ButtonTypeController');
    Route::resource('buttons', 'ButtonController');
    Route::resource('roles', 'RoleController');


    Route::group(['prefix'=>'reports'], function(){
        Route::get('clicks', 'ButtonClickController@index');
        Route::delete('clicks/{id}', 'ButtonClickController@destroy')->name('clicks.delete');
    });

    Route::get('button-list', 'ButtonController@getList');

    Route::resource('users', 'UserController');
    Route::resource('users.permissions', 'UserPermissionController');
    Route::view('grid','grid.index');
    Route::get('/company/{id}/branches', function ($id) {
        return \App\Branch::where('company_id', $id)->get();
    });

});


Route::resource('counter-categories', 'CounterCategoryController');
Route::resource('counters', 'CounterController');
Route::resource('counter-buttons', 'CounterButtonController');

Route::get('notifications', function () {
    return $buttons = \App\Button::with(['buttonType', 'company', 'branch'])->get();
});

Route::any('button-click/{serial}', 'ButtonClickController@store');

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

Route::get('user', function (){
    return \App\User::with('roles')->get();
});

Route::get('query', function(){
    return \App\ButtonClick::with(['buttonType', 'company'])
        ->where('button_type_id', '=', '3')
        ->where('company_id', 3)
        ->get();
});

Route::get('query2', function(){
    return \App\ButtonClick::where('company_id', 3)
        ->where('button_type_id', 3)
        ->update(['button_type_id'=> 4]);

//    $x->delete();
});

Route::get('report', function(){
    return $buttonClicks = \Illuminate\Support\Facades\DB::table('button_clicks')
        ->select(DB::raw('count(*) as clicks'))
        ->groupBy('company_id', 'button_type_id')
        ->get()
        ;
});