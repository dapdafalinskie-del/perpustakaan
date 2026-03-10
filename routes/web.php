<?php

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

