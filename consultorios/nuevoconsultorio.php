<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>CENTRO DE SALUD - NUEVO CONSULTORIO</title>
</head>

<body>

    <?php

    $error="";

    if(isset($_REQUEST['error'])){
        $error=$_REQUEST['error'];
    }

    //header de la pagina

    include('../plantillas/header.php');

    echo "<center><u><h2>NUEVO CONSULTORIO</h2></u>";
    ?>
    <center>
        <Form action="guardarconsultorio.php" method="POST">
            <div class="input-form">
                <label>Nombre :</label>
                <input type="text" name="cnombre_consultorio" size="50" minlength="5" required>

                <?php 
                    if($error<>""){
                        echo" <br><span style='color:red'>$error</span>";
                    }
                ?>
            </div>
            <br>
            <div class="input-form">
                <input type="submit" value="Guardar">
            </div>
        </Form>

        <br>
        <a href="consultorios.php">
        <button>Cancelar</button>
        </a>

    </center>
</body>

</html>