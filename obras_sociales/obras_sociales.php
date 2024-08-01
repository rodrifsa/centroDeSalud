<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>Centro De Salud - Obras Sociales</title>

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


    //preparo la consulta 
    $consulta = "SELECT id, cnombre_obra_social FROM obra_social
                 ORDER BY obra_social.cnombre_obra_social";

    //realizar consulta a la tabla de obras sociales
    $respuesta = mysqli_query($conexion, $consulta)
        or die("ERROR EN LA CONSULTA");

    if ($respuesta->num_rows > 0) {
        //tabla para mostrar las obras sociales
        echo "<div class='tabla'>";
        echo "<center><u><h2>Obras Sociales</h2></u>";
        echo "<table class='table-hover'>";
        echo "    <tr>";

        echo "        <th>";
        echo "            <b> Obras Sociales </b>";
        echo "        </th>";

        echo "        <th>";
        echo "            <b> Acciones </b>";
        echo "        </th>";

        echo "    </tr>";

        //recorrer la respuesta
        while ($row = mysqli_fetch_assoc($respuesta)) {

            echo "<tr>";

            echo "<td>";
            echo $row['cnombre_obra_social'];
            echo "</td>";

            echo "<td>";

            echo "<a href='modificarobra.php?ID=" . $row['id'] . "'><button class='btn-modificar'>Modificar</button></a>";
            echo " ";
            echo "<a href='eliminarobra.php?ID=" . $row['id'] . "'><button class='btn-eliminar'>Eliminar</button></a>";
            echo "</td>";

            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";

        echo "<a href='nuevaobra.php'><button class='btn-nuevo'>Agregar nueva obra social</button></a> </center>";
    } else {
        echo "<center><p>NO EXISTEN PACIENTES para ver..</p></center>";
    }
    ?>

    <?php
    include('../plantillas/footer.php');
    ?>

</body>

</html>