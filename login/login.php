<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Centro De Salud - Login</title>

    <link rel="icon" type="ico" href="../images/favicon.ico" />
</head>

<body>

    <?php
    include('../plantillas/header_login.php');
    ?>

    <div class="page">
        <div class="container">

            <div class="left">
                <div class="login">Inicio de Sesion</div>

                <?php
                if (isset($_REQUEST['message'])) {
                    $message = htmlspecialchars($_REQUEST['message']);
                    echo "<p style='color: green; padding:10px; font-size: 20px;'>" . $message . "</p>";
                }
                ?>

            </div>

            <div class="right">
                <!-- Mostrar mensaje de éxito -->

                <form action="verificarlogin.php" class="form" method="post">
                    <label for="usuario">Usuario:</label>
                    <input type="text" placeholder="Ingrese su usuario..." name="usuario" class="campo" required>
                    <label for="password">Contraseña:</label>
                    <input type="password" placeholder="Ingrese su contraseña..." name="pass" class="campo" required>
                    <input type="submit" id="submit" value="Iniciar Sesion">
                    <div>
                        <a href="../index.php" class="btn-volver">Volver al Inicio</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include('../plantillas/footer.php');
    ?>
</body>

</html>