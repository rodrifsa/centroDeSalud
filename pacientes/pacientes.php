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
    $db_servidor = "127.0.0.1"; //es lo mismo que localhost
    $db_usuario = "root";
    $db_password = "";
    $db_basededatos = "centro_de_salud";

    $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
        or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");


    // orden en el que se muestran los pacientes

    $orden = isset($_REQUEST['orden']) ? $_REQUEST['orden'] : 1;


    //preparo la consulta: 1 nombre, 2 dni, 3 direccion, 4 telefono, 5 sexo, 6 edad, 7 nacimiento, 8 obra social

    switch($orden) {
        case 1:
            $consulta = "SELECT 
    pacientes.id as 'IDP', 
    pacientes.cnombre_apellido_paciente, 
    pacientes.ndni_paciente, 
    pacientes.cdireccion_paciente,
    pacientes.ctel_paciente, 
    pacientes.csexo_paciente, 
    TIMESTAMPDIFF(YEAR, pacientes.dfecha_nac_paciente, CURDATE()) AS edad,
    pacientes.dfecha_nac_paciente, 
    pacientes.idobra_sociales, 
    obra_social.id, 
    obra_social.cnombre_obra_social
FROM 
    pacientes
LEFT JOIN 
    obra_social 
ON 
    pacientes.idobra_sociales = obra_social.id
ORDER BY pacientes.cnombre_apellido_paciente";
    break;
        case 2:
            $consulta = "SELECT 
    pacientes.id as 'IDP', 
    pacientes.cnombre_apellido_paciente, 
    pacientes.ndni_paciente, 
    pacientes.cdireccion_paciente,
    pacientes.ctel_paciente, 
    pacientes.csexo_paciente, 
    TIMESTAMPDIFF(YEAR, pacientes.dfecha_nac_paciente, CURDATE()) AS edad,
    pacientes.dfecha_nac_paciente, 
    pacientes.idobra_sociales, 
    obra_social.id, 
    obra_social.cnombre_obra_social
FROM 
    pacientes
LEFT JOIN 
    obra_social 
ON 
    pacientes.idobra_sociales = obra_social.id
ORDER BY pacientes.ndni_paciente";
    break;
        case 3:
            $consulta = "SELECT 
    pacientes.id as 'IDP', 
    pacientes.cnombre_apellido_paciente, 
    pacientes.ndni_paciente, 
    pacientes.cdireccion_paciente,
    pacientes.ctel_paciente, 
    pacientes.csexo_paciente, 
    TIMESTAMPDIFF(YEAR, pacientes.dfecha_nac_paciente, CURDATE()) AS edad,
    pacientes.dfecha_nac_paciente, 
    pacientes.idobra_sociales, 
    obra_social.id, 
    obra_social.cnombre_obra_social
FROM 
    pacientes
LEFT JOIN 
    obra_social 
ON 
    pacientes.idobra_sociales = obra_social.id
ORDER BY pacientes.cdireccion_paciente";
    break;
        case 4:
            $consulta = "SELECT 
    pacientes.id as 'IDP', 
    pacientes.cnombre_apellido_paciente, 
    pacientes.ndni_paciente, 
    pacientes.cdireccion_paciente,
    pacientes.ctel_paciente, 
    pacientes.csexo_paciente, 
    TIMESTAMPDIFF(YEAR, pacientes.dfecha_nac_paciente, CURDATE()) AS edad,
    pacientes.dfecha_nac_paciente, 
    pacientes.idobra_sociales, 
    obra_social.id, 
    obra_social.cnombre_obra_social
FROM 
    pacientes
LEFT JOIN 
    obra_social 
ON 
    pacientes.idobra_sociales = obra_social.id
ORDER BY pacientes.ctel_paciente";
    break;
        case 5:
            $consulta = "SELECT 
    pacientes.id as 'IDP', 
    pacientes.cnombre_apellido_paciente, 
    pacientes.ndni_paciente, 
    pacientes.cdireccion_paciente,
    pacientes.ctel_paciente, 
    pacientes.csexo_paciente, 
    TIMESTAMPDIFF(YEAR, pacientes.dfecha_nac_paciente, CURDATE()) AS edad,
    pacientes.dfecha_nac_paciente, 
    pacientes.idobra_sociales, 
    obra_social.id, 
    obra_social.cnombre_obra_social
FROM 
    pacientes
LEFT JOIN 
    obra_social 
ON 
    pacientes.idobra_sociales = obra_social.id
ORDER BY pacientes.csexo_paciente";
    break;
        case 6:
            $consulta = "SELECT 
    pacientes.id as 'IDP', 
    pacientes.cnombre_apellido_paciente, 
    pacientes.ndni_paciente, 
    pacientes.cdireccion_paciente,
    pacientes.ctel_paciente, 
    pacientes.csexo_paciente, 
    TIMESTAMPDIFF(YEAR, pacientes.dfecha_nac_paciente, CURDATE()) AS edad,
    pacientes.dfecha_nac_paciente, 
    pacientes.idobra_sociales, 
    obra_social.id, 
    obra_social.cnombre_obra_social
FROM 
    pacientes
LEFT JOIN 
    obra_social 
ON 
    pacientes.idobra_sociales = obra_social.id
ORDER BY edad";
    break;
        case 7:
            $consulta = "SELECT 
    pacientes.id as 'IDP', 
    pacientes.cnombre_apellido_paciente, 
    pacientes.ndni_paciente, 
    pacientes.cdireccion_paciente,
    pacientes.ctel_paciente, 
    pacientes.csexo_paciente, 
    TIMESTAMPDIFF(YEAR, pacientes.dfecha_nac_paciente, CURDATE()) AS edad,
    pacientes.dfecha_nac_paciente, 
    pacientes.idobra_sociales, 
    obra_social.id, 
    obra_social.cnombre_obra_social
FROM 
    pacientes
LEFT JOIN 
    obra_social 
ON 
    pacientes.idobra_sociales = obra_social.id
ORDER BY pacientes.dfecha_nac_paciente";
    break;
        case 8:
            $consulta = "SELECT 
    pacientes.id as 'IDP', 
    pacientes.cnombre_apellido_paciente, 
    pacientes.ndni_paciente, 
    pacientes.cdireccion_paciente,
    pacientes.ctel_paciente, 
    pacientes.csexo_paciente, 
    TIMESTAMPDIFF(YEAR, pacientes.dfecha_nac_paciente, CURDATE()) AS edad,
    pacientes.dfecha_nac_paciente, 
    pacientes.idobra_sociales, 
    obra_social.id, 
    obra_social.cnombre_obra_social
FROM 
    pacientes
LEFT JOIN 
    obra_social 
ON 
    pacientes.idobra_sociales = obra_social.id
ORDER BY obra_social.cnombre_obra_social";
    break;
        default:
        $consulta = "SELECT 
    pacientes.id as 'IDP', 
    pacientes.cnombre_apellido_paciente, 
    pacientes.ndni_paciente, 
    pacientes.cdireccion_paciente,
    pacientes.ctel_paciente, 
    pacientes.csexo_paciente, 
    TIMESTAMPDIFF(YEAR, pacientes.dfecha_nac_paciente, CURDATE()) AS edad,
    pacientes.dfecha_nac_paciente, 
    pacientes.idobra_sociales, 
    obra_social.id, 
    obra_social.cnombre_obra_social
FROM 
    pacientes
LEFT JOIN 
    obra_social 
ON 
    pacientes.idobra_sociales = obra_social.id
ORDER BY pacientes.cnombre_apellido_paciente";
    }



    //preparo la consulta a la tabla pacientes
//     $consulta = "SELECT 
//     pacientes.id as 'IDP', 
//     pacientes.cnombre_apellido_paciente, 
//     pacientes.ndni_paciente, 
//     pacientes.cdireccion_paciente,
//     pacientes.ctel_paciente, 
//     pacientes.csexo_paciente, 
//     TIMESTAMPDIFF(YEAR, pacientes.dfecha_nac_paciente, CURDATE()) AS edad,
//     pacientes.dfecha_nac_paciente, 
//     pacientes.idobra_sociales, 
//     obra_social.id, 
//     obra_social.cnombre_obra_social
// FROM 
//     pacientes
// LEFT JOIN 
//     obra_social 
// ON 
//     pacientes.idobra_sociales = obra_social.id";

    //realizar consulta a la tabla pacientes
    $respuesta = mysqli_query($conexion, $consulta)
        or die("ERROR EN LA CONSULTA");

    //header de la pagina

    include('../plantillas/header.php');

    echo "<center><u><h2>PACIENTES</h2></u>";

    echo "<a href='nuevopaciente.php'>
            <button>Nuevo Paciente</button>
          </a> </center> <br>";


                

    if ($respuesta->num_rows > 0) {
        //tabla para mostrar Pacientes
        echo "<center>";
        echo "<table>";
        echo "    <tr bgcolor='gray'>";
        echo "        <td>";
        echo "            <b><a href='pacientes.php?orden=1'> NOMBRE </a></b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b><a href='pacientes.php?orden=2'> DNI </a></b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b><a href='pacientes.php?orden=3'> DIRECCION </a></b>";
        echo "        </td>";


        echo "        <td>";
        echo "            <b><a href='pacientes.php?orden=4'> TELEFONO </a></b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b><a href='pacientes.php?orden=5'> SEXO </a></b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b><a href='pacientes.php?orden=6'> EDAD </a></b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b><a href='pacientes.php?orden=7'> FECHA NACIMIENTO </a></b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b><a href='pacientes.php?orden=8'> OBRA SOCIAL </a></b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b> ACCIONES </b>";
        echo "        </td>";
        echo "    </tr>";

        //recorrer la respuesta
        while ($row = mysqli_fetch_assoc($respuesta)) {

            echo "<tr>";

            echo "<td>";
            echo $row['cnombre_apellido_paciente'];
            echo "</td>";

            echo "<td>";
            echo $row['ndni_paciente'];
            echo "</td>";

            echo "<td>";
            echo $row['cdireccion_paciente'];
            echo "</td>";

            echo "<td>";
            echo $row['ctel_paciente'];
            echo "</td>";

            echo "<td>";
            echo $row['csexo_paciente'];
            echo "</td>";

            echo "<td>";
            echo $row['edad'];
            echo "</td>";

            echo "<td>";
            echo $row['dfecha_nac_paciente'];
            echo "</td>";

            echo "<td>";
            echo $row['cnombre_obra_social'];
            echo "</td>";

            echo "<td>";

            echo "<a href='modificarpaciente.php?ID=" . $row['IDP'] . "'>Modificar</a>";
            echo " ";
            echo "<a href='eliminarpaciente.php?ID=" . $row['IDP'] . "'>Eliminar</a>";
            echo "</td>";

            echo "</tr>";
        }

        echo "</table>";
        echo "</center>";
    } else {
        echo "<center><p>NO EXISTEN PACIENTES para ver..</p></center>";
    }
    ?>
        <center>
        <br>
        <br>
        <br>
        <h3>Dar turno</h3>
        <a href="../turnos/nuevoturno.php"><input type="submit" value="Dar nuevo turno"></a>
        </center>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <a href="../home.php">Volver al Inicio</a>

</body>

</html>