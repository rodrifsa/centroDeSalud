<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>CENTRO DE SALUD - MEDICOS</title>
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
    $consulta ="SELECT medicos.id, cnombre_medico, ndni_medico , cdireccion_medico,
               ctelefono_medico, nmatricula_medico , id_especialidad , cnombre_especialidad
               FROM medicos
               LEFT JOIN especialidades ON medicos.id_especialidad = especialidades.id 
               ";
    
    //realizar consulta a la tabla especielidades
    $respuesta = mysqli_query( $conexion, $consulta ) 
        or die("ERROR EN LA CONSULTA");

    //header de la pagina

    include('../plantillas/header.php');

    echo "<center><u><h2>MEDICOS</h2></u>";

    echo "<a href='nuevomedico.php'>
            <button>Nuevo Medico</button>
          </a> </center> <br>";


    if($respuesta->num_rows >0) {
        //tabla para mostrar medicos
        echo "<center>";
        echo "<table>";
        echo "    <tr bgcolor='gray'>";
        echo "        <td>";
        echo "            <b> NOMBRE </b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b> DNI </b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b> DIRECCION </b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b> TELEFONO </b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b> ESPECIALIDAD </b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b> MATRICULA </b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b> Acciones </b>";
        echo "        </td>";
        echo "    </tr>";

        //recorrer la respuesta
        while($row = mysqli_fetch_assoc($respuesta)){

            echo "<tr>";

            echo "<td>";
                echo $row['cnombre_medico'];
            echo "</td>";

            echo "<td>";
                echo $row['ndni_medico'];
            echo "</td>";
            
            echo "<td>";
                echo $row['cdireccion_medico'];
            echo "</td>";

            echo "<td>";
                echo $row['ctelefono_medico'];
            echo "</td>";

            echo "<td>";
                echo $row['cnombre_especialidad'];
            echo "</td>";


            echo "<td>";
                echo $row['nmatricula_medico'];
            echo "</td>";

            echo "<td>";
            
            echo "<a href='modificarmedico.php?ID=" . $row['id'] . "'>Modificar</a>";
            echo " ";
            echo "<a href='eliminarmedico.php?ID=" . $row['id'] . "'>Eliminar</a>";
            echo "</td>";

            echo "</tr>";
        }

        echo "</table>";
        echo "</center>";

    } else {
        echo "<center><p>NO EXISTEN MEDICOS para ver..</p></center>";
    }
?>

<br>
<br>
<a href="../home.php">Volver al Inicio</a>

</body>

</html>

