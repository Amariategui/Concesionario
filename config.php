<?php

//datos conexión al servidor

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Concesionario";


// Crear conexión

try {
    $conexion = new PDO("mysql:host=$servername;dbname=Concesionario", $username, $password); //clase que nos permite conectarnos, también podemos usar nombre y contraseña
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
    echo "Conexión establecida";
    }catch(PDOException $error){
        echo "Conexión erronea".$error;

    }
?>