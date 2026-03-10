<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', function(){
        return redirect()->route('dashboard');
    });

    Route::get('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::prefix('masterdata')->group(function(){
        Route::controller(AnggotaController::class)->prefix('anggota')->group(function(){
            Route::get('/', 'index')
                ->name('anggota.index');
            Route::get('/create', 'create')
                ->name('anggota.create');
            Route::post('/store', 'store')
                ->name('anggota.store');
            Route::get('/{id}/edit', 'edit')
                ->name('anggota.edit');
            Route::patch('/{id}/update', 'update')
                ->name('anggota.update');
            Route::delete('/{id}/destroy', 'destroy')
                ->name('anggota.destroy');
        });
    });

    
});

Route::middleware('guest')->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/login', 'index')
            ->name('login.page');
        Route::post('/login', 'login')
            ->name('login.attempt');
    });
    Route::get('/', function(){
        return redirect()->route('login.page');
    });
});

