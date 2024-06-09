<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Cliente</title>
</head>
<body>
    <h1>Nuevo Cliente</h1>
    <form method="POST" action="/controllers/ClientesController.php?action=create">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
