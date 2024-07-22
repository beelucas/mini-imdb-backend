<?php

use App\Http\Controllers\FilmeController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->group(function () {
    Route::post('/filmes', [FilmeController::class, 'store']);
    Route::post('/filmes/{id}/avaliacoes', [AvaliacaoController::class, 'store']);
    Route::get('/filmes', [FilmeController::class, 'index']);
});



Route::get('/filmes/{id}', [FilmeController::class, 'show']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);