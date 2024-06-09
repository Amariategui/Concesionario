<?php
require_once 'models/Cliente.php';

class ClientesController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        $clientes = Cliente::all($this->db);
        require 'views/clientes/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente = new Cliente($_POST['nombre'], $_POST['email'], $_POST['telefono']);
            $cliente->save($this->db);
            header('Location: /Concesionario/clientes/index.php');
        } else {
            require 'views/clientes/create.php';
        }
    }

    public function edit($id) {
        $cliente = Cliente::find($this->db, $id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente->nombre = $_POST['nombre'];
            $cliente->email = $_POST['email'];
            $cliente->telefono = $_POST['telefono'];
            $cliente->update($this->db);
            header('Location: /Concesionario/clientes/index.php');
        } else {
            require 'views/clientes/edit.php';
        }
    }

    public function delete($id) {
        $cliente = Cliente::find($this->db, $id);
        $cliente->delete($this->db);
        header('Location: /Concesionario/clientes/index.php');
    }
}
?>
