<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

Route::get('/empleados', [EmpleadoController::class, 'index']);

Route::post('/empleados', [EmpleadoController::class, 'store']);

Route::put('/empleados/{id}', [EmpleadoController::class, 'update']);

Route::delete('/empleados/{id}', [EmpleadoController::class, 'destroy']);