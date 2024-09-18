<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/developer', [\App\Http\Controllers\DeveloperController::class, 'store']);
Route::post('/developer/{developer}', [\App\Http\Controllers\DeveloperController::class, 'update']);

Route::post('/genre', [\App\Http\Controllers\GenreController::class, 'store']);
Route::post('/genre/{genre}', [\App\Http\Controllers\GenreController::class, 'update']);

Route::post('/game/filter', [\App\Http\Controllers\GameController::class, 'filter']);
Route::post('/game', [\App\Http\Controllers\GameController::class, 'store']);
Route::post('/game/{game}', [\App\Http\Controllers\GameController::class, 'update']);
