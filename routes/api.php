<?php

use App\Http\Controllers\PersonaController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(UserController::class)->group(function(){
    Route::post('usuarios/registrar', 'registrar');//registrarse
    Route::post('usuarios/tokenizar', 'tokenizar');//tokenizar
    Route::delete('usuarios/revocar/{id_token}', 'revocar');//revocar
});

Route::controller(PersonaController::class)->group(function(){
    Route::middleware('auth:sanctum')->get('personas', 'index');
    // Route::get('personas', 'index');
});