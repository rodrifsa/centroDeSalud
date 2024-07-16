<?php

    $ID  = $_REQUEST['ID'];
    $cnombre_medico  = strtoupper($_REQUEST['cnombre_medico']);
    $ndni_medico  = strtoupper($_REQUEST['ndni_medico']);
    $cdireccion_medico  = strtoupper($_REQUEST['cdireccion_medico']);
    $ctelefono_medico  = strtoupper($_REQUEST['ctelefono_medico']);
    $nmatricula_medico  = strtoupper($_REQUEST['nmatricula_medico']);
    $id_especialidad  = strtoupper($_REQUEST['id_especialidad']);
    $dfecha_inicio  = strtoupper($_REQUEST['dfecha_inicio']);
    
    //conectar a la base de datos
    $db_servidor ="127.0.0.1"; //es lo mismo que localhost
    $db_usuario = "root";
    $db_password= "";
    $db_basededatos ="centro_de_salud";

    $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
        or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");

  
    //preparo la actualizacion 
    $consulta ="UPDATE medicos SET cnombre_medico = '$cnombre_medico',
        ndni_medico= $ndni_medico,
        cdireccion_medico = '$cdireccion_medico',
        ctelefono_medico = '$ctelefono_medico',
        nmatricula_medico = $nmatricula_medico,
        id_especialidad = $id_especialidad,
        dfecha_inicio = '$dfecha_inicio' 
        WHERE id=" . $ID;
    
    //realizar consulta a la tabla especielidades
    $respuesta = mysqli_query( $conexion, $consulta ) 
        or die("ERROR EN LA CONSULTA");

    header("location: http://localhost/centro_de_salud/medicos/medicos.php");
    ?>