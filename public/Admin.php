<?php
require __DIR__ . '/../config/conexion.php';
$sql = "SELECT id_producto, nombre_producto, stock, receta, precio_producto, imagen_producto FROM producto";
$productos = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/DarkWhite.css">
    <link rel="stylesheet" href="css/Admin.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <button class="sidebar-backdrop" type="button" aria-label="Cerrar menú"></button>
    <header>
        <div class="menu-texto">
            <img src="Assets/linea.png" class="sidebar-toggle" alt="Menu">
            <h1 class="texto-titulo">Panel administrador</h1>
        </div>
        <div class="Botones">
            <a href="Producto.php">
                <button class="boton-añadir">Añadir Producto</button>
            </a>
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
                    <a href="index.php"><img src="Assets/productos.png" class="iconos" alt="Productos">Productos</a>
                </li>
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
            </ul>
        </aside>
    </header>
    <section class="contenedor-inferior">
        <div class="Productos">
            <?php foreach ($productos as $producto) { ?>
                <article class="producto-inferior">
                    <div>
                        <img alt="<?php echo htmlspecialchars($producto['nombre_producto'], ENT_QUOTES, 'UTF-8'); ?>"
                            src="<?php echo htmlspecialchars($producto['imagen_producto'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="campos">
                        <p><?php echo $producto["nombre_producto"]; ?></p>
                        <div class="stock-precio">
                            <p>$<?php echo $producto["precio_producto"]; ?></p>
                            <p>Stock: <?php echo $producto["stock"]; ?></p>
                        </div>
                        <p><?php echo $producto["receta"]; ?></p>
                    </div>
                </article>
            <?php } ?>
        </div>
    </section>
    <script src="js/DarkWhite.js"></script>
    <script src="js/Admin.js"></script>
    <script src="js/index.js"></script>
</body>

</html>