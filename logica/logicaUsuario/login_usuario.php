<?php
session_start();
require __DIR__ .  '/../../config/Conexion.php';
$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];

$contrasena = hash('sha512', $contrasena);

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre='$nombre' and contrasena='$contrasena'");

if (mysqli_num_rows($validar_login) > 0) {
    $_SESSION['usuario'] = $nombre;
    header("location: ../../public/index.php");
    exit;
} else {
    echo '
    <script>
        alert("Usuario inexistente, verifique los datos introducidos");
        window.location = "../../public/Login.php";
    </script>
';
    exit;
}
