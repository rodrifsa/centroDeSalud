<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title>CENTRO DE SALUD</title>
</head>

<body>
    
    <?php 
        include('plantillas/header_index.php');
    ?>

    <nav>
        <ul>
            <li>Inicio</li>
            <li><a href="medicos/medicos.php">M&eacute;dicos</a></li>
            <li><a href="pacientes/pacientes.php">Pacientes</a></li>
            <li>Turnos</li>
            <li><a href="consultorios/consultorios.php">Consultorios</a></li>
            <li><a href="especialidades/especialidades.php">Especialidades</a></li>
            <li><a href="obras_sociales/obras_sociales.php">Obras Sociales</a></li>
        </ul>
    </nav>

    <?php 
        include('plantillas/footer.php');
    ?>

</body>

</html>