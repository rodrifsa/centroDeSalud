<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>Centro De Salud - Nueva Especialidad</title>

    <link rel="icon" type="ico" href="../images/favicon.ico" />
</head>

<body>

    <?php
    //header de la pagina

    include('../plantillas/header.php');

    ?>
    <div class="formulario">
        <Form action="guardarespecialidad.php" method="POST">
            <h2>Nueva Especialidad</h2>

            <div class="input-form">
                <label>Nombre:</label>
                <input type="text" class="campo" placeholder="Ingrese la especialidad" name="cnombre_especialidad">
            </div>
            
            <div class="btn-input">
                <input type="submit" class="btn-nuevo nuevo" value="Agregar Especialidad">
                <a href="especialidades.php" class="btn-volver">Cancelar</a>
            </div>
        </Form>
    </div>

    <?php
    include('../plantillas/footer.php');
    ?>

</body>

</html>