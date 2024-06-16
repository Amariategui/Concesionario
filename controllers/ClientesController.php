<?php
require_once 'models/Cliente.php';  // Incluir el modelo Cliente para usarlo en el controlador

// Definición de la clase ClientesController
class ClientesController {
    private $db;  // Variable para almacenar la conexión a la base de datos

    // Constructor de la clase, recibe la conexión a la base de datos como parámetro
    public function __construct($db) {
        $this->db = $db;
    }

    // Método para mostrar todos los clientes
    public function index() {
        $clientes = Cliente::all($this->db);  // Obtener todos los clientes usando el método estático all del modelo Cliente
        require 'views/clientes/index.php';  // Cargar la vista index.php de clientes
    }

    // Método para mostrar el formulario de creación de clientes o para procesar el formulario enviado
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Verificar si se envió el formulario por POST
            // Crear una nueva instancia de Cliente con los datos recibidos
            $cliente = new Cliente($_POST['nombre'], $_POST['email'], $_POST['telefono']);
            $cliente->save($this->db);  // Guardar el nuevo cliente en la base de datos
            header('Location: /Concesionario/clientes/index.php');  // Redirigir a la página de índice de clientes
        } else {
            require 'views/clientes/create.php';  // Cargar la vista create.php para mostrar el formulario de creación de clientes
        }
    }

    // Método para mostrar el formulario de edición de un cliente específico o para procesar los cambios enviados
    public function edit($id) {
        $cliente = Cliente::find($this->db, $id);  // Buscar el cliente por su ID y almacenarlo en la variable $cliente
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Verificar si se envió el formulario por POST
            // Actualizar los datos del cliente con los valores recibidos del formulario
            $cliente->nombre = $_POST['nombre'];
            $cliente->email = $_POST['email'];
            $cliente->telefono = $_POST['telefono'];
            $cliente->update($this->db);  // Actualizar el cliente en la base de datos
            header('Location: /Concesionario/clientes/index.php');  // Redirigir a la página de índice de clientes
        } else {
            require 'views/clientes/edit.php';  // Cargar la vista edit.php para mostrar el formulario de edición de clientes
        }
    }

    // Método para eliminar un cliente específico por su ID
    public function delete($id) {
        $cliente = Cliente::find($this->db, $id);  // Buscar el cliente por su ID y almacenarlo en la variable $cliente
        $cliente->delete($this->db);  // Eliminar el cliente de la base de datos
        header('Location: /Concesionario/clientes/index.php');  // Redirigir a la página de índice de clientes
    }
}
?>
