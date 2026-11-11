<?php
require __DIR__ .  '/../../config/Conexion.php';
$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];
$nombre_usuario = $_POST['nombre_usuario'];

$contrasena = hash('sha512', $contrasena);

$query = "INSERT INTO usuarios(nombre, contrasena, nombre_usuario) 
            VALUES('$nombre', '$contrasena', '$nombre_usuario')";

$verificar_contrasena = mysqli_query($conexion, "SELECT * FROM usuarios WHERE contrasena='$contrasena' ");
if (mysqli_num_rows($verificar_contrasena) > 0) {
    echo '
            <script>
                alert("Contraseña en uso; intente con otra")
                window.location = "../../public/Registro.php";
            </script>
            ';
    exit();
}
$verificar_nombre_de_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_usuario='$nombre_usuario' ");
if (mysqli_num_rows($verificar_nombre_de_usuario) > 0) {
    echo '
            <script>
                alert("Nombre de usuario en uso; intente con otro")
                window.location = "../../public/Registro.php";
            </script>
            ';
    exit();
}
$verificar_nombre = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre='$nombre' ");
if (mysqli_num_rows($verificar_nombre) > 0) {
    echo '
            <script>
                alert("Nombre en uso; intente con otro")
                window.location = "../../public/Registro.php";    
            </script>
            ';
    exit();
}
$ejecutar = mysqli_query($conexion, $query);
if ($ejecutar) {
    echo '
            <script>
                alert("Usuario almacenado")
                window.location = "../../public/index.php";    
            </script>
            ';
} else {
    echo '
            <script>
                alert("Error, Usuario no almacenado")
                window.location = "../../public/Registro.php";    
            </script>
            ';
}
mysqli_close($conexion);
