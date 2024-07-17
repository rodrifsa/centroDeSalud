<?php

    $cnombre_consultorio  = strtoupper($_REQUEST['cnombre_consultorio']);

    $error ="";

    //validacion de campos
    if(trim($cnombre_consultorio) <> "") {
    
        //conectar a la base de datos
        $db_servidor ="127.0.0.1"; //es lo mismo que localhost
        $db_usuario = "root";
        $db_password= "";
        $db_basededatos ="centro_de_salud";

        $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
            or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");

    
        //preparo la insercion 
        $consulta ="INSERT INTO consultorios 
            (cnombre_consultorio) VALUES 
            ('$cnombre_consultorio')";
        
        //realizar consulta a la tabla especielidades
        $respuesta = mysqli_query( $conexion, $consulta ) 
            or die("ERROR EN LA CONSULTA");

        header("location: consultorios.php");

    } else {
        $error = "Debe Completar el campo...!";

        header("location: nuevoconsultorio.php?error='$error'");
    }

   
    ?>