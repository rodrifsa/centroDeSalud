<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>Centro De Salud - Pacientes</title>

    <link rel="icon" type="ico" href="../images/favicon.ico" />
</head>

<body>

    <?php
    //header de la pagina

    include('../plantillas/header.php');
    ?>

    <nav class="nav-container">
        <ul>
            <li><a href="../home.php">Inicio</a></li>
            <li><a href="../login/nuevousuario.php">Crear Usuario</a></li>
            <li><a href="../medicos/medicos.php">M&eacute;dicos</a></li>
            <li><a href="../pacientes/pacientes.php">Pacientes</a></li>
            <li><a href="../turnos/turnos.php">Turnos</a></li>
            <li><a href="../consultorios/consultorios.php">Consultorios</a></li>
            <li><a href="../especialidades/especialidades.php">Especialidades</a></li>
            <li><a href="../obras_sociales/obras_sociales.php">Obras Sociales</a></li>
        </ul>
    </nav>

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

    switch ($orden) {
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

    //realizar consulta a la tabla pacientes
    $respuesta = mysqli_query($conexion, $consulta)
        or die("ERROR EN LA CONSULTA");

    if ($respuesta->num_rows > 0) {
        //tabla para mostrar Pacientes
        echo "<div class='tabla'>";
        echo "<center><u><h2>Pacientes</h2></u>";
        echo "<table class='table-hover'>";
        echo "    <tr";

        echo "        <th>";
        echo "            <b></b>";
        echo "        </th>";

        echo "        <th>";
        echo "            <b><a href='pacientes.php?orden=1'> Nombre </a></b>";
        echo "        </th>";

        echo "        <th>";
        echo "            <b><a href='pacientes.php?orden=2'> Dni </a></b>";
        echo "        </th>";

        echo "        <th>";
        echo "            <b><a href='pacientes.php?orden=3'> Direccion </a></b>";
        echo "        </th>";

        echo "        <th>";
        echo "            <b><a href='pacientes.php?orden=4'> Telefono </a></b>";
        echo "        </th>";

        echo "        <th>";
        echo "            <b><a href='pacientes.php?orden=5'> Sexo </a></b>";
        echo "        </th>";

        echo "        <th>";
        echo "            <b><a href='pacientes.php?orden=6'> Edad </a></b>";
        echo "        </th>";

        echo "        <th>";
        echo "            <b><a href='pacientes.php?orden=7'> Fecha Nacimiento </a></b>";
        echo "        </th>";

        echo "        <th>";
        echo "            <b><a href='pacientes.php?orden=8'> Obra Social </a></b>";
        echo "        </th>";

        echo "        <th>";
        echo "            <b> Acciones </b>";
        echo "        </th>";
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

            echo "<a href='modificarpaciente.php?ID=" . $row['IDP'] . "'><button class='btn-modificar'>Modificar</button></a>";
            echo " ";
            echo "<a href='eliminarpaciente.php?ID=" . $row['IDP'] . "'><button class='btn-eliminar'>Eliminar</button></a>";
            echo "</td>";

            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";

        echo "<a href='nuevopaciente.php'><button class='btn-nuevo'>Nuevo Paciente</button></a></center>";
        echo "<a href='../turnos/nuevoturno.php'><button class='btn-nuevo'>Dar un turno</button></a></a>";
    } else {
        echo "<center><p>NO EXISTEN PACIENTES para ver..</p></center>";
    }
    ?>

    <?php
    include('../plantillas/footer.php');
    ?>

</body>

</html>