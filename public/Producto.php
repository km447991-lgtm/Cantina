<?php
require_once __DIR__ . '/../utils/protexion.php';
require_once __DIR__ . '/../app/logica/LogicaProducto.php';
function guardarImagenProducto(?array $archivo): string
{
    if ($archivo === null || $archivo["error"] !== UPLOAD_ERR_OK) {
        throw new RuntimeException("No se pudo recibir la imagen.");
    }

    $tipos = [
        "image/jpeg" => "jpg",
        "image/png" => "png",
        "image/webp" => "webp"
    ];

    $tipo = (new finfo(FILEINFO_MIME_TYPE))->file($archivo["tmp_name"]);
    if (!isset($tipos[$tipo])) {
        throw new RuntimeException("La imagen debe ser JPG, PNG o WEBP.");
    }

    $carpeta = __DIR__ . "/Imágenes/productos/";
    if (!is_dir($carpeta) && !mkdir($carpeta, 0755, true)) {
        throw new RuntimeException("No se pudo crear la carpeta de imágenes.");
    }

    $nombre = bin2hex(random_bytes(16)) . "." . $tipos[$tipo];
    if (!move_uploaded_file($archivo["tmp_name"], $carpeta . $nombre)) {
        throw new RuntimeException("No se pudo guardar la imagen.");
    }

    return "Imágenes/productos/" . $nombre;
}

$logicaProducto = new LogicaProducto();
$categorias = $logicaProducto->listarCategorias();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $imagen = guardarImagenProducto($_FILES["imagen"] ?? null);

        $logicaProducto->agregarProducto(
            $_POST["nombre"],
            (int) $_POST["id_categoria"],
            (int) $_POST["stock"],
            (int) $_POST["precio"],
            $_POST["receta"] ?? "",
            $imagen
        );

        header("Location: Admin.php");
        exit;
    } catch (RuntimeException $e) {
        echo "Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
    }
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
                            <?php foreach ($categorias as $categoria) { ?>
                                <option value="<?php echo (int) $categoria["id_categoria"]; ?>">
                                    <?php echo htmlspecialchars($categoria["nombre_categoria"], ENT_QUOTES, "UTF-8"); ?>
                                </option>
                            <?php } ?>
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