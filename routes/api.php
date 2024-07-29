<?php

use App\Http\Controllers\FilmeController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::post('/filmes', [FilmeController::class, 'store']);
    Route::post('/filmes/{id}/avaliacoes', [AvaliacaoController::class, 'store']);
    Route::post('/avaliacoes/{id}/like', [AvaliacaoController::class, 'like']); 
    Route::post('/avaliacoes/{id}/dislike', [AvaliacaoController::class, 'dislike']); 
    Route::get('/filmes', [FilmeController::class, 'index']);
    Route::get('/avaliacoes/{id}', [AvaliacaoController::class, 'getLikesDislikes']);
});

Route::get('/filmes/{id}', [FilmeController::class, 'show']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
