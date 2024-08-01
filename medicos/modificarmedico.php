<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>Centro De Salud - Modificar Medico</title>

    <link rel="icon" type="ico" href="../images/favicon.ico" />
</head>

<body>

    <?php
    //header de la pagina

    include('../plantillas/header.php');

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


    //preparo la consulta 
    $consulta = "SELECT * FROM medicos WHERE id=" . $ID;;

    //realizar consulta a la tabla especielidades
    $respuesta = mysqli_query($conexion, $consulta)
        or die("ERROR EN LA CONSULTA");

    $row = mysqli_fetch_assoc($respuesta);

    //preparo la consulta de especialidades
    $consulta = "SELECT id, cnombre_especialidad FROM especialidades";

    //realizar consulta a la tabla especielidades
    $especialidades = mysqli_query($conexion, $consulta)
        or die("ERROR EN LA CONSULTA");



    ?>
    <div class="formulario">
        <Form action="actualizarmedico.php" method="POST">
            <h2>Modificar Medico</h2>
            
            <!-- id del medico- campo oculto -->
            <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">

            <div class="input-form">
                <!-- nombre del medico -->
                <label>Nombre :</label>
                <input type="text" name="cnombre_medico" class="campo" size="50" minlength="5" required value="<?php echo $row['cnombre_medico']; ?>">

                <!-- dni del medico -->
                <label>Dni :</label>
                <input type="number" name="ndni_medico" class="campo" size="8" required value="<?php echo $row['ndni_medico']; ?>">

                <!-- direccion del medico -->
                <label>Direci&oacute;n :</label>
                <input type="text" name="cdireccion_medico" class="campo" size="60" required value="<?php echo $row['cdireccion_medico']; ?>">

                <!-- telefono del medico -->
                <label>Tel&eacute;fono :</label>
                <input type="text" name="ctelefono_medico" class="campo" size="50" required value="<?php echo $row['ctelefono_medico']; ?>">

                <!-- especialidad del medico -->
                <label>Especialidad :</label>
                <select name="id_especialidad" class="campo" value="<?php echo $row['id_especialidad']; ?>">

                    <?php
                    //recorrer la respuesta
                    while ($rowespecialidad = mysqli_fetch_assoc($especialidades)) {

                        echo "<option value='" . $rowespecialidad['id'] . "'" . ($row['id_especialidad'] == $rowespecialidad['id'] ? "SELECTED" : "") . ">" . $rowespecialidad['cnombre_especialidad'] . "</option>";
                    }
                    ?>
                </select>

                <!-- matricula del medico -->
                <label>Matricula :</label>
                <input type="number" name="nmatricula_medico" class="campo" size="10" required value="<?php echo $row['nmatricula_medico']; ?>">

                <!-- inicio de actividades -->
                <label>Fecha de Inicio :</label>
                <input type="date" name="dfecha_inicio" class="campo" value="<?php echo $row['dfecha_inicio']; ?>">
            </div>
            <div class="btn-input">
                <input type="submit" class="btn-nuevo nuevo" value="Modificar Datos">
                <a href="medicos.php" class="btn-volver">Cancelar</a>
            </div>
        </Form>
    </div>

    <?php
    include('../plantillas/footer.php');
    ?>
    
</body>

</html>