<?php
require __DIR__ .'/../config/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/Sugerencias.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugerencias</title>
    <link rel="stylesheet" href="css/DarkWhite.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
</body>

</html>
<style>
    body {
        margin: 0;
        min-height: 100vh;
    }

    .caja-sugerencias {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 7px 5px 20px 20px rgba(0, 0, 0, 0.15);
        background: #fff;
        width: 90%;
        max-width: 501px;
        padding: 24px;
        border-radius: 12px;
    }

    .h1 {
        margin-top: 0;
        text-align: center;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #444;
    }

    textarea {
        width: 100%;
        min-height: 140px;
        resize: vertical;
        padding: 12px;
        border-radius: 8px;
        box-sizing: border-box;
        font-size: 16px;
    }

    button {
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
      box-shadow: 7px 5px 20px 2.7px rgba(76, 175, 80)
    }

    button:hover {
        background: rgb(76, 175, 80);
    }

    .menusugerencias {
        position: fixed;
        top: 0;
        left: 0;
        height: 90px;
        width: auto;
    }
    .titulosugg {
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.35);
    }
    .menu-sugerencias {
        background-color: white;    
    }
        @import url(
            'https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            font-family: "Raleway", sans-serif
        }
</style>
</head>

<body>
    <img src="Assets/linea.png" class="sidebar-toggle" alt="Menu">
        <aside class="sidebar">
            <ul class="links">
                <li>
                    <section class="perfil-contenedor">
                        <button class="perfil"><a href="Perfil.php"></a></button>
                        <p class="perfil-datos">
                            <span class="perfil-texto">Usuario</span>
                            <span class="perfil-dinero"><a href="Dinero.php">$0.00</a></span>
                        </p>
                    </section>
                </li>
                <hr class="linea">
                <li>
                    <a href="Historial.php"><img src="Assets/historial-de-pedidos.png" class="iconos"
                            alt="Historial de compras">Historial</a>
                </li>
                <li>
                    <a href="Encuesta.php"><img src="Assets/encuesta.png" class="iconos" alt="Encuesta">Encuesta</a>
                </li>
                <li>
                    <a href="Sugerencias.php"><img src="Assets/carta.png" class="iconos"
                            alt="Sugerencias">Sugerencias</a>
                </li>
                <li>
                    <label for="tocar" id="modo">
                        <img id="icono-modo" src="Assets/modo-diurno.png" class="iconos" alt="Modo">
                        <span id="texto-modo">Modo claro</span>
                    </label>
                    <input type="checkbox" id="tocar">
                </li>
                <li>
                    <a href="Admin.php"><img src="Assets/admin.png" class="iconos" alt="Menu admin">Menu admin</a>
                </li>
            </ul>
        </aside>
        
    <div class="caja-sugerencias">
        <h1>Sugerencias</h1>

        <form>
            <h2 class="sugerencia-info">Escribe tu sugerencia:</h2>
            <textarea id="sugerencia" name="sugerencia"
                placeholder="Escribe aquí tu comentario o sugerencia..."></textarea>
            <button type="submit">Enviar</button>
        </form>
         
    </div>
      <script src="js/index.js"></script>
    <script src="js/DarkWhite.js"></script>
</body>

</html>