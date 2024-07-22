<?php

    $cnombre_medico  = strtoupper($_REQUEST['cnombre_medico']);
    $ndni_medico  = strtoupper($_REQUEST['ndni_medico']);
    $cdireccion_medico  = strtoupper($_REQUEST['cdireccion_medico']);
    $ctelefono_medico  = strtoupper($_REQUEST['ctelefono_medico']);
    $nmatricula_medico  = strtoupper($_REQUEST['nmatricula_medico']);
    $id_especialidad  = strtoupper($_REQUEST['id_especialidad']);
    $dfecha_inicio  = strtoupper($_REQUEST['dfecha_inicio']);

    $error ="";

    //validacion de campos
    if(trim($cnombre_medico) <> "") {
    
        //conectar a la base de datos
        $db_servidor ="127.0.0.1"; //es lo mismo que localhost
        $db_usuario = "root";
        $db_password= "";
        $db_basededatos ="centro_de_salud";

        $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
            or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");

    
        //preparo la insercion 
        $consulta ="INSERT INTO medicos 
            (cnombre_medico,ndni_medico,
                cdireccion_medico,
                ctelefono_medico ,
                nmatricula_medico ,
                id_especialidad ,
                 dfecha_inicio ) VALUES 
            ('$cnombre_medico',
                $ndni_medico,
                '$cdireccion_medico',
                '$ctelefono_medico',
                $nmatricula_medico,
                $id_especialidad,
                '$dfecha_inicio')";
        
        //realizar consulta a la tabla especielidades
        $respuesta = mysqli_query( $conexion, $consulta ) 
            or die("ERROR EN LA CONSULTA");

        header("location: medicos.php");

    } else {
        $error = "Debe Completar el campo...!";

        header("location: nuevomedico.php?error='$error'");
    }

   
    ?>