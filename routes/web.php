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

use App\Branch;
use App\Schedule;
use App\Session;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/car-park', function () {
    return view('counters');
});

Route::get('/parking-info', function () {

    $counters = \App\Counter::whereHas('counterCategory', function ($q) {
        $q->where('counter_category', 'Car Park')
            ->where('company_id', 1);
    })->get();
    $ar = [];
    foreach ($counters as $counter) {
        $ar[$counter->title] = $counter->max - $counter->count;
    }
//    return
    return response()->json($ar);

});

Route::get('test', function () {
//    echo $date = \Carbon\Carbon::now();
//    echo '<br>';
//    echo $today = \Carbon\Carbon::today();
//    echo '<br>';
//    echo $x = \Carbon\Carbon::createFromTimeString('12:00');
//    echo $x->timestamp
//    echo $today->addMinutes(200);

    $now = Carbon::now();

    $time = "0{$now->hour}:{$now->minute}";
    $x = \Carbon\Carbon::createFromTimeString($time);
    $sessions = Session::with('schedules')
        ->where('start', '<', $x)
        ->where('end', '>', $x)
        ->get();


    foreach ($sessions as $session) {
        foreach ($session->schedules as $schedule) {

            $earliestTime = $schedule->period - $schedule->tolerance;
            $latestTime = $schedule->period + $schedule->tolerance; //createDateTime
            $buttonClicks = $schedule->branch->buttonClicks()
                ->where('created_at', '>', '')
                ->where('created_at', '<', '')
                ->get()
            ;

        };
    };

});

Route::get('oil-lamp', function () {
    return view('oil-lamp');
});


Route::get('lamp-info', function () {
    $lampCounter = \App\Counter::whereHas('counterCategory', function ($q) {
        $q->where('counter_category', 'Oil Lamp')
            ->where('company_id', 1);
    })->first();

    return $lampCounter;
});

Route::any('count/{serial}', 'CounterButtonController@count');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('companies', 'CompanyController');
    Route::resource('branches', 'BranchController');
    Route::resource('button-types', 'ButtonTypeController');
    Route::resource('buttons', 'ButtonController');
    Route::resource('rolews', 'RoleController');

    Route::group(['prefix' => 'reports'], function () {
        Route::get('clicks', 'ButtonClickController@index');
        Route::delete('clicks/{id}', 'ButtonClickController@destroy')->name('clicks.delete');
    });

    Route::get('button-list', 'ButtonController@getList');

    Route::resource('users', 'UserController');
    Route::resource('users.permissions', 'UserPermissionController');
    Route::view('grid', 'grid.index');
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

Route::get('but', function () {
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

Route::get('user', function () {
    return \App\User::with('roles')->get();
});

Route::get('query', function () {
    return \App\ButtonClick::with(['buttonType', 'company'])
        ->where('button_type_id', '=', '3')
        ->where('company_id', 3)
        ->get();
});

Route::get('query2', function () {
    return \App\ButtonClick::where('company_id', 3)
        ->where('button_type_id', 3)
        ->update(['button_type_id' => 4]);

//    $x->delete();
});


Route::get('excel', 'ButtonClickController@export')->middleware('auth');

Route::get('json', function (Illuminate\Http\Request $request) {


    $x = \Illuminate\Support\Facades\DB::table('button_clicks')
        ->join('buttons', 'button_clicks.button_type_id', '=', 'buttons.id')
        ->join('button_types', 'button_clicks.button_type_id', '=', 'button_types.id')
        ->join('companies', 'button_clicks.company_id', '=', 'companies.id')
        ->join('branches', 'button_clicks.branch_id', '=', 'branches.id')
        ->select('button_clicks.id', 'button_clicks.created_at', 'button_types.button_type', 'companies.name as company', 'branches.branch');
    if ($request->get('from')) {
        $x->where('button_clicks.created_at', '>=', $request->get('from'));
    }

    if ($request->get('to')) {
        $x->where('button_clicks.created_at', '<', $request->get('to'));
    }
    return $x->get();
})->middleware('auth');