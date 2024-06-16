<?php
// Incluir archivos de configuración y controladores
require 'config.php'; // Archivo con los datos de conexión a la base de datos
require 'controllers/ClientesController.php'; // Controlador para la gestión de clientes
require 'controllers/CochesController.php'; // Controlador para la gestión de coches

// Crear la conexión a la base de datos utilizando PDO
try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configurar PDO para que lance excepciones en caso de error
    echo "Conexión establecida"; // Mensaje de confirmación de conexión exitosa
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage()); // Capturar y mostrar errores de conexión
}

// Obtener la ruta solicitada desde la URL
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
echo "Ruta solicitada: $path<br>"; // Mostrar la ruta solicitada para propósitos de depuración

// Ruta base para clientes
if (strpos($path, '/Concesionario/clientes') === 0) {
    $controller = new ClientesController($db); // Instanciar el controlador de clientes y pasar la conexión PDO

    // Determinar la acción según la ruta específica
    if ($path == '/Concesionario/clientes/index.php' || $path == '/Concesionario/clientes/') {
        echo "Cargando vista de clientes index<br>";
        $controller->index(); // Llamar al método index del controlador de clientes
    } elseif ($path == '/Concesionario/clientes/create.php') {
        echo "Cargando vista de clientes create<br>";
        $controller->create(); // Llamar al método create del controlador de clientes
    } elseif ($path == '/Concesionario/clientes/edit.php') {
        echo "Cargando vista de clientes edit<br>";
        $controller->edit($_GET['id']); // Llamar al método edit del controlador de clientes con el ID proporcionado
    } elseif ($path == '/Concesionario/clientes/delete.php') {
        echo "Cargando vista de clientes delete<br>";
        $controller->delete($_GET['id']); // Llamar al método delete del controlador de clientes con el ID proporcionado
    } else {
        echo "Ruta no encontrada en clientes<br>";
    }
} 

// Ruta base para coches
elseif (strpos($path, '/Concesionario/coches') === 0) {
    $controller = new CochesController($db); // Instanciar el controlador de coches y pasar la conexión PDO

    // Determinar la acción según la ruta específica
    if ($path == '/Concesionario/coches/index.php' || $path == '/Concesionario/coches/') {
        echo "Cargando vista de coches index<br>";
        $controller->index(); // Llamar al método index del controlador de coches
    } elseif ($path == '/Concesionario/coches/create.php') {
        echo "Cargando vista de coches create<br>";
        $controller->create(); // Llamar al método create del controlador de coches
    } elseif ($path == '/Concesionario/coches/edit.php') {
        echo "Cargando vista de coches edit<br>";
        $controller->edit($_GET['id']); // Llamar al método edit del controlador de coches con el ID proporcionado
    } elseif ($path == '/Concesionario/coches/delete.php') {
        echo "Cargando vista de coches delete<br>";
        $controller->delete($_GET['id']); // Llamar al método delete del controlador de coches con el ID proporcionado
    } else {
        echo "Ruta no encontrada en coches<br>";
    }
} 

// Ruta base para la página de inicio
elseif ($path == '/Concesionario/' || $path == '/Concesionario/index.php') {
    // Puedes cargar la vista de la página de inicio aquí si la tienes
    echo "Cargando vista de la página de inicio<br>";
    // Puedes incluir aquí código para mostrar una página de inicio específica
} 

// Ruta no encontrada
else {
    echo "Ruta no encontrada<br>";
}
?>
