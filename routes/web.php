<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\OrdenDetalleController;
use App\Http\Controllers\AuthController;

// Rutas públicas
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas por middleware de autenticación y roles
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('layouts.admin');
    })->name('admin.dashboard');

    Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios');
    Route::post('/admin/usuarios', [UsuarioController::class, 'store'])->name('admin.usuarios.store');
    Route::resource('usuarios', UsuarioController::class);

    Route::get('/admin/ordenes', [OrdenController::class, 'index'])->name('admin.ordenes');
    Route::resource('ordenes', OrdenController::class);

    Route::get('/admin/orden-detalles', [OrdenDetalleController::class, 'index'])->name('admin.ordenDetalles');
    Route::resource('orden-detalles', OrdenDetalleController::class);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:usuario'])->group(function () {
    Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario.index');
});

// Rutas API para recursos
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('ordenes', OrdenController::class);
Route::apiResource('orden-detalles', OrdenDetalleController::class);

// Ruta específica para cambiar el estado de una orden
Route::post('ordenes/{orden}/cambiar-estado', [OrdenController::class, 'cambiarEstado'])->name('ordenes.cambiarEstado');
