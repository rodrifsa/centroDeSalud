<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>Centro De Salud - Nueva Obra Social</title>

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


    //preparo la consulta
    $consulta = "SELECT id, cnombre_obra_social FROM obra_social";


    //realizar consulta a la tabla de obras sociales
    $respuesta = mysqli_query($conexion, $consulta)
        or die("ERROR EN LA CONSULTA");

    ?>

    <div class="formulario">
        <Form action="guardarobra.php" method="POST">
            <h2>Nueva Obra Social</h2>

            <div class="input-form">

                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>
                <!-- nombre de la obra social -->
                <label>Nombre de la obra social:</label>
                <input type="text" class="campo" placeholder="Ingrese la obra social" name="cnombre_obra_social" size="20" minlength="5" required>


            </div>

            <div class="btn-input">
                <input type="submit" class="btn-nuevo nuevo" value="Agregar Obra Social">
                <a href="obras_sociales.php" class="btn-volver">Cancelar</a>
            </div>

        </Form>
    </div>

    <?php
    include('../plantillas/footer.php');
    ?>
</body>

</html>