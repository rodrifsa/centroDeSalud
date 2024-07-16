<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title>CENTRO DE SALUD FERMOZA</title>
</head>

<body>
    
    <?php 
        include('plantillas/header.php');
    ?>

    <nav>
        <ul>
            <li>Inicio</li>
            <li>Quienes Somos?</li>
            <li>Profesionales</li>
            <li>Especialidades</li>
            <li><a href="home.php">Acceso</a></li>
        </ul>
    </nav>
    <hr>
    <main>
        <div>
            <img src="profesionales.png">
        </div>
        <div>
            <h2>Quienes Somos</h2>
            <p> Somo un equipo de Profesionales dedicados
             a la Salud desde el Centro de Salud Fermoza</p>
        </div>


    </main>

    <?php 
        include('plantillas/footer.php');
    ?>

</body>

</html>