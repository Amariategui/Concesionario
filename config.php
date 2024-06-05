<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Concesionario";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}else{
    print("todo ok!");
}
?>
