<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Libro;
use App\Models\Usuario;
use App\Models\Prestamo;

class BibliotecaController extends Controller
{
    // Registrar libro
    public function registrarLibro(Request $request) {
        $libro = Libro::create([
            'titulo' => $request->input('titulo'),
            'autor'  => $request->input('autor'),
        ]);
        return response()->json(["message" => "Libro registrado con éxito", "data" => $libro]);
    }

 // Registrar usuario
    public function registrarUsuario(Request $request) {
        $usuario = Usuario::create([
            'nombre' => $request->input('nombre'),
        ]);
        return response()->json(["message" => "Usuario registrado con éxito", "data" => $usuario]);
    }

    // Realizar préstamo
    public function realizarPrestamo(Request $request) {
        $usuario = Usuario::where('nombre', $request->input('usuario'))->first();
        $libro = Libro::where('titulo', $request->input('libro'))->first();

        if (!$usuario) return response()->json(["error" => "Usuario no encontrado"], 404);
        if (!$libro) return response()->json(["error" => "Libro no encontrado"], 404);
        if (!$libro->disponible) return response()->json(["error" => "El libro ya está prestado"], 400);

        $prestamo = Prestamo::create([
            'usuario_id' => $usuario->id,
            'libro_id'   => $libro->id,
        ]);

                $libro->update(['disponible' => false]);

        return response()->json(["message" => "Préstamo realizado con éxito", "data" => $prestamo]);
    }

    // Devolver libro
    public function devolverLibro(Request $request) {
        $libro = Libro::where('titulo', $request->input('libro'))->first();
        if (!$libro) return response()->json(["error" => "Libro no encontrado"], 404);

        $prestamo = Prestamo::where('libro_id', $libro->id)->first();
        if (!$prestamo) return response()->json(["error" => "No se encontró un préstamo con ese libro"], 404);

        $libro->update(['disponible' => true]);
        $prestamo->delete();

        return response()->json(["message" => "Libro devuelto con éxito"]);
    }

     // Ver préstamos
    public function verPrestamos() {
        $prestamos = Prestamo::with(['usuario','libro'])->get();
        return response()->json($prestamos);
    }
}