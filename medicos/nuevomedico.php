<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>Centro De Salud - Nuevo Medico</title>

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
    $consulta = "SELECT id, cnombre_especialidad FROM especialidades";

    //realizar consulta a la tabla especielidades
    $respuesta = mysqli_query($conexion, $consulta)
        or die("ERROR EN LA CONSULTA");

    ?>

    <div class="formulario">
        <Form action="guardarmedico.php" method="POST">
            <h2>Nuevo Medico</h2>
            <div class="input-form">

                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>

                <label>Nombre:</label>
                <input type="text" placeholder="Ingrese su nombre..." size="50" name="cnombre_medico" minlength="5" class="campo" required>

                <label>Dni:</label>
                <input type="number" placeholder="Ingrese su dni..." size="8" name="ndni_medico" class="campo" required>

                <label>Direcci&oacute;n:</label>
                <input type="text" placeholder="Ingrese su direccion..." size="60" name="cdireccion_medico" class="campo" required>

                <label>Tel&eacute;fono:</label>
                <input type="text" placeholder="Ingrese su telefono..." size="50" name="ctelefono_medico" class="campo" required>

                <label>Especialidad:</label>
                <select name="id_especialidad" class="campo">

                    <?php
                    //recorrer la respuesta
                    while ($row = mysqli_fetch_assoc($respuesta)) {

                        echo "<option value='" . $row['id'] . "'>" . $row['cnombre_especialidad'] . "</option>";
                    }
                    ?>
                </select>

                <label>Matricula:</label>
                <input type="number" placeholder="Ingrese su matricula..." size="10" name="nmatricula_medico" size="10" required class="campo">

                <label>Fecha de Inicio:</label>
                <input type="date" name="dfecha_inicio" class="campo">

            </div>
            <div class="btn-input">
                <input type="submit" class="btn-nuevo nuevo" value="Agregar Medico">
                <a href="medicos.php" class="btn-volver">Cancelar</a>
            </div>
        </Form>

    </div>

    <?php
    include('../plantillas/footer.php');
    ?>

</body>

</html>