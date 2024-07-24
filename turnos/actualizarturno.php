<?php

    $ID  = $_REQUEST['ID'];
    $dttfecha_hora_turno  = strtoupper($_REQUEST['fechaturno']);
    $cnombre_apellido_paciente  = strtoupper($_REQUEST['nombrepaciente']);
    $cnombre_obra_social  = strtoupper($_REQUEST['obrasocialpaciente']);
    $cnombre_medico  = strtoupper($_REQUEST['medicoturno']);
    $cnombre_consultorio  = strtoupper($_REQUEST['consultorioturno']);
    
    //conectar a la base de datos
    $db_servidor ="127.0.0.1"; //es lo mismo que localhost
    $db_usuario = "root";
    $db_password= "";
    $db_basededatos ="centro_de_salud";

    $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
        or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");

  
    //preparo la actualizacion 
    $consulta ="UPDATE turnos SET dttfecha_hora_turno   = '$dttfecha_hora_turno',
        idpacientes  = '$cnombre_apellido_paciente',
        idobra_sociales   = '$cnombre_obra_social',
        idmedicos  = '$cnombre_medico',
        idconsultorios  = '$cnombre_consultorio'
        WHERE id=" . $ID;
    
    //realizar consulta a la tabla pacientes
    $respuesta = mysqli_query( $conexion, $consulta ) 
        or die("ERROR EN LA CONSULTA");

    header("location: turnos.php");
    ?>