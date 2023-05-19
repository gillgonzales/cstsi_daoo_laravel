<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LobbyController;
use App\Http\Controllers\Api\jogoController;

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

Route::get('lobby', [LobbyController::class, 'index']);
Route::get('lobby/{id}', [LobbyController::class, 'show']);

Route::post('lobby', [LobbyController::class, 'store']);
Route::put('lobby/{id}',[LobbyController::class, 'update']);
Route::delete('lobby/{id}',[LobbyController::class, 'remove']);

Route::apiResource('jogos',JogoController::class);