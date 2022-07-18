<?php
    // Conexión a la base de datos
    require("CrearConexion.php");
    // $_SESSION['cedula'] = $_POST['Cedula'];
    $cedula = $_POST['Cedula'];
    $nomApe = $_POST['NombresApellidos'];
    $telf = $_POST['Telf'];
    $cargo = $_POST['Cargo'];
    $jornada = $_POST['Jornada'];
    $proyecto = $_POST['Proyecto'];
    $Registrador = $_SESSION['registrador'];
    $FechaActual = $_SESSION['fechaActual'];

    //Consulta
    $sql = "insert into tbl_usuario 
    (USU_CEDULA,USU_NOMAPE,USU_TELF,USU_CARGO,USU_JORNADA,USU_REGISTRADOR,USU_FECHACREACION,USU_ESTADOUSU,USU_PROYECTO) values 
    ('{$cedula}','{$nomApe}','{$telf}','{$cargo}','{$jornada}','{$Registrador}','{$FechaActual}','activo','{$proyecto}')";

    //Verificar si funcionó el ingreso
    if (mysqli_query($conexion, $sql)) {
        echo '<script language="javascript">alert("Usuario creado correctamente")</script>';
        header("Location: ../Vistas/CrearUsuario.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

//     insert into tbl_usuario (USU_CEDULA,USU_NOMAPE,USU_TELF,USU_CARGO,USU_JORNADA,USU_REGISTRADOR,USU_FECHACREACION,USU_ESTADOUSU,USU_PROYECTO) values 
// ('1111111111','Juan Andrés Dávila Luque','0984735310','Ingeniero civil','7/15','Ana María López Nuñez','2022-7-5','activo','proyecto z');
?>