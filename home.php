<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title>Centro De Salud Fermoza</title>
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
        rel="stylesheet" />
    <link rel="icon" type="ico" href="images/favicon.ico" />
</head>

<body>
    
    
    <?php 
        //session_start();
        //$_SESSION['username'] = $username; // $username contiene el nombre de usuario.
        
    session_start();
    if (isset($_SESSION['usuario'])) {
        echo "<p class='bienvenida'><i class='ri-user-fill'></i>Usuario: " . htmlspecialchars($_SESSION['usuario']) . "</p>";
    } else {
        echo "<p>Bienvenido, Invitado</p>";
    }

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