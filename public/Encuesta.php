<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="titulo-encuesta">Encuesta</title>
    <link rel="stylesheet" href="css/Encuesta.css">
</head>
<body>
    <main class="caja-encuestas" id="caja-encuestas">
        <a href="index.html" aria-label="Volver al inicio">
            <img src="Assets/back.png" alt="Salir" class="flecha-encuesta">
        </a>
        <h1 class="tituloEncuesta">ENCUESTA</h1>
        <h2 class="info">Seleccione el producto que quiere añadir al catálogo próximamente:</h2>
   
            <!-- TEXTO 1 INFO PRODUCTO -->
        <section class ="opcion-encuesta">
            <div class="imagen-opcion">
                <img src="Assets/alfajormaizna.avif" alt="Imagen de la opción 1" class="imagen-encuesta1">
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
                <img src="Assets/alfajorportezueo.jpg" alt="Imagen de la opción 2" class="imagen-encuesta2">
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
                <img src="Assets/coca 2l.jpg" alt="Imagen de la opción 3" class="imagen-encuesta3">
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
        <section>  
             <button type="enviar-encuesta" class="enviar-encuesta">Enviar</button>
    </main>
</body>
</html>