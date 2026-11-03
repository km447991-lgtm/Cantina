<?php
if (!$resultado) {
    throw new RuntimeException($conexion->error);
}
$resultado = $conexion->query(
    'SELECT u.nombre, s.texto, s.fecha
     FROM sugerencia AS s
     JOIN Usuario AS u ON u.id_Usuario = s.fk_cliente
     ORDER BY s.id_sugerencias DESC'
);

if (!$resultado) {
    throw new RuntimeException($conexion->error);
}
require __DIR__ .'/../config/conexion.php';
$sql = "SELECT id_producto, nombre_producto, precio_producto, id_categoria, stock, receta FROM producto";
$productos = $conexion->query($sql);

while ($sugerencia = $resultado->fetch_assoc()): ?>
    <article>
        <strong><?= htmlspecialchars($sugerencia['nombre'], ENT_QUOTES, 'UTF-8') ?></strong>
        <small><?= htmlspecialchars($sugerencia['fecha'], ENT_QUOTES, 'UTF-8') ?></small>
        <p><?= nl2br(htmlspecialchars($sugerencia['texto'], ENT_QUOTES, 'UTF-8')) ?></p>
    </article>
<?php endwhile; 
?>
require __DIR__ .'/../config/conexion.php';
$sql = "SELECT id_producto, nombre_producto, precio_producto, id_categoria, stock, receta FROM producto";
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
    </header>
    <section class="contenedor-inferior">


    
    </section>
    <script src="js/DarkWhite.js"></script>
    <script src="js/Admin.js"></script>
    <script src="js/index.js"></script>
</body>
</html>