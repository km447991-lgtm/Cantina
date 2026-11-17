<?php
require_once __DIR__ . '/../persistencia/ProductoDao.php';
require_once __DIR__ . '/../persistencia/CategoriaDao.php';

class LogicaProducto
{
    private ProductoDao $productoDao;
    private CategoriaDao $categoriaDao;

    public function __construct()
    {
        $this->productoDao = new ProductoDao();
        $this->categoriaDao = new CategoriaDao();
    }

    public function listarCategorias(): array
    {
        $resultado = $this->categoriaDao->listarTodos('');
        $categorias = [];

        foreach ($resultado as $categoria) {
            $categorias[] = $categoria;
        }

        $resultado->free();
        return $categorias;
    }

    public function buscarProductos(string $filtro): array
    {
        $resultado = $this->productoDao->listarTodosLosProductos($filtro);
        $productos = [];

        foreach ($resultado as $producto) {
            $productos[] = $producto;
        }

        $resultado->free();
        return $productos;
    }

    public function obtenerProductoPorId(int $id)
    {
        return $this->productoDao->obtenerPorId($id);
    }

    public function agregarProducto(
        string $nombre,
        int $idCategoria,
        int $stock,
        int $precio,
        string $receta,
        string $rutaImagen
    ) {
        $producto = [
            "nombre_producto" => $nombre,
            "id_categoria" => $idCategoria,
            "stock" => $stock,
            "precio_producto" => $precio,
            "receta" => $receta,
            "imagen_producto" => $rutaImagen
        ];

        return $this->productoDao->crear($producto);
    }
}