<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/Login-Registro.css">
</head>

<body>
    <main>
        <form action="../logica/logicaUsuario/login_usuario.php" method="POST">
            <h1>Iniciar Sesión</h1>
            <div class="entryarea">
                <input type="text" name="nombre" required>
                <label for="nombre" class="labelline">Nombre</label>
            </div>
            <div class="entryarea">
                <input type="password" name="contrasena" required>
                <label for="Contraseña" class="labelline">Contraseña</label>
            </div>
            <button type="submit">Iniciar seción</button>
            <a href="Registro.php">Registrar usuario</a>
        </form>
    </main>
</body>

</html>