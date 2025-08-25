<?php

class Libro {
    public $titulo;
    public $autor;
    public $disponible = true;
}

class Usuario {
    public $nombre;
}

class Prestamo {
    public $usuario;
    public $libro;
}

$listaLibros = [];
$listaUsuarios = [];
$listaPrestamos = [];

function menuPrincipal() {
    global $listaLibros, $listaUsuarios, $listaPrestamos;

    do {
        echo "\n--- MENU PRINCIPAL ---\n";
        echo "1. Registrar libro\n";
        echo "2. Registrar usuario\n";
        echo "3. Realizar prestamo\n";
        echo "4. Devolver libro\n";
        echo "5. Ver prestamos\n";
        echo "6. Salir\n";
        echo "Seleccione una opción: ";
        $opcion = trim(fgets(STDIN));

        switch ($opcion) {
            case 1:
                registrarLibro();
                break;
            case 2:
                registrarUsuario();
                break;
            case 3:
                realizarPrestamo();
                break;
            case 4:
                devolverLibro();
                break;
            case 5:
                verPrestamos();
                break;
            case 6:
                echo "Saliendo del sistema...\n";
                break;
            default:
                echo "Opción inválida. Intente de nuevo.\n";
                break;
        }
    } while ($opcion != 6);
}

function registrarLibro() {
    global $listaLibros;

    echo "Ingrese el título del libro: ";
    $titulo = trim(fgets(STDIN));
    echo "Ingrese el autor del libro: ";
    $autor = trim(fgets(STDIN));

    $libro = new Libro();
    $libro->titulo = $titulo;
    $libro->autor = $autor;

    $listaLibros[] = $libro;
    echo "Libro registrado con éxito.\n";
}

function registrarUsuario() {
    global $listaUsuarios;

    echo "Ingrese el nombre del usuario: ";
    $nombre = trim(fgets(STDIN));

    $usuario = new Usuario();
    $usuario->nombre = $nombre;

    $listaUsuarios[] = $usuario;
    echo "Usuario registrado con éxito.\n";
}

function realizarPrestamo() {
    global $listaLibros, $listaUsuarios, $listaPrestamos;

    echo "Ingrese el nombre del usuario: ";
    $nombreUsuario = trim(fgets(STDIN));
    $usuario = null;
    foreach ($listaUsuarios as $u) {
        if ($u->nombre === $nombreUsuario) {
            $usuario = $u;
            break;
        }
    }

    if (!$usuario) {
        echo "Usuario no encontrado.\n";
        return;
    }

    echo "Ingrese el título del libro: ";
    $tituloLibro = trim(fgets(STDIN));
    $libro = null;
    foreach ($listaLibros as $l) {
        if ($l->titulo === $tituloLibro) {
            $libro = $l;
            break;
        }
    }

    if (!$libro) {
        echo "Libro no encontrado.\n";
        return;
    }

    if (!$libro->disponible) {
        echo "El libro ya está prestado.\n";
        return;
    }

    $prestamo = new Prestamo();
    $prestamo->usuario = $usuario;
    $prestamo->libro = $libro;

    $listaPrestamos[] = $prestamo;
    $libro->disponible = false;

    echo "Préstamo realizado con éxito.\n";
}

function devolverLibro() {
    global $listaPrestamos;

    echo "Ingrese el título del libro a devolver: ";
    $tituloLibro = trim(fgets(STDIN));

    foreach ($listaPrestamos as $index => $prestamo) {
        if ($prestamo->libro->titulo === $tituloLibro) {
            $prestamo->libro->disponible = true;
            unset($listaPrestamos[$index]);
            echo "Libro devuelto con éxito.\n";
            return;
        }
    }

    echo "No se encontró un préstamo con ese libro.\n";
}

function verPrestamos() {
    global $listaPrestamos;

    echo "\n--- LISTA DE PRÉSTAMOS ---\n";
    if (count($listaPrestamos) === 0) {
        echo "No hay préstamos registrados.\n";
    } else {
        foreach ($listaPrestamos as $p) {
            echo "Usuario: {$p->usuario->nombre}, Libro: {$p->libro->titulo}\n";
        }
    }
}

// Ejecutar el menú
menuPrincipal();

?>
