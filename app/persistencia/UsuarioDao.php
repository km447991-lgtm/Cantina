<?php

require_once __DIR__ . '/../../utils/Conexion.php';

class UsuarioDao
{
    public function buscarPorNombre(string $nombre): ?array
    {
        return $this->buscarPorCampo('nombre', $nombre);
    }

    public function buscarPorNombreUsuario(string $nombreUsuario): ?array
    {
        return $this->buscarPorCampo('nombre_usuario', $nombreUsuario);
    }

    private function buscarPorCampo(string $campo, string $valor): ?array
    {
        global $conexion;

        if (!in_array($campo, ['nombre', 'nombre_usuario'], true)) {
            throw new InvalidArgumentException("Campo de búsqueda no permitido.");
        }

        $sql = "SELECT id_Usuario, nombre, nombre_usuario, contrasena
                FROM usuarios
                WHERE {$campo} = ?
                LIMIT 1";
        $stmt = $conexion->prepare($sql);
        if ($stmt === false) {
            throw new RuntimeException(
                "Error al preparar la búsqueda de usuario: " . $conexion->error
            );
        }

        if (!$stmt->bind_param("s", $valor) || !$stmt->execute()) {
            $error = $stmt->error;
            $stmt->close();
            throw new RuntimeException("Error al buscar el usuario: " . $error);
        }

        $resultado = $stmt->get_result();
        if ($resultado === false) {
            $error = $stmt->error;
            $stmt->close();
            throw new RuntimeException("Error al obtener el usuario: " . $error);
        }

        $usuario = $resultado->fetch_assoc() ?: null;
        $resultado->free();
        $stmt->close();

        return $usuario;
    }

    public function crear(array $usuario): bool
    {
        global $conexion;

        $sql = "INSERT INTO usuarios (nombre, nombre_usuario, contrasena)
                VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        if ($stmt === false) {
            throw new RuntimeException(
                "Error al preparar el registro: " . $conexion->error
            );
        }

        $nombre = $usuario["nombre"];
        $nombreUsuario = $usuario["nombre_usuario"];
        $contrasena = $usuario["contrasena"];

        if (!$stmt->bind_param("sss", $nombre, $nombreUsuario, $contrasena)) {
            $error = $stmt->error;
            $stmt->close();
            throw new RuntimeException(
                "Error al asociar los datos del usuario: " . $error
            );
        }

        if (!$stmt->execute()) {
            $error = $stmt->error;
            $stmt->close();
            throw new RuntimeException("Error al registrar el usuario: " . $error);
        }

        $stmt->close();
        return true;
    }

    public function actualizarContrasena(int $idUsuario, string $contrasena): bool
    {
        global $conexion;

        $sql = "UPDATE usuarios SET contrasena = ? WHERE id_Usuario = ?";
        $stmt = $conexion->prepare($sql);
        if ($stmt === false) {
            throw new RuntimeException(
                "Error al preparar la actualización de contraseña: " . $conexion->error
            );
        }

        if (!$stmt->bind_param("si", $contrasena, $idUsuario)) {
            $error = $stmt->error;
            $stmt->close();
            throw new RuntimeException(
                "Error al asociar la nueva contraseña: " . $error
            );
        }

        if (!$stmt->execute()) {
            $error = $stmt->error;
            $stmt->close();
            throw new RuntimeException(
                "Error al actualizar la contraseña: " . $error
            );
        }

        $stmt->close();
        return true;
    }
}
