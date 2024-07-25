<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>CENTRO DE SALUD - NUEVO PACIENTE</title>
</head>

<body>

    <?php

    $error="";

    if(isset($_REQUEST['error'])){
        $error=$_REQUEST['error'];
    }

    //header de la pagina

    include('../plantillas/header.php');

    echo "<center><u><h2>NUEVO PACIENTE</h2></u>";

    //conectar a la base de datos
    $db_servidor ="127.0.0.1"; //es lo mismo que localhost
    $db_usuario = "root";
    $db_password= "";
    $db_basededatos ="centro_de_salud";

    $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
        or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");


    //preparo la consulta a la tabla pacientes
   // $consulta ="SELECT pacientes.id, pacientes.cnombre_apellido_paciente, pacientes.idobra_sociales, obra_social.cnombre_obra_social
    //FROM pacientes LEFT JOIN obra_social ON pacientes.idobra_sociales = obra_social.id";

    
    //realizar consulta a la tabla pacientes
    //$respuesta = mysqli_query( $conexion, $consulta ) 
     //   or die("ERROR EN LA CONSULTA");

    //preparo la consulta a la tabla obra_social
    $consultaobra ="SELECT id, cnombre_obra_social FROM obra_social";
    
    //realizar consulta a la tabla obra_social
    $obra_social = mysqli_query( $conexion, $consultaobra ) 
        or die("ERROR EN LA CONSULTA");

    ?>
    <center>
        <Form action="guardarpaciente.php" method="POST">

            <!-- nombre del paciente -->
            <div class="input-form">
                <label>Nombre y Apellido:</label>
                <input type="text" name="cnombre_apellido_paciente" size="50" minlength="5" required>

                <?php 
                    if($error<>""){
                        echo" <br><span style='color:red'>$error</span>";
                    }
                ?>
            </div>

           <!-- dni del paciente --> 
            <div class="input-form">
                <label>Dni :</label>
                <input type="number" name="ndni_paciente" size="8" required>

                <?php 
                    if($error<>""){
                        echo" <br><span style='color:red'>$error</span>";
                    }
                ?>
            </div>

            <!-- direccion del paciente -->
            <div class="input-form">
                <label>Direci&oacute;n :</label>
                <input type="text" name="cdireccion_paciente" size="60" required >

                <?php 
                    if($error<>""){
                        echo" <br><span style='color:red'>$error</span>";
                    }
                ?>
            </div>

            <!-- telefono del paciente -->
            <div class="input-form">
                <label>Tel&eacute;fono :</label>
                <input type="text" name="ctel_paciente" size="50" required>

                <?php 
                    if($error<>""){
                        echo" <br><span style='color:red'>$error</span>";
                    }
                ?>
            </div>

            <!-- Genero del paciente --> 
            <div class="input-form">
                <!-- <label>Sexo :</label>

                <label> <input type="checkbox" id="cbox1" value="Masculino" /> Masculino </label>
                <label> <input type="checkbox" id="cbox2" value="Femenino" /> Femenino </label>
                <label> <input type="checkbox" id="cbox3" value="Otro" /> Otro </label> -->
                <label>Sexo :</label>
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

            <!-- Fecha de nacimiento del paciente --> 
            <div class="input-form">
                <label>Fecha de nacimiento:</label>
                <input type="date" name="dfecha_nac_paciente">
               
                <?php 
                    if($error<>""){
                        echo" <br><span style='color:red'>$error</span>";
                    }
                ?>
            </div>

            <!-- Obra social del paciente --> 
            <div class="input-form">
                <label>Obra social :</label>
                <select name="id_obra_sociales">
                
                <?php 
                    //recorrer la respuesta
                    while($row = mysqli_fetch_assoc($obra_social)){

                            echo "<option value='" . $row['id'] . "'>" . $row['cnombre_obra_social'] ."</option>"; 
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
        <a href="pacientes.php">
        <button>Cancelar</button>
        </a>


    </center>
</body>

</html>