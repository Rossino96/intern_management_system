<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StagiaireController;

use App\Http\Controllers\ServiceController;

use App\Http\Controllers\StageController;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\UserController;


Route::middleware('auth')->group(function () {

    // Dashboard : Admin + RH + Encadrant
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('role:admin,rh,encadrant')
        ->name('dashboard');


        
        // STAGIAIRES : gestion
        // Admin + RH uniquement
        
        Route::middleware('role:admin,rh')->group(function () {
            
            
            Route::get('/stagiaires/create', [StagiaireController::class, 'create'])
            ->name('stagiaires.create');
            
            Route::post('/stagiaires', [StagiaireController::class, 'store'])
            ->name('stagiaires.store');
            
            Route::get('/stagiaires/{stagiaire}/edit', [StagiaireController::class, 'edit'])
            ->name('stagiaires.edit');
            
            Route::put('/stagiaires/{stagiaire}', [StagiaireController::class, 'update'])
            ->name('stagiaires.update');
            
            Route::delete('/stagiaires/{stagiaire}', [StagiaireController::class, 'destroy'])
            ->name('stagiaires.destroy');
            });
            
            // STAGIAIRES : consultation
            // Admin + RH + Encadrant
            
        
            Route::middleware('role:admin,rh,encadrant')->group(function () {
                Route::get('/stagiaires/{stagiaire}', [StagiaireController::class, 'show'])
                    ->name('stagiaires.show');
        
                Route::get('/stagiaires', [StagiaireController::class, 'index'])
                    ->name('stagiaires.index');
        
            });

    // SERVICES : Admin + RH

    Route::middleware('role:admin,rh')->group(function () {

        Route::get('/services', [ServiceController::class, 'index'])
            ->name('services.index');

        Route::get('/services/create', [ServiceController::class, 'create'])
            ->name('services.create');

        Route::post('/services', [ServiceController::class, 'store'])
            ->name('services.store');

        Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])
            ->name('services.edit');

        Route::put('/services/{service}', [ServiceController::class, 'update'])
            ->name('services.update');

        Route::delete('/services/{service}', [ServiceController::class, 'destroy'])
            ->name('services.destroy');
    });

    // STAGES : Admin + RH + Encadrant

    Route::middleware('role:admin,rh,encadrant')->group(function () {

        Route::get('/stages', [StageController::class, 'index'])
            ->name('stages.index');

        Route::get('/stages/create', [StageController::class, 'create'])
            ->name('stages.create');

        Route::post('/stages', [StageController::class, 'store'])
            ->name('stages.store');

        Route::get('/stages/{stage}/edit', [StageController::class, 'edit'])
            ->name('stages.edit');

        Route::put('/stages/{stage}', [StageController::class, 'update'])
            ->name('stages.update');

        Route::delete('/stages/{stage}', [StageController::class, 'destroy'])
            ->name('stages.destroy');
    });

    // UTILISATEURS : Admin uniquement

    Route::middleware('role:admin')->group(function () {

        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');

        Route::get('/users/create', [UserController::class, 'create'])
            ->name('users.create');

        Route::post('/users', [UserController::class, 'store'])
            ->name('users.store');

        Route::get('/users/{user}/edit', [UserController::class, 'edit'])
            ->name('users.edit');

        Route::put('/users/{user}', [UserController::class, 'update'])
            ->name('users.update');

        Route::delete('/users/{user}', [UserController::class, 'destroy'])
            ->name('users.destroy');
    });
});



Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return view('welcome');
});
