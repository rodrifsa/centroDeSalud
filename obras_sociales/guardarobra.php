<?php

    $cnombre_obra_social  = strtoupper($_REQUEST['cnombre_obra_social']);

    $error ="";

    //validacion de campos
    if(trim($cnombre_obra_social) <> "") {
    
        //conectar a la base de datos
        $db_servidor ="127.0.0.1"; //es lo mismo que localhost
        $db_usuario = "root";
        $db_password= "";
        $db_basededatos ="centro_de_salud";

        $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
            or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");

    
        //preparo la insercion 
        $consulta ="INSERT INTO obra_social (cnombre_obra_social) VALUES ('$cnombre_obra_social')";
        
        //realizar consulta a la tabla de obras sociales
        $respuesta = mysqli_query( $conexion, $consulta ) 
            or die("ERROR EN LA CONSULTA");

        header("location: obras_sociales.php");

    } else {
        $error = "Debe Completar el campo...!";

        header("location: nuevoobra.php?error='$error'");
    }

   
    ?>