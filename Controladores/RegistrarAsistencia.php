<?php
    include ("../Controladores/CrearConexion.php");
    $PRO_ID = $_POST['proyecto'];
    $AsistenciaRegistrada = GuardarAsistencia($conexion, $PRO_ID);
    if($AsistenciaRegistrada){
        echo '<script language="javascript">alert("Datos guardados correctamente!");window.location.href="../Vistas/Inicio.php"</script>';
    }else{
        echo '<script language="javascript">alert("No se pudo ingresar los datos");window.location.href="../Vistas/Inicio.php"</script>';
    }
    
    function GuardarAsistencia($conexion, $PRO_ID){
        $retorno = false;
        $Select_UsPr = "SELECT USPR_ID FROM tbl_usuario_proyecto 
                    WHERE (PRO_ID = '{$PRO_ID}'); ";
        $Resultado = mysqli_query($conexion, $Select_UsPr);

        while($Lista_UsPr = mysqli_fetch_assoc($Resultado)) {
            //Guardar datos
            $UsPr_ID = $Lista_UsPr['USPR_ID'];
            if(isset($_POST['valor'.$UsPr_ID])){
                $ASIS_VERIFICACION = $_POST['valor'.$UsPr_ID];
                $Insert_Asistencia = "INSERT INTO tbl_asistencia (USPR_ID, ASIS_FECHA, ASIS_REGISTRADOR, ASIS_VERIFICACION)
                                VALUES ('{$UsPr_ID}','{$_SESSION['fechaActual']}','{$_SESSION['registrador']}','{$ASIS_VERIFICACION}')";
                $AsistenciaIngresada = mysqli_query($conexion, $Insert_Asistencia);
                if($AsistenciaIngresada){
                    $retorno = true;
                }else{
                    $retorno = false;
                }
            }else{
                $retorno = true;
            }
        }
        return $retorno;
    }

    
?>