<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <a href="/clientes/create.php">Nuevo Cliente</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?php echo $cliente['id']; ?></td>
            <td><?php echo $cliente['nombre']; ?></td>
            <td><?php echo $cliente['email']; ?></td>
            <td><?php echo $cliente['telefono']; ?></td>
            <td>
                <a href="/clientes/edit.php?id=<?php echo $cliente['id']; ?>">Editar</a>
                <a href="/clientes/delete.php?id=<?php echo $cliente['id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
