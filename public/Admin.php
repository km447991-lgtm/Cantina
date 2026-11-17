<?php

require_once __DIR__ . '/../utils/protexion.php';
require_once __DIR__ . '/../app/logica/LogicaProducto.php';

$logicaProducto = new LogicaProducto();
$productos = $logicaProducto->buscarProductos('');
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
    <link rel="stylesheet" href="css/menu.css">
</head>

<body>
    <header>
        <div class="menu-texto">
            <?php require __DIR__ . '/../secciones/menu.php'; ?>
            <h1 class="texto-titulo">Panel administrador</h1>
        </div>
        <div class="Botones">
            <a href="Producto.php">
                <button class="boton-añadir">Añadir Producto</button>
            </a>
        </div>
    </header>
    <main>
        <?php require __DIR__ . '/../secciones/Sugerencias.php'; ?>
        <section class="contenedor-inferior">
            <div class="Productos">
                <?php foreach ($productos as $producto) { ?>
                    <article class="producto-inferior">
                        <div>
                            <img alt="<?php echo htmlspecialchars($producto['nombre_producto'], ENT_QUOTES, 'UTF-8'); ?>"
                                src="<?php echo htmlspecialchars($producto['imagen_producto'], ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                        <div class="datos-producto">
                            <p class="nombre"><?php echo $producto["nombre_producto"]; ?></p>
                            <div class="stock-precio">
                                <p>$<?php echo $producto["precio_producto"]; ?></p>
                                <p>Stock: <?php echo $producto["stock"]; ?></p>
                            </div>
                            <p><?php echo $producto["receta"]; ?></p>
                        </div>
                        <div class="botones_editar_eliminar">
                            <button class="editar"><img src="Assets/editar.png" alt="editar">Editar</button>
                            <button class="eliminar"><img src="Assets/basura.png">Eliminar</button>
                        </div>
                    </article>
                <?php } ?>
            </div>
        </section>
    </main>
    <script src="js/DarkWhite.js"></script>
    <script src="js/Admin.js"></script>
    <script src="js/index.js"></script>
</body>

</html>