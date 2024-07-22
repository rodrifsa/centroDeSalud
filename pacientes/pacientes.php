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


    //preparo la consulta 
    $consulta = "SELECT 
    pacientes.id as 'IDP', 
    pacientes.cnombre_apellido_paciente, 
    pacientes.ndni_paciente, 
    pacientes.cdireccion_paciente,
    pacientes.ctel_paciente, 
    pacientes.csexo_paciente, 
    pacientes.dfecha_nac_paciente, 
    pacientes.idobra_sociales, 
    obra_social.id, 
    obra_social.cnombre_obra_social
FROM 
    pacientes
LEFT JOIN 
    obra_social 
ON 
    pacientes.idobra_sociales = obra_social.id";

    //realizar consulta a la tabla especielidades
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
        echo "            <b> SEXO </b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b> FECHA NACIMIENTO </b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b> OBRA SOCIAL </b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b> Acciones </b>";
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

    <br>
    <br>
    <a href="../home.php">Volver al Inicio</a>

</body>

</html>