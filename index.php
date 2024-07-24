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
    include('plantillas/header_index.php');
    ?>

    <nav>
        <ul>
            <li>Inicio</li>
            <li><a href="#quienes_somos">Quienes Somos?</a></li>
            <li><a href="#profesionales">Profesionales</a></li>
            <li><a href="#especialidades">Especialidades</a></li>
            <li><a href="login/login.php">Acceso</a></li>
        </ul>
    </nav>
    <hr>
    <main>
        <section id="quienes_somos">
            <div>
                <img src="profesionales.png">
            </div>
            <div>
                <h2>Quienes Somos</h2>
                <p> Somo un equipo de Profesionales dedicados
                    a la Salud desde el Centro de Salud Fermoza</p>
            </div>
        </section>

        <section id="profesionales">

        </section>

        <section id="especialidades">

        </section>


    </main>

    <?php
    include('plantillas/footer.php');
    ?>

</body>

</html>