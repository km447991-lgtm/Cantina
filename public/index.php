<?php
require_once __DIR__ . '/../utils/protexion.php';
require_once __DIR__ . '/../app/logica/LogicaProducto.php';

$filtro = $_GET["palabraFiltro"] ?? "";

$logicaProducto = new LogicaProducto();
$productos = $logicaProducto->buscarProductos($filtro);
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
    <link rel="stylesheet" href="css/menu.css">
</head>

<body>
    <header class="contenedor-superior">
        <?php require __DIR__ . '/../secciones/menu.php'; ?>
        <form class="buscador" method="GET">
            <span class="search">
                <img src="Assets/buscar.png" alt="Buscar" class="icono-buscar">
                <input id="input-buscador" type="text" placeholder="Buscar..." name="palabraFiltro">
                <ion-icon id="equis-input" name="close-outline"></ion-icon>
            </span>
        </form>
    </header>
    <main class="contenedor-inferior">
        <?php require __DIR__ . '/../secciones/Sugerencias.php'; ?>
        <section class="campos-productos">
            <?php foreach ($productos as $producto) { ?>
                <article class="producto">
                    <div>
                        <img alt="<?php echo htmlspecialchars($producto['nombre_producto'], ENT_QUOTES, 'UTF-8'); ?>"
                            src="<?php echo htmlspecialchars($producto['imagen_producto'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div>
                        <p><?php echo $producto["nombre_producto"]; ?></p>
                        <div class="stock-precio">
                            <p>$<?php echo $producto["precio_producto"]; ?></p>
                            <p>Stock: <?php echo $producto["stock"]; ?></p>
                        </div>
                    </div>
                </article>
            <?php } ?>
        </section>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.js"></script>
    <script src="js/index.js"></script>
    <script src="js/DarkWhite.js"></script>
</body>

</html>