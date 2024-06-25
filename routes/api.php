<?php

use App\Http\Controllers\ClassController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;

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

// LOGIN 
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);


Route::apiResource('users', UserController::class);
Route::apiResource('classes', ClassController::class);
Route::apiResource('attendances', AttendanceController::class);


// ENPOINTS USER
Route::get('getAll', [UserController::class, 'getAll']);
Route::get('getUserCount/{rol?}', [UserController::class, 'getUserCount']);
Route::get('getAllByRol/{rol}', [UserController::class, 'getAllByRol']);
Route::get('getUserById/{id}', [UserController::class, 'getUserById']);
Route::put('updateUser/{id}', [UserController::class, 'updateUser']);
Route::delete('deleteUser/{id}', [UserController::class, 'deleteUser']);
Route::post('createUser', [UserController::class, 'createUser']);

// ENPOINTS CLASS
Route::get('getAllSubjects', [SubjectController::class, 'getAllSubjects']);
Route::delete('deleteSubject/{id}', [SubjectController::class, 'deleteSubject']);
Route::put('updateSubject/{id}', [SubjectController::class, 'updateSubject']);
Route::get('getSubjectById/{id}', [SubjectController::class, 'getSubjectById']);
Route::put('updateSubject/{id}', [SubjectController::class, 'updateSubject']);