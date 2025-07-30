<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\BookingController;
use App\Http\Controllers\api\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/services', [ServiceController::class, 'index']);
    Route::post('/services', [ServiceController::class, 'store']);
    Route::put('/services/{id}', [ServiceController::class, 'update']);
    Route::delete('/services/{id}', [ServiceController::class, 'destroy']);


    Route::post('/booking', [BookingController::class, 'store']);
    Route::get('/booking', [BookingController::class, 'show']);
    Route::get('/admin/bookings', [BookingController::class, 'showAllBooking']);


});
