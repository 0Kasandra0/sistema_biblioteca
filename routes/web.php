<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BibliotecaController;
use App\Http\Controllers\MiControlador;

Route::get('/', function () {
    return view('formulario');
});

Route::get('/resultado', function () {
    return view('resultado');
});

Route::post('/libros', [BibliotecaController::class, 'registrarLibro']);
Route::post('/usuarios', [BibliotecaController::class, 'registrarUsuario']);
Route::post('/prestamos', [BibliotecaController::class, 'realizarPrestamo']);
Route::post('/devolver', [BibliotecaController::class, 'devolverLibro']);
Route::get('/prestamos', [BibliotecaController::class, 'verPrestamos']);
Route::get('/formulario', [MiControlador::class, 'mostrarFormulario']);
Route::post('/formulario', [MiControlador::class, 'procesarFormulario']);
