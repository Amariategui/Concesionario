<!DOCTYPE html>
<html>
<head>
    <title>Coches</title>
</head>
<body>
    <h1>Coches</h1>
    <a href="/coches/create.php">Nuevo Coche</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th>Foto</th>
            <th>Cliente</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($coches as $coche): ?>
        <tr>
            <td><?php echo $coche['id']; ?></td>
            <td><?php echo $coche['marca']; ?></td>
            <td><?php echo $coche['modelo']; ?></td>
            <td><?php echo $coche['precio']; ?></td>
            <td><img src="/uploads/<?php echo $coche['foto']; ?>" width="100" height="100"></td>
            <td><?php echo $coche['id_cliente']; ?></td>
            <td>
                <a href="/coches/edit.php?id=<?php echo $coche['id']; ?>">Editar</a>
                <a href="/coches/delete.php?id=<?php echo $coche['id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
