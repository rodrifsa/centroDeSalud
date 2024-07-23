<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>CENTRO DE SALUD - NUEVA OBRA SOCIAL</title>
</head>

<body>

    <?php

    $error="";

    if(isset($_REQUEST['error'])){
        $error=$_REQUEST['error'];
    }

    //header de la pagina

    include('../plantillas/header.php');

    echo "<center><u><h2>NUEVA OBRA SOCIAL</h2></u>";

    //conectar a la base de datos
    $db_servidor ="127.0.0.1"; //es lo mismo que localhost
    $db_usuario = "root";
    $db_password= "";
    $db_basededatos ="centro_de_salud";

    $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
        or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");


    //preparo la consulta
    $consulta ="SELECT id, cnombre_obra_social FROM obra_social";

    
    //realizar consulta a la tabla de obras sociales
    $respuesta = mysqli_query( $conexion, $consulta ) 
        or die("ERROR EN LA CONSULTA");

    ?>
    <center>
        <Form action="guardarobra.php" method="POST">

            <!-- nombre de la obra social -->
            <div class="input-form">
                <label>Nombre de la obra social:</label>
                <input type="text" name="cnombre_obra_social" size="20" minlength="5" required>

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
        <a href="obras_sociales.php">
        <button>Cancelar</button>
        </a>

    </center>
</body>

</html>