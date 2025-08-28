<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiControlador extends Controller
{
    public function mostrarFormulario()
    {
        return view('formulario'); // muestra la vista
    }

    public function procesarFormulario(Request $request)
    {
        $nombre = $request->input('nombre');
        $edad = $request->input('edad');

        return view('resultado', compact('nombre', 'edad'));
    }
}
