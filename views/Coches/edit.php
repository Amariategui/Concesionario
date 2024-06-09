<!DOCTYPE html>
<html>
<head>
    <title>Editar Coche</title>
</head>
<body>
    <h1>Editar Coche</h1>
    <form method="POST" action="/controllers/CochesController.php?action=edit&id=<?php echo $coche['id']; ?>" enctype="multipart/form-data">
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value="<?php echo $coche['marca']; ?>" required>
        <br>
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="<?php echo $coche['modelo']; ?>" required>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" value="<?php echo $coche['precio']; ?>" required>
        <br>
        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto">
        <br>
        <label for="id_cliente">ID Cliente:</label>
        <input type="number" id="id_cliente" name="id_cliente" value="<?php echo $coche['id_cliente']; ?>" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
