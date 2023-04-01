<?php

use App\Http\Controllers\JogadorController;
use App\Http\Controllers\JogoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('jogadores',[JogadorController::class,'index']);
Route::get('jogador/{id}',[JogadorController::class,'show']);

Route::get('jogador', [JogadorController::class,'create']);
Route::post('jogador', [JogadorController::class,'store']);

Route::get('jogador/{id}/edit', [JogadorController::class, 'edit'])->name('jogador.edit');
Route::post('jogador/{id}/update', [JogadorController::class, 'update'])->name('jogador.update');

Route::get('jogador/{id}/delete', [JogadorController::class, 'delete'])->name('jogador.delete');
Route::post('jogador/{id}/remove', [JogadorController::class, 'remove'])->name('jogador.remove');

Route::get('jogos',[JogoController::class,'index']);
Route::get('jogo/{id}',[JogoController::class,'show']);

Route::get('jogo', [JogoController::class,'create']);
Route::post('jogo', [JogoController::class,'store']);