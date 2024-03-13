<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;

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
/*
Route::post('/chirps/{chirp}/like', [ChirpController::class, 'like'])->name('chirps.like');
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    
Route::middleware('auth')->post('/chirps/{chirp}/like', [ChirpController::class, 'like'])->name('chirps.like');
Route::middleware('auth:sanctum')->post('/chirps/{chirp}/dislike', [ChirpController::class, 'dislike'])->name('chirps.dislike');
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
