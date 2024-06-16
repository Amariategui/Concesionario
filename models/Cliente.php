<?php
// Definición de la clase Cliente
class Cliente {
    private $conn;  // Variable para almacenar la conexión a la base de datos

    // Constructor de la clase, recibe la conexión a la base de datos como parámetro
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para crear un nuevo cliente en la base de datos
    public function crear($nombre, $email, $telefono) {
        $sql = "INSERT INTO clientes (nombre, email, telefono) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);  // Preparar la consulta SQL
        // Ejecutar la consulta SQL con los valores proporcionados y retornar el resultado
        return $stmt->execute([$nombre, $email, $telefono]);
    }

    // Método para obtener todos los clientes de la base de datos
    public function obtenerTodos() {
        $sql = "SELECT * FROM clientes";
        $stmt = $this->conn->query($sql);  // Ejecutar la consulta SQL
        // Retornar todas las filas resultantes como un array asociativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener un cliente específico por su ID
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM clientes WHERE id = ?";
        $stmt = $this->conn->prepare($sql);  // Preparar la consulta SQL
        $stmt->execute([$id]);  // Ejecutar la consulta SQL con el ID proporcionado
        // Retornar la primera fila resultante como un array asociativo
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para actualizar la información de un cliente existente
    public function actualizar($id, $nombre, $email, $telefono) {
        $sql = "UPDATE clientes SET nombre = ?, email = ?, telefono = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);  // Preparar la consulta SQL
        // Ejecutar la consulta SQL con los valores proporcionados y retornar el resultado
        return $stmt->execute([$nombre, $email, $telefono, $id]);
    }

    // Método para eliminar un cliente de la base de datos por su ID
    public function eliminar($id) {
        $sql = "DELETE FROM clientes WHERE id = ?";
        $stmt = $this->conn->prepare($sql);  // Preparar la consulta SQL
        // Ejecutar la consulta SQL con el ID proporcionado y retornar el resultado
        return $stmt->execute([$id]);
    }
}
?>
