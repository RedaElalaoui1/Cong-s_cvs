<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Leave;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


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




// Route::get('/dash', function () {
//     return view('dash');
// });

// Route::get('/conge', function () {
//     return view('conge', ['emp' => Leave::find(1)->employee]);
// });

//Route::get('/employee', 'EmployeeC@index');


// Route::get('/cv', [TestController::class ,'index']);

// Route::get('/cherche_cv', [CvController::class ,'index']);

// Route::get('/create_leave', [LeaveController::class ,'create']);

// Route::post('/save_conge', [LeaveController::class ,'save']);

// Route::get('/update/{id}', [CvController::class ,'update']);

// Route::post('/update_cv/{id}', [CvController::class ,'update_cv']);

// Route::get('/delete_cv/{id}', [CvController::class, 'delete']);







// Route::post('/test', function () {
//     return view('test');
// });



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

});

////////// login

Route::get('/', function () {
    return view('auth/login');
});

///////// dashboard

Route::get('/dashboard', function () {
    return view('layouts.app', ['page'  => 0, 'data' => '']);
})->middleware(['auth'])->name('dashboard');

//////// les interfaces des tableaux







//////// les interfaces des formulaires

// Route::get('/ajout_emp', function () {
//     return view('layouts.app', ['page' => 4, 'data'=>'']);
// });



/////// Employee

Route::group(['prefix' => '/employee', 'controller'=> EmployeeController::class], function(){
    Route::get('/', 'index');
    Route::get('/search', 'search');
    Route::get('/add', 'add');
    Route::post('/save',  'save');
    Route::get('/edit/{id}',  'edit');
    Route::post('/update/{id}', 'update');
    Route::get('/delete/{id}', 'delete');
    Route::get('/information/{id}', 'information');
});

/////// Cv

Route::group(['prefix' => '/cvs', 'controller'=> CvController::class], function(){
    Route::get('/add', 'add');
    Route::get('/', 'index');
    Route::post('/save', 'save');
    Route::get('/edit/{id}', 'edit');
    Route::post('/update/{id}', 'update');
    Route::get('/delete/{id}', 'delete');
    Route::get('/search', 'search');
    Route::get('/image/{id}', 'image');
    Route::post('/filter', 'filterByNote');
});

////// Leave

Route::group(['prefix' => '/leaves', 'controller'=> LeaveController::class], function(){
    Route::get('/', 'index');
    Route::get('/add', 'add');
    Route::post('/save', 'save');
    Route::get('/edit/{id}', 'edit');
    Route::post('/update/{id}', 'update');
    Route::get('/delete/{leave}', 'delete');
    Route::get('/search', 'search');

});

////// User

Route::group(['prefix' => '/users', 'controller'=> UserController::class], function(){
    Route::get('/', 'index');
    Route::get('/delete/{id}', 'delete');
    Route::get('/search', 'search');
});

Route::get('/date', function(){
    $date = now();
    $daysConj = 5;
    $months = $daysConj/1.5;
    $days = $months - intval($daysConj/1.5);
    // $carbon = new Carbon('first day of January 2008', 'America/Vancouver');
    $days = $days*30;
    // dd(intval($months). '        ' . round($days*26));

    // dd($date->subYears(2)->addMonth($months)->addDay($days)->format("Y-m-d"));
    $ddtt = Carbon::createFromFormat('Y-m-d', '2023-02-10');
    // dd($ddtt->diffInMonths($date));
    // dd($carbon);ccc
    // $date_start= emp->start_work->addMonths(6)->format("Y-m-d");

    $emp = Employee::first();
    return $emp;




});
