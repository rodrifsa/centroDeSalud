<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>CENTRO DE SALUD - MODIFICAR PACIENTE</title>
</head>

<body>

    <?php
    //header de la pagina

    include('../plantillas/header.php');

    echo "<center><u><h2>MODIFICAR PACIENTE</h2></u>";

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
    $consulta = "SELECT * FROM pacientes WHERE id=" . $ID;;

    //realizar consulta a la tabla pacientes
    $respuesta = mysqli_query($conexion, $consulta)
        or die("ERROR EN LA CONSULTA");

    $row = mysqli_fetch_assoc($respuesta);

    //preparo la consulta de obras sociales
    $consulta ="SELECT id, cnombre_obra_social FROM obra_social";
    
    //realizar consulta a la tabla obra_social
    $obra_social = mysqli_query( $conexion, $consulta ) 
        or die("ERROR EN LA CONSULTA");

   

    ?>
    <center>
        <Form action="actualizarpaciente.php" method="POST">

            <!-- id del paciente- campo oculto -->
             <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
            <!-- nombre del paciente -->
            <div class="input-form">
                <label>Nombre :</label>
                <input type="text" name="cnombre_apellido_paciente" size="50" minlength="5" required
                    value="<?php echo $row['cnombre_apellido_paciente']; ?>">
                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>
            </div>

            <!-- dni del paciente -->
            <div class="input-form">
                <label>Dni :</label>
                <input type="number" name="ndni_paciente" size="10" required
                value="<?php echo $row['ndni_paciente']; ?>">

                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>
            </div>

            <!-- direccion del paciente -->
            <div class="input-form">
                <label>Direci&oacute;n :</label>
                <input type="text" name="cdireccion_paciente" size="60" required
                value="<?php echo $row['cdireccion_paciente']; ?>">

                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>
            </div>

            <!-- telefono del paciente -->
            <div class="input-form">
                <label>Tel&eacute;fono :</label>
                <input type="text" name="ctel_paciente" size="50" required
                value="<?php echo $row['ctel_paciente']; ?>">

                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>
            </div>

            <!-- Genero del paciente -->
            <div class="input-form">
                <label for="">Genero:</label>
                <select name="csexo_paciente" id="">
                    
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otros">Otros</option>
                </select>

              
                <?php 
                    if($error<>""){
                        echo" <br><span style='color:red'>$error</span>";
                    }
                ?>
            </div>

            <!-- fecha nacimiento paciente -->
            <div class="input-form">
                <label>Fecha de nacimiento:</label>
                <input type="date" name="dfecha_nac_paciente"
                value="<?php echo $row['dfecha_nac_paciente']; ?>">
               
                <?php 
                    if($error<>""){
                        echo" <br><span style='color:red'>$error</span>";
                    }
                ?>
            </div>

            <!-- Obra social Paciente -->
            <div class="input-form">
                <label>Obra social :</label>
                <select name="id_obra_sociales"
                <?php 
                

                ?> 

                >
                
                <?php 
                    //recorrer la respuesta
                    while($rowobra_social = mysqli_fetch_assoc($obra_social))

                        echo "<option value='" . $rowobra_social['id'] . "'" . ($row['id'] == $rowobra_social['id'] ? "SELECTED" : "") .">" . $rowobra_social['cnombre_obra_social'] . "</option>"
                   //         echo "<option value='" . $row['id'] . "'>" . $row['cnombre_obra_social'] ."</option>"; 
                    //}    echo "value = " . $row['cnombre_obra_social'];
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
        <a href="pacientes.php">
        <button>Cancelar</button>
        </a>
    </center>
</body>

</html>