<?php
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
        <button class="cuadrado-inicial" id="boton-abrir-panel" type="button">Añadir producto</button>
    </header>
    <div class="contenedor-inferior">
        <main class="lista-productos" id="lista-productos" aria-label="Productos añadidos"></main>
    </div>
    <div class="fondo-panel" id="fondo-panel" hidden>
        <section class="panel-producto" role="dialog" aria-modal="true" aria-labelledby="titulo-panel">
            <div class="encabezado-panel">
                <h1 id="titulo-panel">Añadir producto</h1>
            </div>

            <form id="formulario-producto" autocomplete="off">
                <div class="fila-imagen-datos">
                    <label class="zona-imagen" for="imagen-producto">
                        <img id="vista-previa" alt="Vista previa del producto" hidden>
                        <span id="texto-imagen" class="subir-texto">+</span>
                    </label>
                    <input id="imagen-producto" name="imagen" type="file" accept="image/*" hidden required>

                    <div class="campos-producto">
                        <label for="nombre-producto">Nombre</label>
                        <input id="nombre-producto" name="nombre" type="text" placeholder="Nombre" autocomplete="off"
                            required>

                        <label for="precio-producto">Precio</label>
                        <input id="precio-producto" name="precio" type="number" min="0" step="1" placeholder="0"
                            required>

                        <label for="stock-producto">Stock</label>
                        <input id="stock-producto" name="stock" type="number" min="0" step="1" value="0" required>

                        <label for="categoria-producto">Categoría</label>
                        <select id="categoria-producto" name="categoria" required>
                            <option value="">Selecciona categoría</option>
                            <option value="Categoría">Añadir +</option>
                        </select>
                    </div>
                </div>

                <label class="etiqueta-descripcion" for="descripcion-producto">Descripción</label>
                <textarea id="descripcion-producto" name="descripcion" placeholder="Descripción..." required></textarea>

                <p class="mensaje-panel" id="mensaje-panel" aria-live="polite"></p>

                <div class="acciones-panel">
                    <button class="boton-cancelar" id="boton-cancelar-panel" type="button">Cancelar</button>
                    <button class="boton-guardar" type="submit">Guardar</button>
                </div>
            </form>
        </section>
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