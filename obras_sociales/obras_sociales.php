<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>CENTRO DE SALUD - OBRAS SOCIALES</title>
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
    $consulta = "SELECT id, cnombre_obra_social FROM obra_social
                 ORDER BY obra_social.cnombre_obra_social";

    //realizar consulta a la tabla de obras sociales
    $respuesta = mysqli_query($conexion, $consulta)
        or die("ERROR EN LA CONSULTA");

    //header de la pagina

    include('../plantillas/header.php');

    echo "<center><u><h2>OBRAS SOCIALES</h2></u>";

    echo "<a href='nuevaobra.php'>
            <button>Agregar nueva obra social</button>
          </a> </center> <br>";



    if ($respuesta->num_rows > 0) {
        //tabla para mostrar las obras sociales
        echo "<center>";
        echo "<table>";
        echo "    <tr bgcolor='gray'>";
        echo "        <td>";
        echo "            <b> Obras Sociales </b>";
        echo "        </td>";

        echo "        <td>";
        echo "            <b> Acciones </b>";
        echo "        </td>";
        echo "    </tr>";

        //recorrer la respuesta
        while ($row = mysqli_fetch_assoc($respuesta)) {

            echo "<tr>";

            echo "<td>";
            echo $row['cnombre_obra_social'];
            echo "</td>";

            echo "<td>";

            echo "<a href='modificarobra.php?ID=" . $row['id'] . "'>Modificar</a>";
            echo " ";
            echo "<a href='eliminarobra.php?ID=" . $row['id'] . "'>Eliminar</a>";
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