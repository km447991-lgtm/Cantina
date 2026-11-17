<?php

require __DIR__ . '/../../utils/Conexion.php';

class ProductoDao
{

    function obtenerNombreTabla()
    {
        return "producto";
    }

    public function obtenerColumnas()
    {
        return [
            "id_producto",
            "id_categoria",
            "stock",
            "precio_producto",
            "receta",
            "nombre_producto",
            "imagen_producto"
        ];
    }
    public function listarTodosLosProductos($filtro)
    {
        global $conexion;

        $sql = "SELECT id_producto, nombre_producto, stock, receta, precio_producto, imagen_producto 
        FROM producto WHERE UPPER(nombre_producto) LIKE ? OR UPPER(receta) LIKE ?";
        $stmt = $conexion->prepare($sql);
        if ($stmt === false) {
            throw new RuntimeException(
                "Error al preparar la búsqueda: " . $conexion->error
            );
        }
        $filtro = "%" . strtoupper($filtro) . "%";

        if (!$stmt->bind_param("ss", $filtro, $filtro)) {
            $error = $stmt->error;
            $stmt->close();
            throw new RuntimeException(
                "Error al asociar los parámetros: " . $error
            );
        }
        if (!$stmt->execute()) {
            $error = $stmt->error;
            $stmt->close();
            throw new RangeException(
                "Error al buscar productos: " . $error
            );
        }

        $productos = $stmt->get_result();
        if ($productos === false) {
            $error = $stmt->error;
            $stmt->close();
            throw new RuntimeException(
                "Error al obtener los productos: " . $error
            );
        }

        $stmt->close();
        return $productos;
    }
    public function obtenerPorId($id)
    {
        global $conexion;

        $sql = "SELECT id_producto, nombre_producto, stock, receta, precio_producto, imagen_producto FROM producto WHERE id_producto = ?";

        $stmt = $conexion->prepare($sql);
        if ($stmt === false) {
            throw new RuntimeException(
                "Error al preparar la consulta: " . $conexion->error
            );
        }
        $id = (int) $id;

        if (!$stmt->bind_param("i", $id) || !$stmt->execute()) {
            $error = $stmt->error;
            $stmt->close();
            throw new RuntimeException(
                "Error al buscar el producto: " . $error
            );
        }
        $resultado = $stmt->get_result();
        if ($resultado === false) {
            $error = $stmt->error;
            $stmt->close();
            throw new RuntimeException(
                "Error al obtener el producto: " . $error
            );
        }

        $producto = $resultado->fetch_assoc();
        $resultado->free();
        $stmt->close();

        return $producto;
    }

    public function crear($entidad)
    {
        global $conexion;

        $sql = "INSERT INTO producto
            (id_categoria, stock, precio_producto, receta,
                     nombre_producto, imagen_producto)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conexion->prepare($sql);
        if ($stmt === false) {
            throw new RuntimeException(
                "Error al preparar el INSERT: " . $conexion->error
            );
        }
        $idCategoria = (int) $entidad["id_categoria"];
        $stock = (int) $entidad["stock"];
        $precio = (int) $entidad["precio_producto"];
        $receta = $entidad["receta"];
        $nombre = $entidad["nombre_producto"];
        $imagen = $entidad["imagen_producto"];

        if (!$stmt->bind_param(
            "iiisss",
            $idCategoria,
            $stock,
            $precio,
            $receta,
            $nombre,
            $imagen
        )) {
            $error = $stmt->error;
            $stmt->close();
            throw new RuntimeException(
                "Error al asociar los parámetros: " . $error
            );
        }
        if (!$stmt->execute()) {
            $error = $stmt->error;
            $stmt->close();
            throw new RuntimeException(
                "Error al insertar el producto: " . $error
            );
        }
        $stmt->close();
        return true;
    }
}
