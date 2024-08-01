<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>Centro De Salud - Consultorios</title>

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
    $consulta = "SELECT id, cnombre_consultorio FROM consultorios";

    //realizar consulta a la tabla especielidades
    $respuesta = mysqli_query($conexion, $consulta)
        or die("ERROR EN LA CONSULTA");

    if ($respuesta->num_rows > 0) {
        //tabla para mostrar consultorios
        echo "<div class='tabla' class='table-hover'>";
        echo "<center><u><h2>Consultorios</h2></u>";
        echo "<table class='table-hover'>";
        echo "    <tr>";

        echo "        <th>";
        echo "            <b> Nombre </b>";
        echo "        </th>";

        echo "        <th>";
        echo "            <b> Acciones </b>";
        echo "        </th>";

        echo "    </tr>";

        //recorrer la respuesta
        while ($row = mysqli_fetch_assoc($respuesta)) {

            echo "<tr>";

            echo "<td>";
            echo $row['cnombre_consultorio'];
            echo "</td>";

            echo "<td>";

            echo "<a href='modificarconsultorio.php?ID=" . $row['id'] . "'><button class='btn-modificar'>Modificar</button></a>";
            echo " ";
            echo "<a href='eliminarconsultorio.php?ID=" . $row['id'] . "'><button class='btn-eliminar'>Eliminar</button></a>";
            echo "</td>";

            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";

        echo "<a href='nuevoconsultorio.php'><button class='btn-nuevo'>Nuevo Consultorio</button></a>";
    } else {
        echo "<center><p>NO EXISTEN CONSULTORIOS para ver..</p></center>";
    }
    ?>

    <?php
    include('../plantillas/footer.php');
    ?>

</body>

</html>