<?php
require_once 'models/Coche.php';

class CochesController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        $coches = Coche::all($this->db);
        require 'views/coches/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $coche = new Coche($_POST['marca'], $_POST['modelo'], $_POST['precio'], $_FILES['foto']['name'], $_POST['id_cliente']);
            $coche->save($this->db);
            move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $_FILES['foto']['name']);
            header('Location: /Concesionario/coches/index.php');
        } else {
            require 'views/coches/create.php';
        }
    }

    public function edit($id) {
        $coche = Coche::find($this->db, $id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $coche->marca = $_POST['marca'];
            $coche->modelo = $_POST['modelo'];
            $coche->precio = $_POST['precio'];
            if (!empty($_FILES['foto']['name'])) {
                $coche->foto = $_FILES['foto']['name'];
                move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $_FILES['foto']['name']);
            }
            $coche->update($this->db);
            header('Location: /Concesionario/coches/index.php');
        } else {
            require 'views/coches/edit.php';
        }
    }

    public function delete($id) {
        $coche = Coche::find($this->db, $id);
        $coche->delete($this->db);
        header('Location: /Concesionario/coches/index.php');
    }
}
?>
