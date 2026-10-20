<?php
require_once __DIR__ . '/../config/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    body {
      min-height: 100vh;
      background: #333333;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
    }

    .pantalla {
      position: relative;
      width: 100%;
      max-width: 390px;
      height: 100vh;
      max-height: 850px;
      background: #333333;
      overflow: hidden;
      border: 3px solid #222;
    }

    /*CÍRCULOS*/

    .circulo {
      position: absolute;
      background: #4caf50;
      border-radius: 50%;
    }

    .arriba-1 {
      width: 115px;
      height: 115px;
      top: -35px;
      left: -25px;
    }

    .arriba-2 {
      width: 75px;
      height: 75px;
      top: -5px;
      left: 50px;
    }

    .arriba-3 {
      width: 65px;
      height: 65px;
      top: 25px;
      left: 65px;
    }

    .derecha-1 {
      width: 70px;
      height: 70px;
      top: 65px;
      right: -30px;
    }

    .derecha-2 {
      width: 65px;
      height: 65px;
      top: 105px;
      right: -15px;
    }

    .derecha-3 {
      width: 70px;
      height: 70px;
      top: 150px;
      right: -25px;
    }

    .medio {
      width: 61px;
      height: 61px;
      left: 50px;
      top: 373px;
    }

    .abajo-1 {
      width: 130px;
      height: 130px;
      bottom: -65px;
      left: -35px;
    }

    .abajo-2 {
      width: 180px;
      height: 180px;
      bottom: -75px;
      right: -25px;
    }

    .abajo-3 {
      width: 100px;
      height: 100px;
      bottom: -45px;
      left: 55px;
    }

    /*CONTENIDO*/

    .contenido {
      position: relative;
      z-index: 10;
      width: 92%;
      margin: 98px auto 0;
    }

    h1 {
      color: white;
      text-align: center;
      font-size: 27px;
      margin-bottom: 5px;
    }

    /* LOGO */

    .logo {
      width: 52px;
      height: 52px;
      background: #333333;
      border: 4px solid #4caf50;
      border-radius: 50%;
      margin: 0 auto 12px;
      position: relative;
    }

    .hoja {
      position: absolute;
      width: 17px;
      height: 17px;
      background: #4caf50;
      border-radius: 50%;
    }

    .hoja:nth-child(1) {
      top: 3px;
      left: 13px;
    }

    .hoja:nth-child(2) {
      top: 14px;
      left: 25px;
    }

    .hoja:nth-child(3) {
      top: 25px;
      left: 13px;
    }

    .hoja:nth-child(4) {
      top: 14px;
      left: 2px;
    }

    .tallo {
      position: absolute;
      width: 5px;
      height: 17px;
      background: #4caf50;
      transform: rotate(45deg);
      left: 23px;
      top: 25px;
    }

    /*CAMPOS*/

    .campo {
      width: 100%;
      height: 40px;
      margin-bottom: 14px;
      border: 2px solid transparent;
      outline: none;
      border-radius: 5px;
      background: #242424;
      color: white;
      padding: 0 12px;
      font-size: 16px;
      transition: 0.2s;
    }

    .campo::placeholder {
      color: #d5d5d5;
    }

    .campo:focus {
      border-color: #4caf50;
    }

    .campo.invalido {
      border-color: #e53935;
    }

    /*BOTÓN*/

    .boton {
      width: 100%;
      height: 40px;
      border: solid 1px black   ;
      border-radius: 5px;
      background: #4caf50;
      color: white;
      font-size: 17px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 8px;
      transition: 0.2s;
    }

    .boton:hover {
      background: #43a047;
    }

    .boton:active {
      transform: scale(0.98);
    }

    /*MENSAJES*/

    #mensaje {
      text-align: center;
      font-size: 13px;
      margin-top: 12px;
      display: none;
      line-height: 18px;
    }

    .error {
      color: #ff5252;
    }

    .exito {
      color: #4caf50;
    }

    .admin {
      color: #ffd740;
      font-weight: bold;
    }

    .usuario {
      color: #4caf50;
      font-weight: bold;
    }

    /*TÉRMINOS*/

    .terminos {
      color: white;
      text-align: center;
      font-size: 11px;
      line-height: 17px;
      margin-top: 15px;
    }

    .terminos a {
      color: #d0d0d0;
      text-decoration: underline;
    }
    a { 
      text-decoration: none;
      color: #fff;
    }

    /*ADAPTACIÓN*/

    @media (max-height: 650px) {
      .contenido {
        margin-top: 60px;
      }

      .medio {
        top: 300px;
      }
    }
  </style>
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

      <form id="formulario">

        <!-- EMAIL -->

        <input
          type="email"
          id="email"
          class="campo"
          placeholder="Email"
          autocomplete="email"
          required
        >

        <!-- CONTRASEÑA -->

        <input
          type="password"
          id="password"
          class="campo"
          placeholder="Contraseña"
          autocomplete="current-password"
          minlength="8"
          required
        >

        <button class="boton" type="submit">
        <a href="index.php" class="texto-continuar">Continuar</a>
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

  <script>

    /*CONFIGURACIÓN DE LA ADMINISTRADORA*/

    const CORREO_ADMIN = "cg5373436@gmail.com";


    /*ELEMENTOS*/

    const formulario = document.getElementById("formulario");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const mensaje = document.getElementById("mensaje");


    /* MOSTRAR MENSAJE*/

    function mostrarMensaje(texto, tipo) {

      mensaje.textContent = texto;

      mensaje.className = tipo;

      mensaje.style.display = "block";
    }


    /*ERRORES*/

    function limpiarErrores() {

      emailInput.classList.remove("invalido");
      passwordInput.classList.remove("invalido");

      mensaje.style.display = "none";
    }


    /*VERIFICACION*/

    formulario.addEventListener("submit", function(event) {

      event.preventDefault();

      limpiarErrores();


      const email = emailInput.value.trim().toLowerCase();
      const password = passwordInput.value;


      /*COMPROBAR CAMPOS VACÍOS*/

      if (!email) {

        emailInput.classList.add("invalido");

        mostrarMensaje(
          "Debes introducir tu correo electrónico",
          "error"
        );

        emailInput.focus();

        return;
      }


      if (!password) {

        passwordInput.classList.add("invalido");

        mostrarMensaje(
          "Debes introducir tu contraseña.",
          "error"
        );

        passwordInput.focus();

        return;
      }


      /*COMPROBAR EMAIL*/

      const formatoEmail =
        /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (!formatoEmail.test(email)) {

        emailInput.classList.add("invalido");

        mostrarMensaje(
          "Introduce un correo electrónico válido.",
          "error"
        );

        emailInput.focus();

        return;
      }


      /*COMPROBAR CONTRASEÑA*/

      if (password.length < 8) {

        passwordInput.classList.add("invalido");

        mostrarMensaje(
          "La contraseña debe tener al menos 8 caracteres.",
          "error"
        );

        passwordInput.focus();

        return;
      }


      /*IDENTIFICAR TIPO DE USUARIO*/

      let tipoUsuario;

      if (email === CORREO_ADMIN) {

        tipoUsuario = "Administrador";

      } else {

        tipoUsuario = "Usuario";

      }


      /* GUARDAR INFORMACIÓN DEL USUARIO*/

      const datosUsuario = {

        email: email,

        tipo: tipoUsuario,

        fechaIngreso: new Date().toISOString()

      };

      localStorage.setItem(
        "usuarioActual",
        JSON.stringify(datosUsuario)
      );


      /*MENSAJE FINAL*/

      if (tipoUsuario === "Administrador") {

        mostrarMensaje(
          "Acceso reconocido como ADMINISTRADOR.",
          "admin"
        );

      } else {

        mostrarMensaje(
          "Usuario verificado correctamente.",
          "exito"
        );

      }


      /*INFORMACIÓN EN CONSOLA*/

      console.log("Usuario:", email);
      console.log("Tipo:", tipoUsuario);
    });


    /*COMPROBAR SI YA HAY UNA SESIÓN*/

    window.addEventListener("load", function() {

      const usuarioGuardado =
        localStorage.getItem("usuarioActual");

      if (usuarioGuardado) {

        const usuario =
          JSON.parse(usuarioGuardado);

        console.log(
          "Sesión encontrada:",
          usuario
        );

      }

    });

  </script>

</body>
</html>