<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StagiaireController;

Route::get('/stagiaires', [StagiaireController::class, 'index']);

Route::post('/stagiaires', [StagiaireController::class, 'store']);

Route::get('/stagiaires/create', [StagiaireController::class, 'create']);

Route::get('/stagiaires/{stagiaire}/edit', [StagiaireController::class, 'edit']);

Route::put('/stagiaires/{stagiaire}', [StagiaireController::class, 'update']);


Route::get('/', function () {
    return view('welcome');
});
