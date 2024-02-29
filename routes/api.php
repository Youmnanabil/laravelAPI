<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EmailVerficationController;



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

Route::get('test1', function(){
    return "First API test";
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::middleware('auth:sanctum')->group(function(){
    Route::post('verify', [EmailVerficationController::class, 'verify']);
});

Route::middleware('auth:api')->group(function(){
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('adduser', [UserController::class, 'create'])->name('adduser');
    Route::post('storesuser', [UserController::class, 'store'])->name('storesuser');
    Route::get('edituser/{id}', [UserController::class, 'edit'])->name('edituser');
    Route::put('updateuser/{id}', [UserController::class, 'update'])->name('updateuser');
});
