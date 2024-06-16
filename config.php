<?php

//datos conexión al servidor
$servername = "localhost";   // Nombre del servidor de la base de datos (en este caso, localhost)
$username = "root";          // Nombre de usuario de la base de datos (en este caso, root)
$password = "";              // Contraseña de la base de datos (en este caso, vacía)
$dbname = "Concesionario";   // Nombre de la base de datos a la que te estás conectando

// Crear conexión usando PDO (PHP Data Objects)
try {
    $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Crear una instancia de PDO para conectarse a MySQL con el servidor, nombre de la base de datos, usuario y contraseña

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Configurar el modo de error para lanzar excepciones en caso de error de conexión o consulta

    echo "Conexión establecida";  // Mensaje que se muestra si la conexión se establece correctamente
} catch(PDOException $error) {
    echo "Conexión erronea" . $error;  // Mensaje que se muestra si hay un error al intentar establecer la conexión
}

?>
