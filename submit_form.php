<?php
// Datos de conexión al servidor MySQL
$servername = "localhost"; // Nombre del servidor de base de datos
$username = "root"; // Nombre de usuario de MySQL
$password = ""; // Contraseña de MySQL
$dbname = "Concesionario"; // Nombre de la base de datos a la que nos conectaremos

try {
    // Crear una nueva conexión PDO con los datos proporcionados
    $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Establecer el modo de errores de PDO para que lance excepciones en caso de errores
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Comprobar si se recibieron datos del formulario mediante el método POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Limpiar y recoger los datos del formulario utilizando htmlspecialchars para evitar XSS
        $name = htmlspecialchars($_POST['name']); // Recoger el nombre y limpiarlo
        $email = htmlspecialchars($_POST['email']); // Recoger el correo y limpiarlo
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Recoger la contraseña, encriptarla usando password_hash y luego almacenarla

        // Preparar la consulta SQL para insertar un nuevo usuario en la base de datos
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, contraseña) VALUES (:nombre, :correo, :contraseña)");
        
        // Vincular los parámetros de la consulta SQL con las variables PHP
        $stmt->bindParam(':nombre', $name); // Vincular el parámetro :nombre con la variable $name
        $stmt->bindParam(':correo', $email); // Vincular el parámetro :correo con la variable $email
        $stmt->bindParam(':contraseña', $password); // Vincular el parámetro :contraseña con la variable $password

        // Ejecutar la consulta preparada para insertar el nuevo usuario
        $stmt->execute();

        // Mostrar un mensaje de éxito si el usuario se registró correctamente
        echo "Usuario registrado correctamente";
    } else {
        // Si no se recibieron datos del formulario mediante POST, mostrar un mensaje de error
        echo "No se recibieron datos del formulario";
    }
} catch(PDOException $error) {
    // Capturar y mostrar un mensaje de error en caso de problemas durante la conexión o la ejecución de la consulta
    echo "Error de conexión: " . $error->getMessage();
}
?>
