<?php
require_once __DIR__ . '/../../../logica/logicaProducto.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    $nombre_producto = $_POST['nombre_producto'];
    $precio_producto = $_POST['precio_producto'];
    $stock = $_POST['stock'];
    $receta = $_POST['receta'];

    $servicio = new logicaProducto();

    $productoExistente = $servicio->logica($nombre_producto, $precio_producto, $stock, $receta);
    if ($productoExistente == true){
        // Aquí puedes realizar la lógica para registrar el producto en la base de datos
    }
}
