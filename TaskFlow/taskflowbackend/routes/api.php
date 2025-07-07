<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserSpecificController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/userCourse/all', [UserCourseController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'listEvents']);
Route::get('/event/{id}', [EventController::class, 'specificEvent']);
Route::get('/usersAdmin/all', [UserController::class, 'index']);
Route::get('/tags/all', [TagController::class, 'index']);
Route::get('/categories/all', [CategoryController::class, 'category']);

Route::get('/userSpecific/all', [UserSpecificController::class, 'dataUsers']);
//http://taskflowbackend.test/api/userSpecific/all
//http://localhost/taskflowbackend/public/api/userSpecific/all

//Ruta para los post enviados por el frontend
Route::post('/singInData', [UserSpecificController::class, 'SingIn']);
Route::post('/LoginData', [UserSpecificController::class, 'Login']);

// ruta para los cursos
Route::get('/courses/{id}', [CourseController::class, 'listCourses']);
Route::get('/course/{id}', [CourseController::class, 'specificCourse']);
//Route::get('/listUserCourse/{id}', [UserCourseController::class, 'show']);
