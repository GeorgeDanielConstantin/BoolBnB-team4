<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApartmentController;


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

//route apartments
Route::apiResource('apartments', ApartmentController::class)->except('store', 'update', 'destroy');
Route::get('apartments/search/{city}', [ApartmentController::class, 'search']);
Route::get('apartments/{id}', [ApartmentController::class, 'show']);
Route::post('apartments/{id}/messages', [ApartmentController::class, 'storeMessage']);


Route::post('messages', [MessageController::class, 'store']);
