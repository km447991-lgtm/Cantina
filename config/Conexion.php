<?php
$host = "localhost";
$usuario = "root";
$password = "";
$base_datos = "cantina";

$conexion = new mysqli($host, $usuario, $password, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexion: " . $conexion->connect_error);
} else {
    echo "Conexion exitosa a MySQLi";
}
