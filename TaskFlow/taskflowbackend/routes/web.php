<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserSpecificController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('events', EventController::class);
Route::resource('users', UserSpecificController::class);
Route::resource('courses', CourseController::class);
Route::resource('login', LoginController::class);
Route::post('/session-start', [LoginController::class, 'Login'])->name('session-start');
Route::view('/home', 'home')->name('home');




