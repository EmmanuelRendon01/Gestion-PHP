<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuditController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    // Rutas de Productos - accesibles para usuarios autenticados
    Route::resource('products', ProductController::class);

    // Rutas solo para administradores
    Route::middleware(['role:admin'])->group(function () {
        
        Route::resource('users', UserController::class);
        
        // Auditoría
        Route::get('/audits', [AuditController::class, 'index'])->name('audits.index');
        Route::get('/audits/{audit}', [AuditController::class, 'show'])->name('audits.show');
    });

});


