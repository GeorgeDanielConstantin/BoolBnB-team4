<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\MessagesController;

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

//route messages
//Route::get('apartment/{apartment_id}/messages', [MessagesController::class, 'getMessagesByApartment']);
//Route::post('messages', [MessagesController::class, 'store']);
