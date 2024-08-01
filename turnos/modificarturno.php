<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>Centro De Salud - Modificar Turno</title>

    <link rel="icon" type="ico" href="../images/favicon.ico" />
</head>

<body>

    <?php
    //header de la pagina

    include('../plantillas/header.php');

    //toma la id del link en la pagina turnos.php al tocar en "Modificar"
    $ID = $_REQUEST['ID'];

    $error = "";

    if (isset($_REQUEST['error'])) {
        $error = $_REQUEST['error'];
    }

    //conectar a la base de datos
    $db_servidor = "127.0.0.1"; //es lo mismo que localhost
    $db_usuario = "root";
    $db_password = "";
    $db_basededatos = "centro_de_salud";

    $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
        or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");


    //preparo la consulta a la tabla turnos con la id del link
    $consulta = "SELECT * FROM turnos WHERE id=" . $ID;;

    //realizar consulta a la tabla turnos
    $respuesta = mysqli_query($conexion, $consulta)
        or die("ERROR EN LA CONSULTA");

    $row = mysqli_fetch_assoc($respuesta);

    //preparo la consulta a la tabla obra_social
    $consultaobra = "SELECT id, cnombre_obra_social FROM obra_social";

    //realizar consulta a la tabla obra_social
    $obra_social = mysqli_query($conexion, $consultaobra)
        or die("ERROR EN LA CONSULTA");

    //preparo la consulta a la tabla pacientes
    $consultapacien = "SELECT id, cnombre_apellido_paciente FROM pacientes";

    //realizar consulta a la tabla pacientes
    $pacientes = mysqli_query($conexion, $consultapacien)
        or die("ERROR EN LA CONSULTA");


    //preparo la consulta a la tabla medicos
    $consultamed = "SELECT id, cnombre_medico FROM medicos";

    //realizar consulta a la tabla medicos
    $medicos = mysqli_query($conexion, $consultamed)
        or die("ERROR EN LA CONSULTA");

    //preparo la consulta a la tabla consultorios
    $consultaconsul = "SELECT id, cnombre_consultorio FROM consultorios";

    //realizar consulta a la tabla consultorios
    $consultorios = mysqli_query($conexion, $consultaconsul)
        or die("ERROR EN LA CONSULTA");



    ?>
    <div class="formulario">
        <Form action="actualizarturno.php" method="POST">
            <h2>Modificar Turno</h2>

            <!-- id del turno- campo oculto -->
            <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">

            <div class="input-form">

                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>

                <!-- Fecha Turno -->
                <label>Fecha del turno:</label>
                <input type="datetime-local" class="campo" name="fechaturno" required>


                <!-- nombre del paciente -->
                <label>Paciente:</label>
                <select name="nombrepaciente" class="campo">
                    <?php
                    while ($row = mysqli_fetch_assoc($pacientes)) {
                        echo "<option value='" . $row['id'] . "'>" . $row['cnombre_apellido_paciente'] . "</option>";
                    }

                    ?>
                </select>

                <!-- obra social paciente -->
                <label>Obra Social:</label>
                <select name="obrasocialpaciente" class="campo">
                    <?php
                    while ($row = mysqli_fetch_assoc($obra_social)) {
                        echo "<option value='" . $row['id'] . "'>" . $row['cnombre_obra_social'] . "</option>";
                    }

                    ?>
                </select>

                <!-- medico -->
                <label>Medico:</label>
                <select name="medicoturno" class="campo">
                    <?php
                    while ($row = mysqli_fetch_assoc($medicos)) {
                        echo "<option value='" . $row['id'] . "'>" . $row['cnombre_medico'] . "</option>";
                    }

                    ?>
                </select>

                <!-- consultorio -->
                <label>Consultorio:</label>
                <select name="consultorioturno" class="campo">
                    <?php
                    while ($row = mysqli_fetch_assoc($consultorios)) {
                        echo "<option value='" . $row['id'] . "'>" . $row['cnombre_consultorio'] . "</option>";
                    }

                    ?>
                </select>
            </div>

            <div class="btn-input">
                <input type="submit" class="btn-nuevo nuevo" value="Modificar datos">
                <a href="turnos.php" class="btn-volver">Cancelar</a>
            </div>

        </Form>
    </div>
    
    <?php
    include('../plantillas/footer.php');
    ?>
</body>

</html>