<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title>Centro De Salud Fermoza</title>

    <link rel="icon" type="ico" href="images/favicon.ico" />
</head>

<body>
    
    <?php 
        include('plantillas/header_home.php');
    ?>

    <nav class="nav-container">
        <ul>
            <li><a href="home.php">Inicio</a></li>
            <li><a href="login/nuevousuario.php">Crear Usuario</a></li>
            <li><a href="medicos/medicos.php">M&eacute;dicos</a></li>
            <li><a href="pacientes/pacientes.php">Pacientes</a></li>
            <li><a href="turnos/turnos.php">Turnos</a></li>
            <li><a href="consultorios/consultorios.php">Consultorios</a></li>
            <li><a href="especialidades/especialidades.php">Especialidades</a></li>
            <li><a href="obras_sociales/obras_sociales.php">Obras Sociales</a></li>
        </ul>
    </nav>

    <div class="fondo-home">
        <h2>Bienvenido</h2>
        <img src="https://mcdn.wallpapersafari.com/medium/25/85/bREnu7.jpg" alt="">
    </div>

    <?php
    include('plantillas/footer.php');
    ?>
    
</body>

</html>