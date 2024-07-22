<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>CENTRO DE SALUD - MODIFICAR ESPECIALIDAD</title>
</head>

<body>

    <?php
    //header de la pagina

    include('../plantillas/header.php');

    echo "<center><u><h2>MODIFICAR ESPECIALIDAD</h2></u>";

    $ID = $_REQUEST['ID'];

    
    //conectar a la base de datos
    $db_servidor ="127.0.0.1"; //es lo mismo que localhost
    $db_usuario = "root";
    $db_password= "";
    $db_basededatos ="centro_de_salud";

    $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
        or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");

  
    //preparo la consulta 
    $consulta ="SELECT id, cnombre_especialidad FROM especialidades WHERE id=" . $ID;
    
    ;
    
    //realizar consulta a la tabla especielidades
    $respuesta = mysqli_query( $conexion, $consulta ) 
        or die("ERROR EN LA CONSULTA");

    $row = mysqli_fetch_assoc($respuesta);

    ?>
    <center>
        <Form action="actualizarespecialidad.php" method="POST">

            <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">

            <div class="input-form">
                <label>Nombre :</label>
                <input type="text" name="cnombre_especialidad" 
                    value="<?php echo $row['cnombre_especialidad']; ?>">
            </div>
            <br>
            <div class="input-form">
                <input type="submit" value="Guardar">
            </div>
        </Form>

        <br>
        <a href="especialidades.php">
        <button>Cancelar</button>
        </a>
    </center>
</body>

</html>