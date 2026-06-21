<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\ConfiguracionController;

/*
|--------------------------------------------------------------------------
| Pública
|--------------------------------------------------------------------------
*/

Route::get('/', [InicioController::class, 'index']);

Route::get('/login', [LoginController::class, 'showLogin']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [LoginController::class, 'showRegister']);
Route::post('/register', [LoginController::class, 'register']);

/*
|--------------------------------------------------------------------------
| Privada
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/panel', [PanelController::class, 'index']);

    Route::resource('productos', ProductosController::class);

    Route::resource('ventas', VentasController::class);

    Route::get('/reportes', [ReportesController::class, 'index']);

    Route::get('/configuracion', [ConfiguracionController::class, 'index']);

    Route::post('/logout', [LoginController::class, 'logout']);
});