<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>CENTO DE SALUD - LOGIN</title>
</head>

<body>

    <?php
    include('../plantillas/header.php');
    ?>

    <?php


    $usuario = $_REQUEST['usuario'];
    $password = $_REQUEST['pass'];

    //parametros para la conexion

    //conectar a la base de datos
    $db_servidor = "127.0.0.1"; //es lo mismo que localhost
    $db_usuario = "root";
    $db_password = "";
    $db_basededatos = "centro_de_salud";

    $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
        or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");

    //armado la consulta

    $consulta = "SELECT * FROM usuarios WHERE cnombre_usuario = '$usuario' AND ccontrasenia_usuario = '$password'";

    //consultando a la base de datos

    $respuesta = mysqli_query($conexion, $consulta);

    $row = mysqli_fetch_array($respuesta);


    //verificar si existe usuario

    if (!$row) {
        echo "<h1>Usuario o contraseña incorrectos</h1><br>";
        echo '<a href="login.php">Volver al login</a>';
    } else {
        header("location: ../home.php");
    }


    ?>

</body>

</html>