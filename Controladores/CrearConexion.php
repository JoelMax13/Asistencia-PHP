<?php
date_default_timezone_set('America/Guayaquil');
session_start();
    $_SESSION['id'] = 8;
    $_SESSION['registrador'] = "LUIS JOEL OÑA MÉNDEZ";
    $_SESSION['fechaActual'] = date('Y-m-d'); 
    $_SESSION['horaActual'] = date('H:i:s');

    $usuario = "root";
    $contrasena = "";
    $server = "localhost";
    $db = "asistencia_tectotal";
    //Puerto Oficina
    $puerto = "3306";
    //  Puerto Casa
    // $puerto = "3307";

    $conexion = mysqli_connect($server, $usuario, $contrasena, $db, $puerto);

    if(!$conexion){
        echo "Error en la conexión con la base de datos.";
    }
    //session_destroy();
?>