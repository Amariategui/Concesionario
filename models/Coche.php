// models/Coche.php
<?php
class Coche {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function crear($marca, $modelo, $precio, $foto, $id_cliente) {
        $sql = "INSERT INTO coches (marca, modelo, precio, foto, id_cliente) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$marca, $modelo, $precio, $foto, $id_cliente]);
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM coches";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM coches WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $marca, $modelo, $precio, $foto, $id_cliente) {
        $sql = "UPDATE coches SET marca = ?, modelo = ?, precio = ?, foto = ?, id_cliente = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$marca, $modelo, $precio, $foto, $id_cliente, $id]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM coches WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
