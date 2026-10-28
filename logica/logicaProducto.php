<?php
class logicaProducto
{
    public function guardar_producto ($nombre_producto, $precio_producto, $stock, $receta, $categoria)
    {
        if (!empty($nombre_producto) && !empty($categoria) && is_numeric($precio_producto) && $stock > 0 && !empty($receta)) {
            return true;
        } else {
            return false;
        }
    }
    public function registroProducto($datosProducto) {}
    public function actualizarProducto($datosProducto) {}
}