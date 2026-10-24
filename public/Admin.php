<?php
require_once __DIR__ . '/../config/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú admin</title>
    <link rel="stylesheet" href="css/DarkWhite.css">
    <link rel="stylesheet" href="css/Admin.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <header class="contenedor-superior2">
        <div calss="contenedor-texto-imagen">
            <h1 class="texto-superior"><img src="Assets/linea.png" class="sidebar-toggle" alt="Menu">Menú admin</h1>
        </div>
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
                    <a href="index.php"><img src="Assets/productos.png" class="iconos"
                            alt="Productos">Productos</a>
                </li>
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
            </ul>
        </aside>
        <a href="Producto.php">
            <button class="cuadrado-inicial" id="boton-abrir-panel" type="button">Añadir producto</button>
        </a>
    </header>
    <div class="contenedor-inferior">
        <main class="lista-productos" id="lista-productos" aria-label="Productos añadidos"></main>
    </div>

    <div class="fondo-panel" id="fondo-detalle" hidden>
        <section class="panel-producto" role="dialog" aria-modal="true" aria-labelledby="nombre-detalle">
            <img class="imagen-detalle" id="imagen-detalle" alt="">
            <div class="separador-contenedor">
                <div class="separador1">
                    <h1 id="nombre-detalle"></h1>
                    <p class="categoria-detalle" id="categoria-detalle"></p>
                </div>
                <div class="separador2">
                    <p class="precio-detalle" id="precio-detalle"></p>
                    <p class="stock-detalle" id="stock-detalle">Stock: </p>
                </div>
            </div>
            <p class="descripcion-detalle" id="descripcion-detalle"></p>
            <div class="encabezado-detalle">
                <button class="boton-eliminar" id="boton-eliminar-producto" type="button">Eliminar</button>
            </div>
        </section>
    </div>
    <script src="js/index.js" defer></script>
    <script src="js/admin.js" defer></script>
    <script src="js/DarkWhite.js"></script>
</body>

</html>