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

    echo "<center><u><h2>MODIFICAR OBRA SOCIAL</h2></u>";

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
    $consulta = "SELECT * FROM obra_social WHERE id=" . $ID;;

    //realizar consulta a la tabla de obras sociales
    $respuesta = mysqli_query($conexion, $consulta)
        or die("ERROR EN LA CONSULTA");

    $row = mysqli_fetch_assoc($respuesta);

    //preparo la consulta de obras sociales
    $consulta ="SELECT id, cnombre_obra_social FROM obra_social";
    
    //realizar consulta a la tabla de obras sociales
    $especialidades = mysqli_query( $conexion, $consulta ) 
        or die("ERROR EN LA CONSULTA");

   

    ?>
    <center>
        <Form action="actualizarobra.php" method="POST">

            <!-- id de la obra social- campo oculto -->
             <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
            <!-- nombre de la obra social -->
            <div class="input-form">
                <label>Nombre:</label>
                <input type="text" name="cnombre_obra_social" size="20" minlength="5" required
                    value="<?php echo $row['cnombre_obra_social']; ?>">
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

        <br>
        <a href="obras_sociales.php">
        <button>Cancelar</button>
        </a>
    </center>
</body>

</html>