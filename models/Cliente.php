// models/Cliente.php
<?php
class Cliente {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function crear($nombre, $email, $telefono) {
        $sql = "INSERT INTO clientes (nombre, email, telefono) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nombre, $email, $telefono]);
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM clientes";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM clientes WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $nombre, $email, $telefono) {
        $sql = "UPDATE clientes SET nombre = ?, email = ?, telefono = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nombre, $email, $telefono, $id]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM clientes WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
