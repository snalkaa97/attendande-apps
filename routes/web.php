<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AttendanceController;
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

Route::get('/', function(){
    return view('welcome');
})->name('/');
Route::resource('absence',AbsenceController::class);


Auth::routes();
Route::group(['middleware' =>'auth'],function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::get('attendance/datainstansi',[AttendanceController::class,'dataInstansi'])->name('datainstansi');
    Route::resource('attendance',AttendanceController::class);
});

