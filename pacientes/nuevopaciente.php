<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>Centro De Salud - Nuevo Paciente</title>

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


    //preparo la consulta a la tabla pacientes
    // $consulta ="SELECT pacientes.id, pacientes.cnombre_apellido_paciente, pacientes.idobra_sociales, obra_social.cnombre_obra_social
    //FROM pacientes LEFT JOIN obra_social ON pacientes.idobra_sociales = obra_social.id";


    //realizar consulta a la tabla pacientes
    //$respuesta = mysqli_query( $conexion, $consulta ) 
    //   or die("ERROR EN LA CONSULTA");

    //preparo la consulta a la tabla obra_social
    $consultaobra = "SELECT id, cnombre_obra_social FROM obra_social";

    //realizar consulta a la tabla obra_social
    $obra_social = mysqli_query($conexion, $consultaobra)
        or die("ERROR EN LA CONSULTA");

    ?>
    <div class="formulario">
        <Form action="guardarpaciente.php" method="POST">
            <h2>Nuevo Paciente</h2>
            
            <div class="input-form">

                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>

                <!-- nombre del paciente -->
                <label>Nombre y Apellido:</label>
                <input type="text" name="cnombre_apellido_paciente" placeholder="Ingrese su nombre y apellido..." class="campo" size="50" minlength="5" required>

                <!-- dni del paciente -->
                <label>Dni :</label>
                <input type="number" name="ndni_paciente" placeholder="Ingrese su dni..." class="campo" size="8" required>

                <!-- direccion del paciente -->
                <label>Direci&oacute;n :</label>
                <input type="text" name="cdireccion_paciente" placeholder="Ingrese su direccion..." class="campo" size="60" required>

                <!-- telefono del paciente -->
                <label>Tel&eacute;fono :</label>
                <input type="text" name="ctel_paciente" placeholder="Ingrese su telefono..." class="campo" size="50" required>

                <!-- Genero del paciente -->
                <label>Sexo :</label>
                <select name="csexo_paciente" class="campo" id="">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otros">Otros</option>
                </select>

                <!-- Fecha de nacimiento del paciente -->
                <label>Fecha de nacimiento:</label>
                <input type="date" class="campo" name="dfecha_nac_paciente">

                <!-- Obra social del paciente -->
                <label>Obra social :</label>
                <select name="id_obra_sociales" class="campo">

                    <?php
                    //recorrer la respuesta
                    while ($row = mysqli_fetch_assoc($obra_social)) {

                        echo "<option value='" . $row['id'] . "'>" . $row['cnombre_obra_social'] . "</option>";
                    }
                    ?>
                </select>

            </div>

            <div class="btn-input">
                <input type="submit" class="btn-nuevo nuevo" value="Agregar Paciente">
                <a href="pacientes.php" class="btn-volver">Cancelar</a>
            </div>
        </Form>
    </div>

    <?php
    include('../plantillas/footer.php');
    ?>
</body>

</html>