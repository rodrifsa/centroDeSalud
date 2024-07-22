<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>CENTRO DE SALUD - NUEVA ESPECIALIDAD</title>
</head>

<body>

    <?php
    //header de la pagina

    include('../plantillas/header.php');

    echo "<center><u><h2>NUEVA ESPECIALIDAD</h2></u>";
    ?>
    <center>
        <Form action="guardarespecialidad.php" method="POST">
            <div class="input-form">
                <label>Nombre :</label>
                <input type="text" name="cnombre_especialidad">
            </div>
            <br>
            <div class="input-form">
                <input type="submit" value="Guardar">
            </div>
        </Form>

        <br>
        <a href="especialidades.php">
        <button>Cancelar</button>
        </a>
    </center>
</body>

</html>