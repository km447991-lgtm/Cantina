<?php
session_start();
require_once __DIR__ . '/../logica/logicaUsuario.php';
require_once __DIR__ . '/../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['Usuario'];
    $password = $_POST['password'];

    if ($usuario == 'user' && $password == '1234') {
        $_SESSION['logueado'] = true;
        $_SESSION['usuario'] = $usuario;
        header("Location: /Proyecto/public/index.php");
    } else {
        echo  "Credenciales incorrectas";
    }

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/Login.css">
  <link rel="stylesheet" href="css/DarkWhite.css">
</head>

<body>

  <div class="pantalla">

    <!-- CÍRCULOS -->

    <div class="circulo arriba-1"></div>
    <div class="circulo arriba-2"></div>
    <div class="circulo arriba-3"></div>

    <div class="circulo derecha-1"></div>
    <div class="circulo derecha-2"></div>
    <div class="circulo derecha-3"></div>

    <div class="circulo medio"></div>

    <div class="circulo abajo-1"></div>
    <div class="circulo abajo-2"></div>
    <div class="circulo abajo-3"></div>

    <!-- CONTENIDO -->

    <div class="contenido">

      <!-- LOGO -->

      <div class="logo">
        <div class="hoja"></div>
        <div class="hoja"></div>
        <div class="hoja"></div>
        <div class="hoja"></div>
        <div class="tallo"></div>
      </div>

      <h1>Bienvenido</h1>

      <form method="POST" action="/Proyecto/public/Login.php" id="formulario">

        <!-- User -->

        <input
          type="Usuario"
          id="Usuario"
          class="campo"
          placeholder="Usuario"
          autocomplete="Usuario"
          required
        >

        <!-- CONTRASEÑA -->

        <input
          type="password"
          id="password"
          class="campo"
          placeholder="Contraseña"
          autocomplete="current-password"
          minlength="4"
          required
        >

        <button class="boton" type="submit">Continuar
        </button>

      </form>

      <!-- MENSAJE -->

      <p id="mensaje"></p>

      <!-- TÉRMINOS -->

      <p class="terminos">
        Al presionar continuar aceptará nuestros<br>
        <a href="#">términos y condiciones</a>
      </p>

    </div>

  </div>
    <script src="js/DarkWhite.js"></script>
</body>
</html>