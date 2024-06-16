<?php
require_once 'models/Coche.php';  // Incluir el modelo Coche para usarlo en el controlador

// Definición de la clase CochesController
class CochesController {
    private $db;  // Variable para almacenar la conexión a la base de datos

    // Constructor de la clase, recibe la conexión a la base de datos como parámetro
    public function __construct($db) {
        $this->db = $db;
    }

    // Método para mostrar todos los coches
    public function index() {
        $coches = Coche::all($this->db);  // Obtener todos los coches usando el método estático all del modelo Coche
        require 'views/coches/index.php';  // Cargar la vista index.php de coches
    }

    // Método para mostrar el formulario de creación de coches o para procesar el formulario enviado
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Verificar si se envió el formulario por POST
            // Crear una nueva instancia de Coche con los datos recibidos
            $coche = new Coche($_POST['marca'], $_POST['modelo'], $_POST['precio'], $_FILES['foto']['name'], $_POST['id_cliente']);
            $coche->save($this->db);  // Guardar el nuevo coche en la base de datos
            // Mover la foto subida al directorio de uploads
            move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $_FILES['foto']['name']);
            header('Location: /Concesionario/coches/index.php');  // Redirigir a la página de índice de coches
        } else {
            require 'views/coches/create.php';  // Cargar la vista create.php para mostrar el formulario de creación de coches
        }
    }

    // Método para mostrar el formulario de edición de un coche específico o para procesar los cambios enviados
    public function edit($id) {
        $coche = Coche::find($this->db, $id);  // Buscar el coche por su ID y almacenarlo en la variable $coche
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Verificar si se envió el formulario por POST
            // Actualizar los datos del coche con los valores recibidos del formulario
            $coche->marca = $_POST['marca'];
            $coche->modelo = $_POST['modelo'];
            $coche->precio = $_POST['precio'];
            if (!empty($_FILES['foto']['name'])) {  // Verificar si se subió una nueva foto
                $coche->foto = $_FILES['foto']['name'];
                move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $_FILES['foto']['name']);  // Mover la nueva foto al directorio de uploads
            }
            $coche->update($this->db);  // Actualizar el coche en la base de datos
            header('Location: /Concesionario/coches/index.php');  // Redirigir a la página de índice de coches
        } else {
            require 'views/coches/edit.php';  // Cargar la vista edit.php para mostrar el formulario de edición de coches
        }
    }

    // Método para eliminar un coche específico por su ID
    public function delete($id) {
        $coche = Coche::find($this->db, $id);  // Buscar el coche por su ID y almacenarlo en la variable $coche
        $coche->delete($this->db);  // Eliminar el coche de la base de datos
        header('Location: /Concesionario/coches/index.php');  // Redirigir a la página de índice de coches
    }
}
?>
