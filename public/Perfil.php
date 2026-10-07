<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/Perfil.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/DarkWhite.css">
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
    <div class="perfil-contenedor">
        <div class="perfil-wrapper">
            <button id="perfilFoto" class="perfil" type="button" aria-label="Editar perfil">
            </button>
            <div id="menuEditar" class="menu-editar" hidden>
                <button type="button" id="cambiarFoto" class="menu-opcion">Foto de perfil</button>
                <button type="button" id="cambiarNombre" class="menu-opcion">Cambiar nombre</button>
            </div>
            <input id="FotoPerfil" type="file" accept="image/*" hidden>
        </div>
        <h1 id="nombreUsuario" class="nombre-us" contenteditable="true" spellcheck="false">Usuario</h1>
        <div class="saldo-wrapper">
            <button id="saldoBtn" class="saldo-btn" type="button">
                <img src="Assets/mas.png" class="mas" alt="mas">
                <span id="saldoTexto">$0</span>
            </button>
            <div id="menuSaldo" class="menu-saldo" hidden>
                <button type="button" id="recargarSaldoBtn" class="menu-opcion">Recargar</button>
                <button type="button" id="cerrarSaldoBtn" class="menu-opcion">Cerrar</button>
            </div>
        </div>
    </div>
    <div>
        <section class="carrito">
        </section>
    </div>

    <script src="js/perfil.js"></script>
    <script src="js/DarkWhite.js"></script>
    <script src="js/index.js"></script>
</body>

</html>