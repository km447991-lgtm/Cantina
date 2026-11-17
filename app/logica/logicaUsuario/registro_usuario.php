<?php
require_once __DIR__ . '/../LogicaUsuario.php';

if (
    $_SERVER['REQUEST_METHOD'] !== 'POST'
    || !isset($_POST['nombre'], $_POST['nombre_usuario'], $_POST['contrasena'])
) {
    header("Location: ../../../public/Registro.php");
    exit;
}

try {
    $logicaUsuario = new LogicaUsuario();
    $logicaUsuario->registro(
        $_POST['nombre'],
        $_POST['nombre_usuario'],
        $_POST['contrasena']
    );

    $mensaje = "Usuario almacenado.";
    $destino = "../../../public/Login.php";
} catch (RuntimeException $e) {
    $mensaje = $e->getMessage();
    $destino = "../../../public/Registro.php";
}

$opcionesJson = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP;
echo '<script>alert(' . json_encode($mensaje, $opcionesJson) . '); window.location = '
    . json_encode($destino, $opcionesJson) . ';</script>';
