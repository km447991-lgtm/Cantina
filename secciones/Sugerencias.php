<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/Sugerencias.css">
    <link rel="stylesheet" href="css/DarkWhite.css">
    <link rel="stylesheet" href="css/menu.css">
</head>

<body>
    <main>
        <div id="fondo-sugerencias">
        <form class="contenedor-sugerencia" id="hide-form">
            <h1>Sugerencia</h1>
            <div class="entryarea">
                <input type="text" required>
                <label for="Titulo" class="labelline">Titulo</label>
            </div>
            <textarea class="campos" placeholder="Escriba su sugerencia..."></textarea>
            <div class="enviar-cancelar">
                <button type="submit" class="enviar">Enviar</button>
                <button type="button" class="cancelar" id="close-button">Cancelar</button>
            </div>
        </form>
    </main>
    <script src="js/DarkWhite.js"></script>
    <script src="js/Sugerencias.js"></script>
    <script src="js/index.js"></script>
</body>

</html>