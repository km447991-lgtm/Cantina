<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta</title>
    <style>
        @import url(
'https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            font-family: "Raleway", sans-serif
        }
    </style>
    <link rel="stylesheet" href="css/Encuesta.css">
    <link rel="stylesheet" href="css/DarkWhite.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>  
        <img src="Assets/linea.png" class="sidebar-toggle" alt="Menu">
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
                    <a href="Historial.php"><img src="Assets/historial-de-pedidos.png" class="iconos"
                            alt="Historial de compras">Historial</a>
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
                <li>
                    <a href="Admin.php"><img src="Assets/admin.png" class="iconos" alt="Menu admin">Menu admin</a>
                </li>
            </ul>
        </aside>
    <main class="caja-encuestas" id="caja-encuestas">
        </a>
        <h1 class="tituloEncuesta">ENCUESTA</h1>
        <h2 class="info">Seleccione el producto que quiere añadir al catálogo próximamente:</h2>
   
            <!-- TEXTO 1 INFO PRODUCTO -->
        <section class ="opcion-encuesta">
            <div class="imagen-opcion">
                <img src="Assets/alfajormaizena.jpeg" alt="Imagen de la opción 1" class="imagen-encuesta1">
            </div>
            <div class="datos-opcion">
                <ul>
                    <li class="info-producto1">
                        Nombre: Alfajor de Maizena
                    </li>
                    <li class="info-producto1">
                        Categoria: Dulce
                    </li>
                    <li class="info-producto1">
                        Stock: 50 unidades
                    </li>
                </ul>  
            </div>
            <div class="check-opcion">
                <input type="radio" id="imagen-encuesta3" name="encuesta" value="opcion3">
            </div>
        </section>
        <section>  
            <!-- TEXTO 2 INFO PRODUCTO -->
        <section class ="opcion-encuesta2">
            <div class="imagen-opcion2">
                <img src="Assets/alfajorportezuelo.jpeg" alt="Imagen de la opción 2" class="imagen-encuesta2">
            </div>
            <div class="datos-opcion2">
                <ul>
                    <li class="info-producto2">
                        Nombre: Alfajor de Chocolate Portezuelo
                    </li>
                    <li class="info-producto2">
                        Categoria: Dulce
                    </li>
                    <li class="info-producto2">
                        Stock: 50 unidades
                    </li>
                </ul>  
            </div>
            <div class="check-opcion2">
                <input type="radio" id="imagen-encuesta2" name="encuesta" value="opcion2">
            </div>
        </section>
        <section>  
        <!-- TEXTO 3 INFO PRODUCTO -->
        <section class ="opcion-encuesta3">
            <div class="imagen-opcion3">
                <img src="Assets/coca2l.jpeg" alt="Imagen de la opción 3" class="imagen-encuesta3">
            </div>
            <div class="datos-opcion3">
                <ul>
                    <li class="info-producto3">
                        Nombre: Coca-Cola 2L
                    </li>
                    <li class="info-producto3">
                        Categoria: Bebida
                    </li>
                    <li class="info-producto3">
                        Stock: 30 unidades
                    </li>
                </ul>  
            </div>
            <div class="check-opcion3">
                <input type="radio" id="imagen-encuesta3" name="encuesta" value="opcion3">
            </div>
        </section>
        </section>
        <button type="enviar-encuesta" class="enviar-encuesta">Enviar</button>
        <section>
    <script src="js/DarkWhite.js"></script>
    <script src="js/index.js"></script>
</body>|
</html>