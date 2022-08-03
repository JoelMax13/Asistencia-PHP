<?php
    include ("../Controladores/CrearConexion.php");
    $PRO_ID = $_POST['proyecto'];
    $HeRegistradas = GuardarHorasExtra($conexion, $PRO_ID);
    if($HeRegistradas){
        echo '<script language="javascript">alert("Datos guardados correctamente!");window.location.href="../Vistas/Inicio.php"</script>';
    }else{
        echo '<script language="javascript">alert("No se pudo ingresar los datos");window.location.href="../Vistas/Inicio.php"</script>';
    }

    function GuardarHorasExtra($conexion, $PRO_ID){
        $Insert_HExtra = "INSERT INTO tbl_horasextra (USPR_ID, HEXTRA_FECHAREGISTRO, HEXTRA_FECHATRABAJO, HEXTRA_REGISTRADOR, HEXTRA_NUMHORAS)
        VALUES ('{$_POST['selectUsPr']}','{$_SESSION['fechaHoraActual']}','{$_POST['fechaHE']}','{$_SESSION['registrador']}','{$_POST['numeroHoras']}')";
        $Registrado = mysqli_query($conexion, $Insert_HExtra);
            if($Registrado){
                return true;
            }else{
                return false;
            }
    }
?>