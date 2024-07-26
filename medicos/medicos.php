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

    // orden en el que se muestran los turnos

    $orden = isset($_REQUEST['orden']) ? $_REQUEST['orden'] : 1;

    //Preparo la consulta: 1 nombre, 2 dni, 3 direccion, 4 telefono, 5 especialidad, 6 matricula
  
    switch ($orden) {
        case 1:
            $consulta = "SELECT medicos.id, cnombre_medico, ndni_medico , cdireccion_medico,
               ctelefono_medico, nmatricula_medico , id_especialidad , cnombre_especialidad
               FROM medicos
               LEFT JOIN especialidades ON medicos.id_especialidad = especialidades.id
               ORDER BY medicos.cnombre_medico";
            break;
        case 2:
            $consulta = "SELECT medicos.id, cnombre_medico, ndni_medico , cdireccion_medico,
               ctelefono_medico, nmatricula_medico , id_especialidad , cnombre_especialidad
               FROM medicos
               LEFT JOIN especialidades ON medicos.id_especialidad = especialidades.id
               ORDER BY medicos.ndni_medico";
            break;
        case 3:
            $consulta = "SELECT medicos.id, cnombre_medico, ndni_medico , cdireccion_medico,
               ctelefono_medico, nmatricula_medico , id_especialidad , cnombre_especialidad
               FROM medicos
               LEFT JOIN especialidades ON medicos.id_especialidad = especialidades.id
               ORDER BY medicos.cdireccion_medico";
            break;
        case 4:
            $consulta = "SELECT medicos.id, cnombre_medico, ndni_medico , cdireccion_medico,
               ctelefono_medico, nmatricula_medico , id_especialidad , cnombre_especialidad
               FROM medicos
               LEFT JOIN especialidades ON medicos.id_especialidad = especialidades.id
               ORDER BY medicos.ctelefono_medico";
            break;
        case 5:
            $consulta = "SELECT medicos.id, cnombre_medico, ndni_medico , cdireccion_medico,
               ctelefono_medico, nmatricula_medico , id_especialidad , cnombre_especialidad
               FROM medicos
               LEFT JOIN especialidades ON medicos.id_especialidad = especialidades.id
               ORDER BY especialidades.cnombre_especialidad";
            break;
        case 6:
            $consulta = "SELECT medicos.id, cnombre_medico, ndni_medico , cdireccion_medico,
               ctelefono_medico, nmatricula_medico , id_especialidad , cnombre_especialidad
               FROM medicos
               LEFT JOIN especialidades ON medicos.id_especialidad = especialidades.id
               ORDER BY medicos.nmatricula_medico";
            break;
        default:
            $consulta = "SELECT medicos.id, cnombre_medico, ndni_medico , cdireccion_medico,
               ctelefono_medico, nmatricula_medico , id_especialidad , cnombre_especialidad
               FROM medicos
               LEFT JOIN especialidades ON medicos.id_especialidad = especialidades.id  ";
            break;
    }



    //preparo la consulta 
    // $consulta ="SELECT medicos.id, cnombre_medico, ndni_medico , cdireccion_medico,
    //            ctelefono_medico, nmatricula_medico , id_especialidad , cnombre_especialidad
    //            FROM medicos
    //            LEFT JOIN especialidades ON medicos.id_especialidad = especialidades.id  
    //            ";
    
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

        echo "      <td>";
        echo "          <b><a href='medicos.php?orden=1'> NOMBRE </a></b>";
        echo "      </td>";

        echo "      <td>";
        echo "          <b><a href='medicos.php?orden=2'> DNI </a></b>";
        echo "      </td>";

        echo "      <td>";
        echo "          <b><a href='medicos.php?orden=3'> DIRECCION </a></b>";
        echo "      </td>";

        echo "      <td>";
        echo "          <b><a href='medicos.php?orden=4'> TELEFONO </a></b>";
        echo "      </td>";

        echo "      <td>";
        echo "          <b><a href='medicos.php?orden=5'> ESPECIALIDAD </a></b>";
        echo "      </td>";

        echo "      <td>";
        echo "          <b><a href='medicos.php?orden=6'> MATRICULA </a></b>";
        echo "      </td>";

        echo "        <td>";
        echo "            <b> ACCIONES </b>";
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

