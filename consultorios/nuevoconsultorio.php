<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>Centro De Salud - Nuevo Consultorio</title>

    <link rel="icon" type="ico" href="../images/favicon.ico" />
</head>

<body>

    <?php

    $error = "";

    if (isset($_REQUEST['error'])) {
        $error = $_REQUEST['error'];
    }

    //header de la pagina

    include('../plantillas/header.php');

    ?>
    <div class="formulario">
        <Form action="guardarconsultorio.php" method="POST">
            <h2>Nuevo Consultorio</h2>

            <div class="input-form">
                <?php
                if ($error <> "") {
                    echo " <br><span style='color:red'>$error</span>";
                }
                ?>

                <label>Nombre :</label>
                <input type="text" name="cnombre_consultorio" placeholder="Ingrese el nombre del consultorio..." class="campo" size="50" minlength="5" required>


            </div>

            <div class="btn-input">
                <input type="submit" class="btn-nuevo nuevo" value="Agregar Consultorio">
                <a href="consultorios.php" class="btn-volver">Cancelar</a>
            </div>

        </Form>
    </div>

    <?php
    include('../plantillas/footer.php');
    ?>

</body>

</html>