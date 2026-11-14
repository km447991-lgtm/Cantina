<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: Login.php');
    exit;
}

require __DIR__ . '/../config/conexion.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $texto = trim($_POST['sugerencia'] ?? '');

    if ($titulo === '' || preg_match('/^.{1,60}$/us', $titulo) !== 1) {
        $error = 'El título es obligatorio y no puede superar los 60 caracteres.';
    } elseif ($texto === '') {
        $error = 'Escribe tu sugerencia antes de enviarla.';
    } else {
        $transaccionIniciada = false;
        try {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conexion->set_charset('utf8mb4');

            $consultaUsuario = $conexion->prepare(
                'SELECT id_Usuario FROM usuarios WHERE nombre = ? LIMIT 1'
            );
            $consultaUsuario->bind_param('s', $_SESSION['usuario']);
            $consultaUsuario->execute();
            $consultaUsuario->bind_result($idCliente);
            $usuarioEncontrado = $consultaUsuario->fetch();
            $consultaUsuario->close();

            if (!$usuarioEncontrado) {
                $error = 'No se pudo identificar tu usuario. Vuelve a iniciar sesión.';
            } else {
                $conexion->begin_transaction();
                $transaccionIniciada = true;

                $consultaCliente = $conexion->prepare(
                    'SELECT id_cliente FROM cliente WHERE id_cliente = ?'
                );
                $consultaCliente->bind_param('i', $idCliente);
                $consultaCliente->execute();
                $consultaCliente->store_result();
                $clienteExiste = $consultaCliente->num_rows > 0;
                $consultaCliente->close();

                if (!$clienteExiste) {
                    $crearCliente = $conexion->prepare(
                        'INSERT INTO cliente (id_cliente, saldo) VALUES (?, 0)'
                    );
                    $crearCliente->bind_param('i', $idCliente);
                    $crearCliente->execute();
                    $crearCliente->close();
                }

                $fecha = date('Y-m-d H:i:s');
                $guardarSugerencia = $conexion->prepare(
                    'INSERT INTO sugerencia (fk_cliente, texto, fecha, titulo) VALUES (?, ?, ?, ?)'
                );
                $guardarSugerencia->bind_param('isss', $idCliente, $texto, $fecha, $titulo);
                $guardarSugerencia->execute();
                $guardarSugerencia->close();
                $conexion->commit();
                $transaccionIniciada = false;

                header('Location: Sugerencias.php?enviado=1');
                exit;
            }
        } catch (mysqli_sql_exception $exception) {
            if ($transaccionIniciada) {
                $conexion->rollback();
            }
            error_log('Error al guardar sugerencia: ' . $exception->getMessage());
            $error = 'No se pudo guardar la sugerencia. Inténtalo nuevamente.';
        }
    }
}

$enviado = isset($_GET['enviado']) && $_GET['enviado'] === '1';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="css/Sugerencias.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugerencias</title>
    <link rel="stylesheet" href="css/DarkWhite.css">
    <link rel="stylesheet" href="css/index.css">
<style>
    body {
        margin: 0;
        min-height: 100vh;
    }

    .caja-sugerencias {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 7px 5px 20px 20px rgba(0, 0, 0, 0.15);
        background: #fff;
        width: 90%;
        max-width: 501px;
        padding: 24px;
        border-radius: 12px;
    }

    .h1 {
        margin-top: 0;
        text-align: center;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #444;
    }

    textarea {
        width: 100%;
        min-height: 140px;
        resize: vertical;
        padding: 12px;
        border-radius: 8px;
        box-sizing: border-box;
        font-size: 16px;
    }

    button {
      width: 100%;
      height: 40px;
      border: solid 1px black   ;
      border-radius: 5px;
      background: #4caf50;
      color: white;
      font-size: 17px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 8px;
      transition: 0.2s;
      box-shadow: 7px 5px 20px 2.7px rgba(76, 175, 80)
    }

    button:hover {
        background: rgb(76, 175, 80);
    }

    .menusugerencias {
        position: fixed;
        top: 0;
        left: 0;
        height: 90px;
        width: auto;
    }
    .titulosugg {
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.35);
    }
    .menu-sugerencias {
        background-color: white;    
    }
        @import url(
            'https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            font-family: "Raleway", sans-serif
        }
</style>
</head>

<body>
    <img src="Assets/linea.png" class="sidebar-toggle" alt="Menu">
        <aside class="sidebar">
            <ul class="links">
                <li>
                    <section class="perfil-contenedor">
                        <button class="perfil"><a href="Perfil.php"></a></button>
                        <p class="perfil-datos">
                            <span class="perfil-texto">Usuario</span>
                            <span class="perfil-dinero"><a href="Dinero.php">$0.00</a></span>
                        </p>
                    </section>
                </li>
                <hr class="linea">
                <li>
                    <a href="Historial.php"><img src="Assets/historial-de-pedidos.png" class="iconos"
                            alt="Historial de compras">Historial</a>
                </li>
                <li>
                    <a href="Encuesta.php"><img src="Assets/encuesta.png" class="iconos" alt="Encuesta">Encuesta</a>
                </li>
                <li>
                    <a href="Sugerencias.php"><img src="Assets/carta.png" class="iconos"
                            alt="Sugerencias">Sugerencias</a>
                </li>
                <li>
                    <label for="tocar" id="modo">
                        <img id="icono-modo" src="Assets/modo-diurno.png" class="iconos" alt="Modo">
                        <span id="texto-modo">Modo claro</span>
                    </label>
                    <input type="checkbox" id="tocar">
                </li>
                <li>
                    <a href="Admin.php"><img src="Assets/admin.png" class="iconos" alt="Menu admin">Menu admin</a>
                </li>
            </ul>
        </aside>
        
    <div class="caja-sugerencias">
        <h1>Sugerencias</h1>

        <?php if ($enviado): ?>
            <p role="status">Tu sugerencia se guardó correctamente.</p>
        <?php endif; ?>
        <?php if ($error !== ''): ?>
            <p role="alert"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>

        <form method="post" action="Sugerencias.php">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" maxlength="60" required>
            <h2 class="sugerencia-info">Escribe tu sugerencia:</h2>
            <textarea id="sugerencia" name="sugerencia"
                placeholder="Escribe aquí tu comentario o sugerencia..." required></textarea>
            <button type="submit">Enviar</button>
        </form>
         
    </div>
      <script src="js/index.js"></script>
    <script src="js/DarkWhite.js"></script>
</body>

</html>