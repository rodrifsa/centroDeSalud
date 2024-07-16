<?php

    $ID  = $_REQUEST['ID'];
    $cnombre_especialidad  = $_REQUEST['cnombre_especialidad'];
    
    //conectar a la base de datos
    $db_servidor ="127.0.0.1"; //es lo mismo que localhost
    $db_usuario = "root";
    $db_password= "";
    $db_basededatos ="centro_de_salud";

    $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
        or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");

  
    //preparo la actualizacion 
    $consulta ="UPDATE especialidades SET cnombre_especialidad = '$cnombre_especialidad' WHERE id=" . $ID;
    
    //realizar consulta a la tabla especielidades
    $respuesta = mysqli_query( $conexion, $consulta ) 
        or die("ERROR EN LA CONSULTA");

    header("location: http://localhost/centro_de_salud/especialidades/especialidades.php");
    ?>