<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inicio de Sesión</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlaza tu archivo de estilos CSS -->
</head>
<body>

<header>
    <h1>Iniciar Sesión</h1> <!-- Título principal de la página -->
</header>

<form action="submit_form.php" method="post"> <!-- Formulario con método POST que envía los datos a submit_form.php -->
    <div class="form-group">
        <label for="name">Nombre:</label> <!-- Etiqueta para el campo de nombre -->
        <input type="text" id="name" name="name" required> <!-- Campo de entrada para el nombre, obligatorio -->
    </div>
    <div class="form-group">
        <label for="email">Correo:</label> <!-- Etiqueta para el campo de correo electrónico -->
        <input type="email" id="email" name="email" required> <!-- Campo de entrada para el correo, obligatorio y formato de email -->
    </div>
    <div class="form-group">
        <label for="password">Contraseña:</label> <!-- Etiqueta para el campo de contraseña -->
        <input type="password" id="password" name="password" required> <!-- Campo de entrada para la contraseña, obligatorio -->
    </div>
    <div class="form-buttons">
        <a href="index.php"><button type="button">Volver</button></a> <!-- Botón para volver atrás, enlazado a index.php -->
        <button type="submit">Enviar</button> <!-- Botón para enviar el formulario -->
    </div>
</form>

</body>
</html>
