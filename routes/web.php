<?php

use App\Http\Controllers\EmployeeContoller;
use App\Http\Controllers\HomeConroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TimetableController;
use Illuminate\Support\Facades\Auth;

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





// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/timetable', [TimetableController::class, 'show'])->name('timetable');




// Page 3: Manage Timetable
Route::get('/manage-timetable', [TimetableController::class, 'show'])->name('manage-timetable');
Route::post('/manage-timetable', [TimetableController::class, 'store'])->name('manage-timetable.store');

