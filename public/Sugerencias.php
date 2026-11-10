<?php
require __DIR__ .'/../config/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/Sugerencias.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="titulosugg">Sugerencias</title>
      <style>
        @import url(
'https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            font-family: "Raleway", sans-serif
        }
    </style>
</head>

<body> <a href="index.php"><img src="Assets/back.png" alt="Salir" class="flechasugerencias"></a>
</body>

</html>
<style>
    body {
        background: #4caf50;
        margin: 0;
        min-height: 100vh;
    }

    .caja-sugerencias {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 7px 5px 20px 20px rgba(0, 0, 0, 0.15);
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
     box-shadow: 7px 5px 20px 2.7px rgba(76, 175, 80)
    }

    button:hover {
        background: rgb(76, 175, 80);
    }

    .flechasugerencias {
        position: fixed;
        top: 0;
        left: 0;
        height: 90px;
        width: auto;
    }
    .titulosugg {
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.35);
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