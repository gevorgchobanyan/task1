<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//READ
Route::get('/users', [UserController::class, 'showAll']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/users/{id}/addresses', [UserController::class, 'showAddresses']);
//CREATE, UPDATE DELETE
Route::post('/addresses', [UserController::class, 'saveAddress']);
Route::put('/addresses/{id}', [UserController::class, 'updateAddress']);
Route::put('/users/{id}', [UserController::class, 'updateUser']);
Route::delete('/addresses/{id}', [UserController::class, 'deleteAddress']);

