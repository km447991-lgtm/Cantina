<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/Login-Registro.css">
</head>

<body>
    <main>
        <form action="../logica/logicaUsuario/registro_usuario.php" method="POST">
            <h1>Registro</h1>
            <div class="entryarea">
                <input type="text" name="nombre" required>
                <label for="Nombre" class="labelline">Nombre</label>
            </div>
            <div class="entryarea">
                <input type="text" name="nombre_usuario" required>
                <label for="Nombre" class="labelline">Nombre de Usuario</label>
            </div>
            <div class="entryarea">
                <input type="password" name="contrasena" required>
                <label for="Contraseña" class="labelline">Contraseña</label>
            </div>
            <button type="submit">Continuar</button>
            <a href="Login.php">Iniciar sesión</a>
        </form>
    </main>
</body>

</html>