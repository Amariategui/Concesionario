<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Coche</title>
</head>
<body>
    <h1>Nuevo Coche</h1>
    <form method="POST" action="/controllers/CochesController.php?action=create" enctype="multipart/form-data">
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required>
        <br>
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" required>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required>
        <br>
        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" required>
        <br>
        <label for="id_cliente">ID Cliente:</label>
        <input type="number" id="id_cliente" name="id_cliente" required>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
