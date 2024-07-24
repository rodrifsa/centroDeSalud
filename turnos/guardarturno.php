<?php

    $fechardaturno  = strtoupper($_REQUEST['fechaturno']);
    $nombrepacientardo  = strtoupper($_REQUEST['nombrepaciente']);
    $obrasocialardapaciente  = strtoupper($_REQUEST['obrasocialpaciente']);
    $medicardoturno  = strtoupper($_REQUEST['medicoturno']);
    $contultorioturnardo  = strtoupper($_REQUEST['consultorioturno']);
    $error ="";

    //validacion de campos
    if(trim($fechardaturno) <> "") {
    
        //conectar a la base de datos
        $db_servidor ="127.0.0.1"; //es lo mismo que localhost
        $db_usuario = "root";
        $db_password= "";
        $db_basededatos ="centro_de_salud";

        $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
            or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");

    
        //preparo la insercion 
        $consulta ="INSERT INTO turnos 
            (dttfecha_hora_turno,idpacientes ,
                idobra_sociales  ,
                idmedicos  ,
                idconsultorios) VALUES 
            ('$fechardaturno',
                '$nombrepacientardo',
                '$obrasocialardapaciente',
                '$medicardoturno',
                '$contultorioturnardo')";
        
        //realizar consulta a la tabla turnos
        $respuesta = mysqli_query( $conexion, $consulta ) 
            or die("ERROR EN LA CONSULTA");

        header("location: turnos.php");

    } else {
        $error = "Debe Completar el campo...!";

        header("location: nuevoturno.php?error='$error'");
    }

   
    ?>