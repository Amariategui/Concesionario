<!-- login.php -->
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar las credenciales del usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Iniciar sesión y redirigir al usuario
            session_start();
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['nombre'] = $row['nombre'];
            // Redireccionar a la página de inicio o a donde sea necesario
            header("Location: inicio.php");
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Correo electrónico no registrado";
    }
}
?>
