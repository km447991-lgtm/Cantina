<?php
require __DIR__ . '/../config/conexion.php';
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    if (isset($_POST["nombre"], $_POST["categoria"], $_POST["precio"], $_POST["stock"], $_POST["receta"]))
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre_producto = $_POST["nombre"];
        $precio_producto = $_POST["precio"];
        $stock = $_POST["stock"];
        $receta = $_POST["receta"];
        $categoria = $_POST["categoria"];

        $sql = "INSERT INTO productos (nombre, categoria, precio, stock, receta) VALUES (?,?,?,?,?)";

        $stmt = $conexion->prepare($sql);    

        $stmt->bind_param(
            "ssd",
            $nombre_producto,
            $precio_producto,
            $stock,
            $receta,
            $categoria
        );
        if ($stmt->execute()) {
            echo "Producto ingresado";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $conexion->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="css/DarkWhite.css">
    <link rel="stylesheet" href="css/Producto.css">
</head>

<body>
    <main>
        <section>
            <h1 class="texto-titulo">Agregar producto</h1>
            <form method="POST">
                <div class="contenedor-formulario-imagen">
                    <div class="contenedor-formulario">
                        <label for="Nombre">Nombre</label>
                        <input class="campos" type="text" name="nombre">
                        <label for="Categoria">Categoria</label>
                        <select class="campos" name="categoria">
                            <option>Seleccionar categoría</option>
                            <option>Añadir +</option>
                        </select>
                        <div class="precio-stock">
                            <div class="contenedor-formulario">
                                <label for="Precio">Precio</label>
                                <input class="campos" type="number" name="precio">
                            </div>
                            <div class="contenedor-formulario">
                                <label for="Stock">Stock</label>
                                <input class="campos" type="number" name="stock">
                            </div>
                        </div>
                        <label for="receta"></label>
                        <textarea class="campos" class="receta-formulario" name="receta"></textarea>
                    </div>
                    <div class="formulario-imagen">
                        <img alt="Producto-imagen" id="img" src="Assets/imagen.png">
                        <input class="campo-imagen" type="file" class="imagen" id="imagen-producto" name="imagen" accept="image/*">
                        <label for="imagen-producto" class="boton-imagen">Subir imagen</label>
                    </div>
                </div>
                <div class="botones">
                    <a href="Admin.php">
                        <button>Cancelar</button>
                    </a>
                    <button type="submit">Confirmar</button> | <a href="Admin.php">Cancelar</a>
                </div>
            </form>
        </section>

    </main>
    <script src="js/DarkWhite.js"></script>
    <script src="js/Producto.js"></script>
</body>

</html>