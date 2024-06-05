<!-- signup.php -->
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar la contraseña

    // Verificar si el correo electrónico ya está registrado
    $sql = "SELECT id FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "El correo electrónico ya está registrado";
    } else {
        // Insertar nuevo usuario en la base de datos
        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "Usuario registrado exitosamente";
        } else {
            echo "Error al registrar el usuario: " . $conn->error;
        }
    }
}
?>
