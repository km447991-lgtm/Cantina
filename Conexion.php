<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "cantina";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "¡Conexión exitosa a la base de datos!";

} catch (PDOException $e) {

    echo "Error en la conexión: " . $e->getMessage();
}
?>
