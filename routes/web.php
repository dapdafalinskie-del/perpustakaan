<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

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

        Route::controller(BukuController::class)->prefix('buku')->group(function(){
            Route::get('/', 'index')
                ->name('buku.index');
            Route::get('/create', 'create')
                ->name('buku.create');
            Route::post('/store', 'store')
                ->name('buku.store');
            Route::get('/{id}/edit', 'edit')
                ->name('buku.edit');
            Route::patch('/{id}/update', 'update')
                ->name('buku.update');
            Route::delete('/{id}/destroy', 'destroy')
                ->name('buku.destroy');
        });

        Route::controller(TransaksiController::class)->prefix('transaksi')->group(function(){
            Route::get('/', 'index')
                ->name('transaksi.index');
            Route::get('/create', 'create')
                ->name('transaksi.create');
            Route::post('/store', 'store')
                ->name('transaksi.store');
            Route::get('/{id}/return', 'return')
                ->name('transaksi.return');
        });

        Route::controller(LaporanController::class)->prefix('laporan')->group(function(){
            Route::get('/anggota', 'anggota')
                ->name('laporan.anggota');
            Route::get('/buku', 'buku')
                ->name('laporan.buku');
            Route::get('/transaksi', 'transaksi')
                ->name('laporan.transaksi');
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

