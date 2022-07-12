<?php
    $usuario = "root";
    $contrasena = "";
    $server = "localhost";
    $db = "asistenciatectotal";
    $puerto = "3307";

    session_start();
        $_SESSION['conexion'] = mysqli_connect($server, $usuario, $contrasena, $db, $puerto);

    if(!$_SESSION['conexion']){
        echo "Error en la conexión con la base de datos.";
    }
?>