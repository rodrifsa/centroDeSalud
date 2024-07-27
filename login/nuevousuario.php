<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">

    <title>CENTRO DE SALUD - NUEVO USUARIO</title>
</head>

<body>

    <?php

    $error="";

    if(isset($_REQUEST['error'])){
        $error=$_REQUEST['error'];
    }

    //header de la pagina

    include('../plantillas/header.php');

    echo "<center><u><h2>NUEVO USUARIO</h2></u>";

    //conectar a la base de datos
    $db_servidor ="127.0.0.1"; //es lo mismo que localhost
    $db_usuario = "root";
    $db_password= "";
    $db_basededatos ="centro_de_salud";

    $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
        or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");


    //preparo la consulta a la tabla turnos MODIFICAR
    //$consulta ="SELECT * FROM turnos ";

    
    //realizar consulta a la tabla turnos
    //$respuesta = mysqli_query( $conexion, $consulta ) 
    //    or die("ERROR EN LA CONSULTA");

    //preparo la consulta a la tabla usuarios
    $consultausers ="SELECT id, cnombre_usuario, ccontrasenia_usuario FROM usuarios";
    
    //realizar consulta a la tabla usuarios
    $usuarios = mysqli_query( $conexion, $consultausers ) 
        or die("ERROR EN LA CONSULTA");

    ?>
    <center>
        <Form action="guardarusuario.php" method="POST">


           <!-- nuevo usuario -->
           <div class="input-form">
                <label>Ingrese su nuevo nombre de usuario:</label>
                <input type="text" name="cnombre_usuario" size="50" minlength="5" placeholder="El usuario debe tener minimo 5 caracteres" required>

                <?php 
                    if($error<>""){
                        echo" <br><span style='color:red'>$error</span>";
                    }
                ?>
            </div>

            <br>
            <!-- nueva contraseña -->
           <div class="input-form">
                <label>Ingrese su nueva contraseña:</label>
                <input type="text" name="ccontrasenia_usuario" size="50" minlength="5" placeholder="La contraseña debe tener minimo 5 caracteres" required>

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
        <a href="../home.php">
        <button>Cancelar</button>
        </a>
    </center>
</body>

</html>