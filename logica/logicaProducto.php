<?php
class logicaProducto
{
    public function logica($nombre_producto, $precio_producto, $stock, $receta)
    {
        if (!empty($nombre_producto) && is_numeric($precio_producto) && $stock > 0 && !empty($receta)) {
            return true;
        } else {
            return false;
        }
    }
    public function registroProducto($datosProducto) {}
    public function actualizarProducto($datosProducto) {}
}