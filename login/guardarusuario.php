<?php

$cnombre_usuario = ($_REQUEST['cnombre_usuario']);
$ccontrasenia_usuario = ($_REQUEST['ccontrasenia_usuario']);
$error = "";

// Conectar a la base de datos
$db_servidor = "127.0.0.1"; // Es lo mismo que localhost
$db_usuario = "root";
$db_password = "";
$db_basededatos = "centro_de_salud";

$conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_basededatos)
    or die("NO SE PUDO CONECTAR A LA BASE DE DATOS");

// Verificar si el usuario ya existe
$consulta_check = "SELECT * FROM usuarios WHERE cnombre_usuario = '$cnombre_usuario'";
$respuesta_check = mysqli_query($conexion, $consulta_check);

if (mysqli_num_rows($respuesta_check) > 0) {
    // Si el usuario ya existe, redirigir con un mensaje de error
    $error = "El nombre de usuario ya existe. Por favor, elija otro.";
    header("location: nuevousuario.php?error=" . urlencode($error));
} else {
    // Si el usuario no existe, proceder con la inserción
    $consulta_insert = "INSERT INTO usuarios (cnombre_usuario, ccontrasenia_usuario) VALUES ('$cnombre_usuario', '$ccontrasenia_usuario')";
    
    if (mysqli_query($conexion, $consulta_insert)) {
        // Redirigir al login con un mensaje de éxito
        header("location: login.php?message=" . urlencode("Usuario creado exitosamente."));
    } else {
        // En caso de error en la inserción, redirigir con un mensaje de error
        $error = "Error al crear el usuario. Por favor, inténtelo de nuevo.";
        header("location: nuevousuario.php?error=" . urlencode($error));
    }
}

// Cerrar la conexión
mysqli_close($conexion);

?>


