<?php
session_start();
    $_SESSION['registrador'] = "Luis Joel Oña Méndez";
    $_SESSION['fechaActual'] = date('Y-m-d'); 
    $usuario = "root";
    $contrasena = "";
    $server = "localhost";
    $db = "asistenciatectotal";
    //Puerto Oficina
    $puerto = "3306";
    //  Puerto Casa
    // $puerto = "3307";

    $conexion = mysqli_connect($server, $usuario, $contrasena, $db, $puerto);

    if(!$conexion){
        echo "Error en la conexión con la base de datos.";
    }
?>
//session_destroy();