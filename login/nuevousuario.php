<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>Centro De Salud - Nuevo Usuario</title>

    <link rel="icon" type="ico" href="../images/favicon.ico" />
</head>

<body>

    <?php

    $error = "";

    if (isset($_REQUEST['error'])) {
        $error = $_REQUEST['error'];
    }

    //header de la pagina

    include('../plantillas/header.php');

    //conectar a la base de datos
    $db_servidor = "127.0.0.1"; //es lo mismo que localhost
    $db_usuario = "root";
    $db_password = "";
    $db_basededatos = "centro_de_salud";

    $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
        or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");

    //preparo la consulta a la tabla usuarios
    $consultausers = "SELECT id, cnombre_usuario, ccontrasenia_usuario FROM usuarios";

    //realizar consulta a la tabla usuarios
    $usuarios = mysqli_query($conexion, $consultausers)
        or die("ERROR EN LA CONSULTA");

    ?>

    <nav class="nav-container">
        <ul>
            <li><a href="../home.php">Inicio</a></li>
            <li><a href="../login/nuevousuario.php">Crear Usuario</a></li>
            <li><a href="../medicos/medicos.php">M&eacute;dicos</a></li>
            <li><a href="../pacientes/pacientes.php">Pacientes</a></li>
            <li><a href="../turnos/turnos.php">Turnos</a></li>
            <li><a href="../consultorios/consultorios.php">Consultorios</a></li>
            <li><a href="../especialidades/especialidades.php">Especialidades</a></li>
            <li><a href="../obras_sociales/obras_sociales.php">Obras Sociales</a></li>
        </ul>
    </nav>

    <div class="page">
        <div class="container">

            <div class="left">
                <div class="login">Nuevo Usuario</div>
            </div>

            <div class="right">

                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>
                <form action="guardarusuario.php" class="form" method="post">
                    <label for="usuario">Usuario:</label>
                    <input type="text" name="cnombre_usuario" minlength="5" placeholder="Ingrese su usuario..." class="campo" required>
                    <label for="password">Contraseña:</label>
                    <input type="password" name="ccontrasenia_usuario" minlength="5" placeholder="Ingrese su contraseña..." class="campo" required>
                    <input type="submit" id="submit" value="Registrar">
                </form>
            </div>
        </div>
    </div>

    <?php
    include('../plantillas/footer.php');
    ?>


</body>

</html>