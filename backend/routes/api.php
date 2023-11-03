<?php

use App\Http\Controllers\BitacorasController;
use App\Http\Controllers\EnlacesController;
use App\Http\Controllers\PaginasController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('roles', RolesController::class);
Route::apiResource('personas', PersonasController::class);
Route::apiResource('paginas', PaginasController::class);
Route::apiResource('enlaces', EnlacesController::class);
Route::apiResource('usuarios', UsuariosController::class);
Route::apiResource('bitacoras', BitacorasController::class);