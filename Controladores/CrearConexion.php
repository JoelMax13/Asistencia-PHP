<?php
date_default_timezone_set('America/Guayaquil');
session_start();
    $_SESSION['registrador'] = "Luis Joel Oña Méndez";
    $_SESSION['fechaActual'] = date('Y-m-d'); 
    $_SESSION['horaActual'] = date('h:i:s');

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