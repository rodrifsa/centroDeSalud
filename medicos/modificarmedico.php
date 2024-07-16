<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>CENTRO DE SALUD - MODIFICAR MEDICO</title>
</head>

<body>

    <?php
    //header de la pagina

    include('../plantillas/header.php');

    echo "<center><u><h2>MODIFICAR MEDICO</h2></u>";

    $ID = $_REQUEST['ID'];

    $error="";

    if(isset($_REQUEST['error'])){
        $error=$_REQUEST['error'];
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
    $consulta ="SELECT id, cnombre_especialidad FROM especialidades";
    
    //realizar consulta a la tabla especielidades
    $especialidades = mysqli_query( $conexion, $consulta ) 
        or die("ERROR EN LA CONSULTA");

   

    ?>
    <center>
        <Form action="actualizarmedico.php" method="POST">

            <!-- id del medico- campo oculto -->
             <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
            <!-- nombre del medico -->
            <div class="input-form">
                <label>Nombre :</label>
                <input type="text" name="cnombre_medico" size="50" minlength="5" required
                    value="<?php echo $row['cnombre_medico']; ?>">
                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>
            </div>

            <!-- dni del medico -->
            <div class="input-form">
                <label>Dni :</label>
                <input type="number" name="ndni_medico" size="8" required
                value="<?php echo $row['ndni_medico']; ?>">

                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>
            </div>

            <!-- direccion del medico -->
            <div class="input-form">
                <label>Direci&oacute;n :</label>
                <input type="text" name="cdireccion_medico" size="60" required
                value="<?php echo $row['cdireccion_medico']; ?>">

                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>
            </div>

            <!-- telefono del medico -->
            <div class="input-form">
                <label>Tel&eacute;fono :</label>
                <input type="text" name="ctelefono_medico" size="50" required
                value="<?php echo $row['ctelefono_medico']; ?>">

                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>
            </div>

            <!-- especialidad del medico -->
            <div class="input-form">
                <label>Especialidad :</label>
                <select name="id_especialidad" value="<?php echo $row['id_especialidad']; ?>">

                    <?php
                    //recorrer la respuesta
                    while ($rowespecialidad = mysqli_fetch_assoc($especialidades)) {

                        echo "<option value='" . $rowespecialidad['id'] . "'" . ($row['id_especialidad'] == $rowespecialidad['id'] ? "SELECTED" : "") .">" . $rowespecialidad['cnombre_especialidad'] . "</option>";
                    }
                    ?>
                </select>


                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>
            </div>

            <!-- matricula del medico -->
            <div class="input-form">
                <label>Matricula :</label>
                <input type="number" name="nmatricula_medico" size="10" required
                value="<?php echo $row['nmatricula_medico']; ?>">

                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>
            </div>

            <!-- inicio de actividades -->
            <div class="input-form">
                <label>Fecha de Inicio :</label>
                <input type="date" name="dfecha_inicio"
                value="<?php echo $row['dfecha_inicio']; ?>">

                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>
            </div>

            <br>
            <div class="input-form">
                <input type="submit" value="Guardar">
            </div>
        </Form>

    </center>
</body>

</html>