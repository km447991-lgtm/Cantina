<?php 
$paginaACtual = basename($_SERVER['PHP_SELF']);
?>

<button class="sidebar-backdrop" type="button" aria-label="Cerrar menú"></button>
<header>
    <img src="Assets/linea.png" class="sidebar-toggle" alt="Menu">
    <aside class="sidebar">
        <ul class="links">
            <li>
                <section class="perfil-contenedor">
                    <button class="perfil"><a href="Perfil.php"></a></button>
                    <p class="perfil-datos">
                        <span class="perfil-texto"><?php echo $_SESSION["usuario"] ?></span>
                        <span class="perfil-dinero"><a href="Dinero.php">$0.00</a></span>
                    </p>
                </section>
            </li>
            <hr class="linea">
            <?php if ($paginaACtual !== 'index.php') { ?>
            <li>
                <a href="index.php"><img src="Assets/productos.png" class="iconos" alt="Productos">Productos</a>
            </li>
            <?php } ?>
            <?php if ($paginaACtual !== 'Historial.php'){ ?>
            <li>
                <a href="Historial.php"><img src="Assets/historial-de-pedidos.png" class="iconos"
                        alt="Historial de compras">Historial</a>
            </li>
            <?php } ?>
            <li>
                <a href="Encuesta.php"><img src="Assets/encuesta.png" class="iconos" alt="Encuesta">Encuesta</a>
            </li>
            <li>
                <button id="hide-button" class="hide-button"><img src="Assets/carta.png" class="iconos"
                        alt="Sugerencias">Sugerencias</button>
            </li>
            <li>
                <label for="tocar" id="modo">
                    <img id="icono-modo" src="Assets/modo-diurno.png" class="iconos" alt="Modo">
                    <span id="texto-modo">Modo claro</span>
                </label>
                <input type="checkbox" id="tocar">
            </li>
            <li>
                <?php if ($_SESSION["usuario"] == "Kevin" && $paginaACtual !== 'Admin.php') { ?>
                    <a href="Admin.php"><img src="Assets/admin.png" class="iconos" alt="Menu admin">Menu admin</a>
                <?php } ?>
            </li>
            <li class="ultimo">
                <a href="cerrar_sesion.php"><img src="Assets/cerrar-sesion.png" class="iconos" alt="cerrar sesión">Cerrar sesión</a>
            </li>
        </ul>
    </aside>

</header>