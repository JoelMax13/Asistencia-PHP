<?php
    include ("../Controladores/CrearConexion.php");

    $PRO_ID = $_POST['proyecto'];
    
    $ObservacionRegistrada = RegistrarObservaciones($conexion, $PRO_ID);
    if($ObservacionRegistrada){
        echo '<script language="javascript">alert("Datos guardados correctamente!");window.location.href="../Vistas/Inicio.php"</script>';
    }else{
        echo '<script language="javascript">alert("No se pudo ingresar los datos");window.location.href="../Vistas/Inicio.php"</script>';
    }

    function RegistrarObservaciones($conexion, $PRO_ID){
        $retorno = false;
        $Select_UsPr = "SELECT USPR_ID FROM tbl_usuario_proyecto 
                    WHERE (PRO_ID = '{$PRO_ID}'); ";
        $Resultado = mysqli_query($conexion, $Select_UsPr);

        while($Lista_UsPr = mysqli_fetch_assoc($Resultado)) {
            //Guardar datos
            $UsPr_ID = $Lista_UsPr['USPR_ID'];
            $ASIS_ID = BuscarAsistenciaID($conexion, $UsPr_ID);
            if(isset($_POST['sel'.$ASIS_ID])){
                $OBS_ID = $_POST['sel'.$ASIS_ID];
            }else{
                $OBS_ID = NULL;
            }
            if(isset($_POST['obs'.$ASIS_ID])){
                $ASIS_OBSERVACION = $_POST['obs'.$ASIS_ID];
            }else{
                $ASIS_OBSERVACION = NULL;
            }
            
            $Almacenado = AlmacenarObservaciones($conexion, $ASIS_ID, $OBS_ID, $ASIS_OBSERVACION);
            if($Almacenado){
                $retorno = true;
            }
        }
        return $retorno;
    }

    function BuscarAsistenciaID($conexion, $UsPr_ID){
        $Select_ConRegistro = "SELECT ASIS_ID FROM tbl_asistencia 
                                WHERE ((USPR_ID = '{$UsPr_ID}')AND(ASIS_FECHA = '{$_SESSION['fechaActual']}')AND(ASIS_VERIFICACION = 0)); ";
        $RegistradoConAsis = mysqli_query($conexion, $Select_ConRegistro);
        $Registrado = mysqli_fetch_assoc($RegistradoConAsis);
        if($Registrado != NULL){
            return $Registrado['ASIS_ID'];
        }
    }

    function AlmacenarObservaciones($conexion, $ASIS_ID, $OBS_ID, $ASIS_OBSERVACION){
        $Update_Observaciones = "UPDATE tbl_asistencia SET OBS_ID = '{$OBS_ID}', ASIS_OBSERVACION = '{$ASIS_OBSERVACION}' 
                                WHERE ASIS_ID = '{$ASIS_ID}'";
        $Registrado = mysqli_query($conexion, $Update_Observaciones);
        if($Registrado){
            return true;
        }else{
            return false;
        }
    }
?>