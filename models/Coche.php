<?php
// Definición de la clase Coche
class Coche {
    private $conn;  // Variable para almacenar la conexión a la base de datos

    // Constructor de la clase, recibe la conexión a la base de datos como parámetro
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para crear un nuevo coche en la base de datos
    public function crear($marca, $modelo, $precio, $foto, $id_cliente) {
        $sql = "INSERT INTO coches (marca, modelo, precio, foto, id_cliente) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);  // Preparar la consulta SQL
        // Ejecutar la consulta SQL con los valores proporcionados y retornar el resultado
        return $stmt->execute([$marca, $modelo, $precio, $foto, $id_cliente]);
    }

    // Método para obtener todos los coches de la base de datos
    public function obtenerTodos() {
        $sql = "SELECT * FROM coches";
        $stmt = $this->conn->query($sql);  // Ejecutar la consulta SQL
        // Retornar todas las filas resultantes como un array asociativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener un coche específico por su ID
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM coches WHERE id = ?";
        $stmt = $this->conn->prepare($sql);  // Preparar la consulta SQL
        $stmt->execute([$id]);  // Ejecutar la consulta SQL con el ID proporcionado
        // Retornar la primera fila resultante como un array asociativo
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para actualizar la información de un coche existente
    public function actualizar($id, $marca, $modelo, $precio, $foto, $id_cliente) {
        $sql = "UPDATE coches SET marca = ?, modelo = ?, precio = ?, foto = ?, id_cliente = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);  // Preparar la consulta SQL
        // Ejecutar la consulta SQL con los valores proporcionados y retornar el resultado
        return $stmt->execute([$marca, $modelo, $precio, $foto, $id_cliente, $id]);
    }

    // Método para eliminar un coche de la base de datos por su ID
    public function eliminar($id) {
        $sql = "DELETE FROM coches WHERE id = ?";
        $stmt = $this->conn->prepare($sql);  // Preparar la consulta SQL
        // Ejecutar la consulta SQL con el ID proporcionado y retornar el resultado
        return $stmt->execute([$id]);
    }
}
?>

