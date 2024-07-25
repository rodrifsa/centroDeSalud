<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>CENTRO DE SALUD - NUEVO TURNO</title>
</head>

<body>

    <?php

    $error="";

    if(isset($_REQUEST['error'])){
        $error=$_REQUEST['error'];
    }

    //header de la pagina

    include('../plantillas/header.php');

    echo "<center><u><h2>NUEVO TURNO</h2></u>";

    //conectar a la base de datos
    $db_servidor ="127.0.0.1"; //es lo mismo que localhost
    $db_usuario = "root";
    $db_password= "";
    $db_basededatos ="centro_de_salud";

    $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
        or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");


    //preparo la consulta a la tabla turnos MODIFICAR
    //$consulta ="SELECT * FROM turnos ";

    
    //realizar consulta a la tabla turnos
    //$respuesta = mysqli_query( $conexion, $consulta ) 
    //    or die("ERROR EN LA CONSULTA");

    //preparo la consulta a la tabla obra_social
    $consultaobra ="SELECT id, cnombre_obra_social FROM obra_social";
    
    //realizar consulta a la tabla obra_social
    $obra_social = mysqli_query( $conexion, $consultaobra ) 
        or die("ERROR EN LA CONSULTA");

    //preparo la consulta a la tabla pacientes
    $consultapacien ="SELECT id, cnombre_apellido_paciente FROM pacientes";
    
    //realizar consulta a la tabla pacientes
    $pacientes = mysqli_query( $conexion, $consultapacien ) 
        or die("ERROR EN LA CONSULTA");

    
    //preparo la consulta a la tabla medicos
    $consultamed ="SELECT id, cnombre_medico FROM medicos";
    
    //realizar consulta a la tabla medicos
    $medicos = mysqli_query( $conexion, $consultamed ) 
        or die("ERROR EN LA CONSULTA");

    //preparo la consulta a la tabla consultorios
    $consultaconsul ="SELECT id, cnombre_consultorio FROM consultorios";
    
    //realizar consulta a la tabla consultorios
    $consultorios = mysqli_query( $conexion, $consultaconsul ) 
        or die("ERROR EN LA CONSULTA");

    ?>
    <center>
        <Form action="guardarturno.php" method="POST">

            <!-- Fecha Turno -->
            <div class="input-form">
                <label>Fecha del turno:</label>
                <input type="datetime-local" name="fechaturno" required>

                <?php 
                    if($error<>""){
                        echo" <br><span style='color:red'>$error</span>";
                    }
                ?>
            </div>

           <!-- nombre del paciente --> 
            <div class="input-form">
                <label>Paciente:</label>
                <select name="nombrepaciente">

                    <?php
                    while($row = mysqli_fetch_assoc($pacientes)){
                        echo "<option value='" . $row['id'] . "'>" . $row ['cnombre_apellido_paciente'] ."</option>";
                    }

                    ?>


                </select>

                <?php 
                    if($error<>""){
                        echo" <br><span style='color:red'>$error</span>";
                    }
                ?>
            </div>

            <!-- obra social paciente -->
            <div class="input-form">
            <label>Obra Social:</label>
                <select name="obrasocialpaciente">

                    <?php
                    while($row = mysqli_fetch_assoc($obra_social)){
                        echo "<option value='" . $row['id'] . "'>" . $row ['cnombre_obra_social'] ."</option>";
                    }

                    ?>


                </select>
            </div>

            <!-- medico -->
            <div class="input-form">
            <label>Medico:</label>
                <select name="medicoturno">

                    <?php
                    while($row = mysqli_fetch_assoc($medicos)){
                        echo "<option value='" . $row['id'] . "'>" . $row ['cnombre_medico'] ."</option>";
                    }

                    ?>


                </select>   
            </div>

            <!-- consultorio --> 
            <div class="input-form">
                <label>Consultorio:</label>
                <select name="consultorioturno">

                    <?php
                    while($row = mysqli_fetch_assoc($consultorios)){
                        echo "<option value='" . $row['id'] . "'>" . $row ['cnombre_consultorio'] ."</option>";
                    }

                    ?>


                </select>
                <?php 
                    if($error<>""){
                        echo" <br><span style='color:red'>$error</span>";
                    }
                ?>
            </div>

            <br>
            <div class="input-form">
                <input type="submit" value="Guardar">
            </div>
        </Form>
        <br>
        <a href="turnos.php">
        <button>Cancelar</button>
        </a>

        <br>
        <br>
        <br>
        <h3>Recuerde que para dar un turno, el paciente debe estar en el sistema antes.</h3>
        <a href="../pacientes/nuevopaciente.php"><input type="submit" value="Añadir un nuevo paciente"></a>

    </center>
</body>

</html>