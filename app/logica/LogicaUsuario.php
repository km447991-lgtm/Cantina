<?php

require_once __DIR__ . '/../persistencia/UsuarioDao.php';

class LogicaUsuario
{
    private UsuarioDao $usuarioDao;

    public function __construct()
    {
        $this->usuarioDao = new UsuarioDao();
    }

    public function login(string $nombre, string $contrasena)
    {
        $usuario = $this->usuarioDao->buscarPorNombre(trim($nombre));
        if ($usuario === null) {
            return false;
        }

        $hashGuardado = $usuario['contrasena'];
        $esHashAnterior = preg_match('/\A[a-f0-9]{128}\z/i', $hashGuardado) === 1;

        if ($esHashAnterior) {
            if (!hash_equals($hashGuardado, hash('sha512', $contrasena))) {
                return false;
            }

            $nuevoHash = password_hash($contrasena, PASSWORD_DEFAULT);
            if ($nuevoHash === false) {
                throw new RuntimeException("No se pudo proteger la contraseña.");
            }

            $this->usuarioDao->actualizarContrasena(
                (int) $usuario['id_Usuario'],
                $nuevoHash
            );
        } elseif (!password_verify($contrasena, $hashGuardado)) {
            return false;
        } elseif (password_needs_rehash($hashGuardado, PASSWORD_DEFAULT)) {
            $nuevoHash = password_hash($contrasena, PASSWORD_DEFAULT);
            if ($nuevoHash === false) {
                throw new RuntimeException("No se pudo actualizar la contraseña.");
            }

            $this->usuarioDao->actualizarContrasena(
                (int) $usuario['id_Usuario'],
                $nuevoHash
            );
        }

        return $usuario;
    }

    public function registro(
        string $nombre,
        string $nombreUsuario,
        string $contrasena
    ): bool {
        $nombre = trim($nombre);
        $nombreUsuario = trim($nombreUsuario);

        if ($nombre === '' || $nombreUsuario === '' || $contrasena === '') {
            throw new RuntimeException("Completa todos los campos.");
        }

        if ($this->usuarioDao->buscarPorNombre($nombre) !== null) {
            throw new RuntimeException("El nombre ya está en uso.");
        }

        if ($this->usuarioDao->buscarPorNombreUsuario($nombreUsuario) !== null) {
            throw new RuntimeException("El nombre de usuario ya está en uso.");
        }

        $hash = password_hash($contrasena, PASSWORD_DEFAULT);
        if ($hash === false) {
            throw new RuntimeException("No se pudo proteger la contraseña.");
        }

        return $this->usuarioDao->crear([
            'nombre' => $nombre,
            'nombre_usuario' => $nombreUsuario,
            'contrasena' => $hash
        ]);
    }
}
