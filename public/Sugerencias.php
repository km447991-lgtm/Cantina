<?php
require __DIR__ .'/../config/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/Sugerencias.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugerencias</title>
</head>

<body> <a href="index.php"><img src="Assets/back.png" alt="Salir" class="flechasugerencias"></a>
</body>

</html>
<style>
<<<<<<< HEAD
    body {
        background: #218838;
=======
    .body {
        background: #f3f7f4;
>>>>>>> 7627894 (Add/Vista de productos)
        margin: 0;
        min-height: 100vh;
    }

    .caja-sugerencias {
        position: center;
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.35);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        background: #fff;
        width: 90%;
        max-width: 501px;
        padding: 24px;
        border-radius: 12px;
    }

    .h1 {
        margin-top: 0;
        text-align: center;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #444;
    }

    textarea {
        width: 100%;
        min-height: 140px;
        resize: vertical;
        padding: 12px;
        border-radius: 8px;
        box-sizing: border-box;
        font-size: 16px;
    }

    button {
        width: 100%;
      height: 40px;
      border: solid 1px black   ;
      border-radius: 5px;
      background: #4caf50;
      color: white;
      font-size: 17px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 8px;
      transition: 0.2s;
    }

    button:hover {
        background: #4caf50;
    }

    .flechasugerencias {
        position: fixed;
        top: 0;
        left: 0;
        height: 60px;
        width: auto;
    }
</style>
</head>

<body>
    <div class="caja-sugerencias">
        <h1>Sugerencias</h1>

        <form>
            <label for="sugerencia">Escribe tu sugerencia:</label>
            <textarea id="sugerencia" name="sugerencia"
                placeholder="Escribe aquí tu comentario o sugerencia..."></textarea>
            <button type="submit">Enviar</button>
        </form>
         
    </div>
</body>

</html>