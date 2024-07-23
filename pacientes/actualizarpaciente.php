<?php

    $ID  = $_REQUEST['ID'];
    $cnombre_apellido_paciente  = strtoupper($_REQUEST['cnombre_apellido_paciente']);
    $ndni_paciente  = strtoupper($_REQUEST['ndni_paciente']);
    $cdireccion_paciente  = strtoupper($_REQUEST['cdireccion_paciente']);
    $ctel_paciente  = strtoupper($_REQUEST['ctel_paciente']);
    $csexo_paciente  = strtoupper($_REQUEST['csexo_paciente']);
    $dfecha_nac_paciente  = strtoupper($_REQUEST['dfecha_nac_paciente']);
    $idobra_sociales    = strtoupper($_REQUEST['id_obra_sociales']);
    
    //conectar a la base de datos
    $db_servidor ="127.0.0.1"; //es lo mismo que localhost
    $db_usuario = "root";
    $db_password= "";
    $db_basededatos ="centro_de_salud";

    $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
        or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");

  
    //preparo la actualizacion 
    $consulta ="UPDATE pacientes SET cnombre_apellido_paciente = '$cnombre_apellido_paciente',
        ndni_paciente= '$ndni_paciente',
        cdireccion_paciente = '$cdireccion_paciente',
        ctel_paciente = '$ctel_paciente',
        csexo_paciente = '$csexo_paciente',
        dfecha_nac_paciente = '$dfecha_nac_paciente',
        idobra_sociales   = '$idobra_sociales' 
        WHERE id=" . $ID;
    
    //realizar consulta a la tabla pacientes
    $respuesta = mysqli_query( $conexion, $consulta ) 
        or die("ERROR EN LA CONSULTA");

    header("location: pacientes.php");
    ?>