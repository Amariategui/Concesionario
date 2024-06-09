<?php
require 'config.php';
require 'controllers/ClientesController.php';
require 'controllers/CochesController.php';

// Crear la conexión a la base de datos
try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión establecida";
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}

// Obtener la ruta solicitada
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
echo "Ruta solicitada: $path<br>";

// Ruta base para clientes
if (strpos($path, '/Concesionario/clientes') === 0) {
    $controller = new ClientesController($db);
    if ($path == '/Concesionario/clientes/index.php' || $path == '/Concesionario/clientes/') {
        echo "Cargando vista de clientes index<br>";
        $controller->index();
    } elseif ($path == '/Concesionario/clientes/create.php') {
        echo "Cargando vista de clientes create<br>";
        $controller->create();
    } elseif ($path == '/Concesionario/clientes/edit.php') {
        echo "Cargando vista de clientes edit<br>";
        $controller->edit($_GET['id']);
    } elseif ($path == '/Concesionario/clientes/delete.php') {
        echo "Cargando vista de clientes delete<br>";
        $controller->delete($_GET['id']);
    } else {
        echo "Ruta no encontrada en clientes<br>";
    }
} 

// Ruta base para coches
elseif (strpos($path, '/Concesionario/coches') === 0) {
    $controller = new CochesController($db);
    if ($path == '/Concesionario/coches/index.php' || $path == '/Concesionario/coches/') {
        echo "Cargando vista de coches index<br>";
        $controller->index();
    } elseif ($path == '/Concesionario/coches/create.php') {
        echo "Cargando vista de coches create<br>";
        $controller->create();
    } elseif ($path == '/Concesionario/coches/edit.php') {
        echo "Cargando vista de coches edit<br>";
        $controller->edit($_GET['id']);
    } elseif ($path == '/Concesionario/coches/delete.php') {
        echo "Cargando vista de coches delete<br>";
        $controller->delete($_GET['id']);
    } else {
        echo "Ruta no encontrada en coches<br>";
    }
} 

// Ruta base para la página de inicio
elseif ($path == '/Concesionario/' || $path == '/Concesionario/index.php') {
    // Aquí puedes cargar la vista de la página de inicio si la tienes
    echo "Cargando vista de la página de inicio<br>";
    // Puedes incluir aquí código para mostrar una página de inicio
} 

// Ruta no encontrada
else {
    echo "Ruta no encontrada<br>";
}
?>
