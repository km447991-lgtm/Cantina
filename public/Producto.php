<?php
require __DIR__ . '/../config/conexion.php';
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    if (isset($_POST["nombre"], $_POST["id_categoria"], $_POST["precio"], $_POST["stock"], $_POST["receta"], $_FILES["imagen"]))
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nombre_producto = $_POST["nombre"];
            $precio_producto = $_POST["precio"];
            $stock = $_POST["stock"];
            $receta = $_POST["receta"];
            $id_categoria = $_POST["id_categoria"];
            $archivo = $_FILES["imagen"];

            if (!$archivo || $archivo["error"] !== UPLOAD_ERR_OK) {
                exit("No se pudo recibir la imagen.");
            }
            $tiposPermitidos = [
                "image/jpeg" => "jpg",
                "image/png" => "png",
                "image/webp" => "webp"
            ];
            $tipo = (new finfo(FILEINFO_MIME_TYPE))->file($archivo["tmp_name"]);
            if (!isset($tiposPermitidos[$tipo])) {
                exit("La imagen debe ser JPG, PNG o WEBP.");
            }

            $carpetaImagenes = __DIR__ . "/Imágenes/productos/";
            if (!is_dir($carpetaImagenes) && !mkdir($carpetaImagenes, 0755, true)) {
                exit("No se pudo crear la carpeta de imágenes.");
            }

            $nombreArchivo = bin2hex(random_bytes(16)) . "." . $tiposPermitidos[$tipo];
            if (!move_uploaded_file($archivo["tmp_name"], $carpetaImagenes . $nombreArchivo)) {
                exit("No se pudo guardar la imagen.");
            }
            $imagen_producto = "Imágenes/productos/" . $nombreArchivo;
            $sql = "INSERT INTO producto
            (id_categoria, stock, precio_producto, receta, nombre_producto, imagen_producto)
            VALUES (?, ?, ?, ?, ?, ?)";
            //fk_administrador

            $stmt = $conexion->prepare($sql);

            $stmt->bind_param(
                "iiisss",
                $id_categoria,
                $stock,
                $precio_producto,
                $receta,
                $nombre_producto,
                $imagen_producto
            );
            if ($stmt->execute()) {
                $stmt->close();
                header("Location: Admin.php");
                exit;
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
            <h1 class="texto-titulo">Añadir producto</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="contenedor-formulario-imagen">
                    <div class="contenedor-formulario">
                        <div class="entryarea">
                            <input class="campos" type="text" id="nombre-producto" name="nombre" spellcheck="false" autocomplete="off" required>
                            <label for="nombre-producto" class="labelline">Nombre</label>
                        </div>
                        <label for="Categoria">Categoria</label>
                        <select class="campos" name="id_categoria">
                            <option value="">Seleccionar categoría</option>
                            <?php
                            $query = "SELECT id_categoria, nombre_categoria FROM categoria";
                            $resultado = $conexion->query($query);
                            while ($row = $resultado->fetch_assoc()) {
                                echo '<option value="' . $row['id_categoria'] . '">' . htmlspecialchars($row['nombre_categoria']) . '</option>';
                            }
                            ?>
                        </select>
                        <div class="precio-stock">
                            <div class="contenedor-formulario">
                                <div class="entryarea">
                                    <input class="campos" type="number" name="precio" onkeypress="return event.charCode >= 48" min="1" required>
                                    <label for="Precio" class="labelline">Precio</label>
                                </div>
                            </div>
                            <div class="contenedor-formulario">
                                <div class="entryarea">
                                    <input class="campos" type="number" name="stock" onkeypress="return event.charCode >= 48" min="1" required>
                                    <label for="Stock" class="labelline">Stock</label>
                                </div>
                            </div>
                        </div>
                        <label for="receta"></label>
                        <textarea class="campos" class="receta-formulario" name="receta"></textarea>
                    </div>
                    <div class="formulario-imagen">
                        <img alt="Producto-imagen" id="img" src="Assets/imagen.png" name="imagen">
                        <input class="campo-imagen" type="file" class="imagen" id="imagen-producto" name="imagen" accept="image/*">
                        <label for="imagen-producto" class="boton-imagen">Subir imagen</label>
                    </div>
                </div>
                <div class="botones">
                    <button type="submit">Confirmar</button>
                    <a href="Admin.php">Cancelar</a>
                </div>
            </form>
        </section>

    </main>
    <script src="js/DarkWhite.js"></script>
    <script src="js/Producto.js"></script>
</body>

</html>