<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>Centro De Salud - Historial Turnos</title>

    <link rel="icon" type="ico" href="../images/favicon.ico" />
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

    // orden en el que se muestran los turnos

    $orden = isset($_REQUEST['orden']) ? $_REQUEST['orden'] : 1;


    //preparo la consulta: 1 ordenar por fecha, 2 ordenar por paciente, 3 ordenar por obra social, 4 ordenar por medico, 5 ordenar por obra social

    switch ($orden) {
        case 1:
            $consulta = "SELECT turnos.id AS 'IDT', dttfecha_hora_turno, pacientes.cnombre_apellido_paciente, medicos.cnombre_medico, consultorios.cnombre_consultorio, obra_social.cnombre_obra_social
                         FROM turnos
                         LEFT JOIN pacientes ON turnos.idpacientes = pacientes.id
                         LEFT JOIN medicos ON turnos.idmedicos = medicos.id
                         LEFT JOIN consultorios ON turnos.idconsultorios = consultorios.id
                         LEFT JOIN obra_social ON turnos.idobra_sociales = obra_social.id
                         WHERE dttfecha_hora_turno < CURDATE()
                         ORDER BY dttfecha_hora_turno";
            break;
        case 2:
            $consulta = "SELECT turnos.id AS 'IDT', dttfecha_hora_turno, pacientes.cnombre_apellido_paciente, medicos.cnombre_medico, consultorios.cnombre_consultorio, obra_social.cnombre_obra_social
                         FROM turnos
                         LEFT JOIN pacientes ON turnos.idpacientes = pacientes.id
                         LEFT JOIN medicos ON turnos.idmedicos = medicos.id
                         LEFT JOIN consultorios ON turnos.idconsultorios = consultorios.id
                         LEFT JOIN obra_social ON turnos.idobra_sociales = obra_social.id
                         WHERE dttfecha_hora_turno < CURDATE()
                         ORDER BY pacientes.cnombre_apellido_paciente, dttfecha_hora_turno";
            break;
        case 3:
            $consulta = "SELECT turnos.id AS 'IDT', dttfecha_hora_turno, pacientes.cnombre_apellido_paciente, medicos.cnombre_medico, consultorios.cnombre_consultorio, obra_social.cnombre_obra_social
                         FROM turnos
                         LEFT JOIN pacientes ON turnos.idpacientes = pacientes.id
                         LEFT JOIN medicos ON turnos.idmedicos = medicos.id
                         LEFT JOIN consultorios ON turnos.idconsultorios = consultorios.id
                         LEFT JOIN obra_social ON turnos.idobra_sociales = obra_social.id
                         WHERE dttfecha_hora_turno < CURDATE()
                         ORDER BY obra_social.cnombre_obra_social, dttfecha_hora_turno";
            break;
        case 4:
            $consulta = "SELECT turnos.id AS 'IDT', dttfecha_hora_turno, pacientes.cnombre_apellido_paciente, medicos.cnombre_medico, consultorios.cnombre_consultorio, obra_social.cnombre_obra_social
                         FROM turnos
                         LEFT JOIN pacientes ON turnos.idpacientes = pacientes.id
                         LEFT JOIN medicos ON turnos.idmedicos = medicos.id
                         LEFT JOIN consultorios ON turnos.idconsultorios = consultorios.id
                         LEFT JOIN obra_social ON turnos.idobra_sociales = obra_social.id
                         WHERE dttfecha_hora_turno < CURDATE()
                         ORDER BY medicos.cnombre_medico, dttfecha_hora_turno";
            break;
        case 5:
            $consulta = "SELECT turnos.id AS 'IDT', dttfecha_hora_turno, pacientes.cnombre_apellido_paciente, medicos.cnombre_medico, consultorios.cnombre_consultorio, obra_social.cnombre_obra_social
                         FROM turnos
                         LEFT JOIN pacientes ON turnos.idpacientes = pacientes.id
                         LEFT JOIN medicos ON turnos.idmedicos = medicos.id
                         LEFT JOIN consultorios ON turnos.idconsultorios = consultorios.id
                         LEFT JOIN obra_social ON turnos.idobra_sociales = obra_social.id
                         WHERE dttfecha_hora_turno < CURDATE()
                         ORDER BY consultorios.cnombre_consultorio, dttfecha_hora_turno";
            break;
        default:
            $consulta = "SELECT turnos.id AS 'IDT', dttfecha_hora_turno, pacientes.cnombre_apellido_paciente, medicos.cnombre_medico, consultorios.cnombre_consultorio, obra_social.cnombre_obra_social
                         FROM turnos
                         LEFT JOIN pacientes ON turnos.idpacientes = pacientes.id
                         LEFT JOIN medicos ON turnos.idmedicos = medicos.id
                         LEFT JOIN consultorios ON turnos.idconsultorios = consultorios.id
                         LEFT JOIN obra_social ON turnos.idobra_sociales = obra_social.id
                         WHERE dttfecha_hora_turno < CURDATE()
                         ORDER BY dttfecha_hora_turno";
            break;
    }

    //realizar consulta a la tabla especielidades
    $respuesta = mysqli_query($conexion, $consulta)
        or die("ERROR EN LA CONSULTA");

    //header de la pagina

    include('../plantillas/header.php');

    if ($respuesta->num_rows > 0) {
        //tabla para mostrar turnos
        echo "<div class='tabla'>";
        echo "<center><u><h2>Historial de Turnos</h2></u>";
        echo "<table class='table-hover'>";
        echo "    <tr>";

        echo "      <th>";
        echo "          <b><a href='turnosHistorial.php?orden=1'>Fecha Del Turno</a></b>";
        echo "      </th>";

        echo "      <th>";
        echo "          <b><a href='turnosHistorial.php?orden=2'>Nombre Del Paciente</a></b>";
        echo "      </th>";

        echo "      <th>";
        echo "          <b><a href='turnosHistorial.php?orden=3'>Obra Social</a></b>";
        echo "      </th>";

        echo "      <th>";
        echo "          <b><a href='turnosHistorial.php?orden=4'>Medico</a></b>";
        echo "      </th>";

        echo "      <th>";
        echo "          <b><a href='turnosHistorial.php?orden=5'>Consultorio</a></b>";
        echo "      </th>";

        echo "       <th>";
        echo "           <b> Acciones </b>";
        echo "       </th>";

        echo "    </tr>";


        //recorrer la respuesta
        while ($row = mysqli_fetch_assoc($respuesta)) {

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
            echo "<a href='modificarturno.php?ID=" . $row['IDT'] . "'><button class='btn-modificar'> Modificar </button></a>";
            echo " ";
            echo "<a href='eliminarturno.php?ID=" . $row['IDT'] . "'><button class='btn-eliminar'> Eliminar </button></a>";
            echo "</td>";

            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "<center><p>NO EXISTEN TURNOS para ver..</p></center>";
    }

    ?>
    <center>

        <a href="turnos.php" class="btn-volver">Volver a turnos</a>
    </center>

    <?php
    include('../plantillas/footer.php');
    ?>
</body>

</html>