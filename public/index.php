<?php
require_once __DIR__ . '/../config/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="index,follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="css/DarkWhite.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <button class="sidebar-backdrop" type="button" aria-label="Cerrar menú"></button>
    <header class="contenedor-superior">
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
                            alt="Historial de compras">Historial de compras</a>
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
        <form class="buscador">
            <span class="search">
                <img src="Assets/buscar.png" alt="Buscar" class="icono-buscar">
                <input id="input-buscador" type="text" placeholder="Buscar...">
                <ion-icon id="equis-input" name="close-outline"></ion-icon>
            </span>
        </form>
    </header>
    <main class="contenedor-inferior">
    </main>
    <script type="module" src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.js"></script>
    <script src="js/index.js"></script>
    <script src="js/DarkWhite.js"></script>
</body>

</html>