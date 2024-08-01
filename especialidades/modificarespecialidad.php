<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>Centro De Salud - Modificar Especialidad</title>

    <link rel="icon" type="ico" href="../images/favicon.ico" />
</head>

<body>

    <?php
    //header de la pagina

    include('../plantillas/header.php');

    $ID = $_REQUEST['ID'];

    //conectar a la base de datos
    $db_servidor = "127.0.0.1"; //es lo mismo que localhost
    $db_usuario = "root";
    $db_password = "";
    $db_basededatos = "centro_de_salud";

    $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
        or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");


    //preparo la consulta 
    $consulta = "SELECT id, cnombre_especialidad FROM especialidades WHERE id=" . $ID;;

    //realizar consulta a la tabla especielidades
    $respuesta = mysqli_query($conexion, $consulta)
        or die("ERROR EN LA CONSULTA");

    $row = mysqli_fetch_assoc($respuesta);

    ?>
    <div class="formulario">
        <Form action="actualizarespecialidad.php" method="POST">
            <h2>Modificar Especialidad</h2>
            <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">

            <div class="input-form">
                <label>Nombre :</label>
                <input type="text" class="campo" name="cnombre_especialidad" value="<?php echo $row['cnombre_especialidad']; ?>">
            </div>

            <div class="btn-input">
                <input type="submit" class="btn-nuevo nuevo" value="Modificar Datos">
                <a href="especialidades.php" class="btn-volver">Cancelar</a>
            </div>

        </Form>
    </div>

    <?php
    include('../plantillas/footer.php');
    ?>

</body>

</html>