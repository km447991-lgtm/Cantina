<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="css/DarkWhite.css">
    <link rel="stylesheet" href="css/Admin.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <main>
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
                    <input id="imagen-producto" name="imagen" type="file" accept="image/*" hidden>

                    <div class="campos-producto">
                        <label for="nombre-producto">Nombre</label>
                        <input id="nombre-producto" name="nombre" type="text" placeholder="Nombre" autocomplete="off">

                        <label for="precio-producto">Precio</label>
                        <input id="precio-producto" name="precio" type="number" min="0" step="1" placeholder="0">

                        <label for="stock-producto">Stock</label>
                        <input id="stock-producto" name="stock" type="number" min="0" step="1" value="0">

                        <label for="categoria-producto">Categoría</label>
                        <select id="categoria-producto" name="categoria">
                            <option value="">Selecciona categoría</option>
                            <option value="Categoría">Añadir +</option>
                        </select>
                    </div>
                </div>

                <label class="etiqueta-descripcion" for="descripcion-producto">Descripción</label>
                <textarea id="descripcion-producto" name="descripcion" placeholder="Descripción..."></textarea>

                <p class="mensaje-panel" id="mensaje-panel" aria-live="polite"></p>

                <div class="acciones-panel">
                    <a href="Admin.php" class="boton-cancelar" id="boton-cancelar-panel" type="button">Cancelar</a>
                    <a href="Admin.php" class="boton-guardar" type="submit">Guardar</a>
                </div>
            </form>
        </section>
    </main>
    <script src="js/index.js" defer></script>
    <script src="js/admin.js" defer></script>
    <script src="js/DarkWhite.js"></script>
</body>
</html>
