<!-- resources/views/biblioteca.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Biblioteca</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container py-5">

    <h1 class="mb-4">📚 Sistema Biblioteca</h1>

    <!-- Mensajes Bonitos -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <!-- Registrar Libro -->
    <div class="card mb-3">
        <div class="card-header">Registrar Libro</div>
        <div class="card-body">
            <form action="{{ url('/libros') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="autor" class="form-label">Autor</label>
                    <input type="text" name="autor" id="autor" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
    </div>

    <!-- Registrar Usuario -->
    <div class="card mb-3">
        <div class="card-header">Registrar Usuario</div>
        <div class="card-body">
            <form action="{{ url('/usuarios') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Registrar</button>
            </form>
        </div>
    </div>

    <!-- Realizar Préstamo -->
    <div class="card mb-3">
        <div class="card-header">Realizar Préstamo</div>
        <div class="card-body">
            <form action="{{ url('/prestamos') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="libro" class="form-label">Libro</label>
                    <input type="text" name="libro" id="libro" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-warning">Prestar</button>
            </form>
        </div>
    </div>

    <!-- Devolver Libro -->
    <div class="card mb-3">
        <div class="card-header">Devolver Libro</div>
        <div class="card-body">
            <form action="{{ url('/devolver') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="libro" class="form-label">Libro</label>
                    <input type="text" name="libro" id="libro" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-danger">Devolver</button>
            </form>
        </div>
    </div>

    <!-- Ver Préstamos -->
    <div class="card mb-3">
        <div class="card-header">Ver Préstamos</div>
        <div class="card-body">
            <a href="{{ url('/prestamos') }}" class="btn btn-info">Mostrar préstamos</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

