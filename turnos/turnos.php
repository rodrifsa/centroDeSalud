<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>CENTRO DE SALUD - TURNOS</title>
</head>

<body>

<?php
    //conectar a la base de datos
    $db_servidor ="127.0.0.1"; //es lo mismo que localhost
    $db_usuario = "root";
    $db_password= "";
    $db_basededatos ="centro_de_salud";

    $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
        or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");

  
    //preparo la consulta 
    $consulta ="SELECT turnos.id AS 'IDT', dttfecha_hora_turno, pacientes.cnombre_apellido_paciente, medicos.cnombre_medico, consultorios.cnombre_consultorio, obra_social.cnombre_obra_social
FROM turnos
LEFT JOIN pacientes on turnos.idpacientes = pacientes.id
LEFT JOIN medicos on turnos.idmedicos = medicos.id
LEFT JOIN consultorios on turnos.idconsultorios = consultorios.id
LEFT JOIN obra_social on turnos.idobra_sociales = obra_social.id";
    
    //realizar consulta a la tabla especielidades
    $respuesta = mysqli_query( $conexion, $consulta ) 
        or die("ERROR EN LA CONSULTA");

    //header de la pagina

    include('../plantillas/header.php');

    echo "<center><u><h2>TURNOS</h2></u>";

    echo "<a href='nuevoturno.php'>
            <button>Nuevo Turno</button>
          </a> </center> <br>";


    if($respuesta->num_rows >0) {
        //tabla para mostrar turnos
        echo "<center>";
        echo "<table>";
        echo "    <tr bgcolor='gray'>";
        echo "        <td>";
        echo "            <b> FECHA TURNO </b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b> NOMBRE DEL PACIENTE </b>";
        echo "        </td>";
        echo "        <td>";
        echo "            <b> OBRA SOCIAL PACIENTE </b>";
        echo "        </td>";
        echo "        <td>";
        echo "            <b> MEDICO </b>";
        echo "        </td>";
        echo "        <td>";
        echo "            <b> CONSULTORIO </b>";
        echo "        </td>";
        echo "        <td>";
        echo "            <b> Acciones </b>";
        echo "        </td>";
        echo "    </tr>";


        //recorrer la respuesta
        while($row = mysqli_fetch_assoc($respuesta)){

            echo "<tr>";

            echo "<td>";
                echo $row['dttfecha_hora_turno'];
            echo "</td>";

            echo "<td>";
                echo $row['cnombre_apellido_paciente'];
            echo "</td>";

            echo "<td>";
                echo $row['cnombre_obra_social'];
            echo "</td>";

            echo "<td>";
                echo $row['cnombre_medico'];
            echo "</td>";

            echo "<td>";
                echo $row['cnombre_consultorio'];
            echo "</td>";



            echo "<td>";

            
                echo "<a href='modificarturno.php?ID=" . $row['IDT'] . "'>Modificar</a>";
                echo " ";
                echo "<a href='eliminarturno.php?ID=" . $row['IDT'] . "'>Eliminar</a>";
            echo "</td>";

            echo "</tr>";
        }

        echo "</table>";
        echo "</center>";
    } else {
        echo "<center><p>NO EXISTEN TURNOS para ver..</p></center>";
    }

?>

<br>
<br>
<a href="../home.php">Volver al Inicio</a>

</body>

</html>