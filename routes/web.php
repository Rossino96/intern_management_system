<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StagiaireController;

use App\Http\Controllers\ServiceController;

use App\Http\Controllers\StageController;


Route::get('/stagiaires', [StagiaireController::class, 'index']);

Route::get('/stagiaires/create', [StagiaireController::class, 'create']);

Route::post('/stagiaires', [StagiaireController::class, 'store']);

Route::get('/stagiaires/{stagiaire}/edit', [StagiaireController::class, 'edit']);

Route::put('/stagiaires/{stagiaire}', [StagiaireController::class, 'update']);

Route::delete('/stagiaires/{stagiaire}', [StagiaireController::class, 'destroy']);



Route::get('/services', [ServiceController::class, 'index']);

Route::get('/services/create', [ServiceController::class, 'create']);

Route::post('/services', [ServiceController::class, 'store']);

Route::get('/services/{service}/edit', [ServiceController::class, 'edit']);

Route::put('/services/{service}', [ServiceController::class, 'update']);

Route::delete('/services/{service}', [ServiceController::class, 'destroy']);



Route::get('/stages', [StageController::class, 'index']);

Route::get('/stages/create', [StageController::class, 'create']);

Route::post('/stages', [StageController::class, 'store']);

Route::get('/stages/{stage}/edit', [StageController::class, 'edit']);

Route::put('/stages/{service}', [StageController::class, 'update']);

Route::delete('/stages/{service}', [StageController::class, 'destroy']);


Route::get('/', function () {
    return view('welcome');
});
