<?php
session_start();
require_once __DIR__ . '/../LogicaUsuario.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['nombre'], $_POST['contrasena'])) {
    header("Location: ../../../public/Login.php");
    exit;
}

try {
    $logicaUsuario = new LogicaUsuario();
    $usuario = $logicaUsuario->login($_POST['nombre'], $_POST['contrasena']);

    if ($usuario === false) {
        $mensaje = "Usuario o contraseña incorrectos.";
        $destino = "../../../public/Login.php";
        $opcionesJson = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP;
        echo '<script>alert(' . json_encode($mensaje, $opcionesJson) . '); window.location = '
            . json_encode($destino, $opcionesJson) . ';</script>';
        exit;
    }

    session_regenerate_id(true);
    $_SESSION['usuario'] = $usuario['nombre'];
    header("Location: ../../../public/index.php");
    exit;
} catch (RuntimeException $e) {
    $destino = "../../../public/Login.php";
    $opcionesJson = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP;
    echo '<script>alert(' . json_encode($e->getMessage(), $opcionesJson) . '); window.location = '
        . json_encode($destino, $opcionesJson) . ';</script>';
    exit;
}
