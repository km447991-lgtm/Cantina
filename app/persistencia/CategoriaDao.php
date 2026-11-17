<?php

require_once __DIR__ . '/../../utils/Conexion.php';

class CategoriaDao
{
    public function listarTodos($filtros = '')
    {
        global $conexion;

        $sql = "SELECT id_categoria, nombre_categoria FROM categoria";
        $categorias = $conexion->query($sql);

        if ($categorias === false) {
            throw new RuntimeException(
                "Error al listar categorías: " . $conexion->error
            );
        }

        return $categorias;
    }
}
