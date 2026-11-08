<?php
require __DIR__ . '/../config/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de compras</title>
    <link rel="stylesheet" href="css/Historial.css">
</head>

<body>

    <div class="container">

        <h2>Historial de compras</h2>


        <div class="compra">
            <p class="fecha">04/11/2026 - 10:35</p> 
            <div class="producto">
                <span>Cocacola</span>
                <span>$ 50</span>
            </div>
            <div class="producto">
                <span>Alfajor</span>
                <span>$ 25</span>
            </div>
            <div class="total">
                <span>Total</span>
                <span>$ 75</span>
            </div>

            <div class="compra">
                <p class="fecha">03/11/2026 - 12:10</p>
                <div class="producto">
                    <span>Empanada de carne</span>
                    <span>$ 75</span>
                </div>
                <div class="producto">
                    <span>Jugo de caja</span>
                    <span>$ 20</span>
                </div>
                <div class="total">
                    <span>Total</span>
                    <span>$ 95</span>
                </div>

                <div class="compra">
                    <p class="fecha">02/11/2026 - 16:45</p>
                    <div class="producto">
                        <span>Bizcochos</span>
                        <span>$ 50</span>
                    </div>
                    <div class="producto">
                        <span>Agua mineral</span>
                        <span>$ 40</span>
                    </div>
                    <div class="total">
                        <span>Total</span>
                        <span>$ 90</span>
                    </div>

                    <div class="compra">
                        <p class="fecha">30/10/2026 - 18:20</p>
                        <div class="producto">
                            <span>pizza</span>
                            <span>$ 50</span>
                        </div>
                        <div class="producto">
                            <span>Cocacola</span>
                            <span>$ 50</span>
                        </div>
                        <div class="total">
                            <span>Total</span>
                            <span>$ 100</span>
                        </div>
                    </div>

                    <div class="compra">
                        <p class="fecha">29/10/2026 - 20:05</p>
                        <div class="producto">
                            <span>Alfajor de dulce de leche</span>
                            <span>$ 45</span>
                        </div>
                        <div class="producto">
                            <span>Chicles</span>
                            <span>$ 15</span>
                        </div>
                        <div class="total">
                            <span>Total</span>
                            <span>$ 60</span>
                        </div>
                    </div>

                </div>

</body>

</html>