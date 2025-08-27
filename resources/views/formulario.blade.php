<!DOCTYPE html>
<html>
<head>
    <title>Formulario</title>
</head>
<body>
    <h1>Ingresar datos</h1>

    <form action="/formulario" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br><br>

        <label for="edad">Edad:</label>
        <input type="number" name="edad" required><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
