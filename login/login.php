<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>CENTRO DE SALUD - LOGIN</title>
</head>

<body>

    <?php
    include('../plantillas/header.php');
    ?>
    <div>
    <center>
<fieldset class="login">
    <!-- Mostrar mensaje de éxito -->
    <?php
                if (isset($_REQUEST['message'])) {
                    $message = htmlspecialchars($_REQUEST['message']);
                    echo "<p style='color: green;'>" . $message . "</p>";
                }
                ?>
<form action="verificarlogin.php" method="post">

    <label for="usuario" style='color: white;'>Usuario: 
    <input type="text" name="usuario" id="txt-usuario">
    </label>
    <br>
    <label for="pass" style='color: white;'>Contraseña: 
        <!-- <input type="password" name="pass" id="txt-pass" required
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Debe contener al menos una mayúscula, una minúscula, un número y tener más de 8 carácteres."> -->
    <input type="password" name="pass" id="txt-pass">
    </label>
    <br>
    <input type="submit" value="Ingresar">
    <br>
    <br>
    <br>
    <br>
    <br>
</form>
</fieldset>
</center>
</div>

</body>

</html>