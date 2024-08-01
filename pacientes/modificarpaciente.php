<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>Centro De Salud - Modificar Paciente</title>

    <link rel="icon" type="ico" href="../images/favicon.ico" />
</head>

<body>

    <?php
    //header de la pagina

    include('../plantillas/header.php');


    //toma la id del link en la pagina pacientes.php al tocar en "Modificar"
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


    //preparo la consulta a la tabla pacientes con la id del link
    $consulta = "SELECT * FROM pacientes WHERE id=" . $ID;;

    //realizar consulta a la tabla pacientes
    $respuesta = mysqli_query($conexion, $consulta)
        or die("ERROR EN LA CONSULTA");

    $row = mysqli_fetch_assoc($respuesta);

    //preparo la consulta a la tabla obra_social
    $consulta = "SELECT id, cnombre_obra_social FROM obra_social";

    //realizar consulta a la tabla obra_social
    $obra_social = mysqli_query($conexion, $consulta)
        or die("ERROR EN LA CONSULTA");



    ?>
    <div class="formulario">
        <Form action="actualizarpaciente.php" method="POST">
            <h2>Modificar Paciente</h2>
            <!-- id del paciente- campo oculto -->
            <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
            
            <div class="input-form">
                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>

                <!-- nombre del paciente -->
                <label>Nombre :</label>
                <input type="text" name="cnombre_apellido_paciente" class="campo" size="50" minlength="5" required value="<?php echo $row['cnombre_apellido_paciente']; ?>">


                <!-- dni del paciente -->
                <label>Dni :</label>
                <input type="number" name="ndni_paciente" class="campo" size="10" required value="<?php echo $row['ndni_paciente']; ?>">

                <!-- direccion del paciente -->
                <label>Direci&oacute;n :</label>
                <input type="text" name="cdireccion_paciente" class="campo" size="60" required value="<?php echo $row['cdireccion_paciente']; ?>">

                <!-- telefono del paciente -->
                <label>Tel&eacute;fono :</label>
                <input type="text" name="ctel_paciente" class="campo" size="50" required value="<?php echo $row['ctel_paciente']; ?>">

                <!-- Genero del paciente -->
                <label for="">Genero:</label>
                <select name="csexo_paciente" class="campo" id="">

                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otros">Otros</option>
                </select>

                <!-- fecha nacimiento paciente -->
                <label>Fecha de nacimiento:</label>
                <input type="date" name="dfecha_nac_paciente" class="campo" value="<?php echo $row['dfecha_nac_paciente']; ?>">

                <!-- Obra social Paciente -->
                <label>Obra social :</label>
                <select name="id_obra_sociales" class="campo">

                    <?php
                    //recorrer la respuesta
                    while ($rowobra_social = mysqli_fetch_assoc($obra_social))

                        echo "<option value='" . $rowobra_social['id'] . "'" . ($row['id'] == $rowobra_social['id'] ? "SELECTED" : "") . ">" . $rowobra_social['cnombre_obra_social'] . "</option>"
                    ?>
                    
                </select>

            </div>
            <div class="btn-input">
                <input type="submit" class="btn-nuevo nuevo" value="Modificar Datos">
                <a href="pacientes.php" class="btn-volver">Cancelar</a>
            </div>

        </Form>
    </div>

    <?php
    include('../plantillas/footer.php');
    ?>
</body>

</html>