<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

    Route::middleware(['role:admin'])->group(function () {
    
        Route::get('/admin/config', [AdminController::class, 'index'])->name('admin.config');

    });

    Route::middleware(['role:admin|user'])->group(function () {
        // Route::get('/solo-para-usuarios', ...);
    });

});


