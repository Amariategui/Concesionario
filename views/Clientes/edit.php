<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente</h1>
    <form method="POST" action="/controllers/ClientesController.php?action=edit&id=<?php echo $cliente['id']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $cliente['nombre']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $cliente['email']; ?>" required>
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $cliente['telefono']; ?>" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
