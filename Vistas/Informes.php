<?php
    include ("../Controladores/CrearConexion.php");
    $Pro_Nombre = $_GET['nombre'];
    $ARR_PRO = ObtenerProyecto($conexion, $Pro_Nombre);
    $PRO_ID = $ARR_PRO['PRO_ID'];
    $PRO_CLIENTE = $ARR_PRO['PRO_CLIENTE'];
    $diaActual = date('d');
    $mesActual = date('m');
    $anioActual = date('Y');

    
    function ObtenerProyecto($conexion, $proyecto){
        //Obtener Id Proyecto
        $Select_ProId = "Select PRO_ID, PRO_CLIENTE from tbl_proyecto where (PRO_NOMBRE = '{$proyecto}')";
        $OBJ_PRO_ID = mysqli_query($conexion, $Select_ProId);
        $ARR_PRO_ID = mysqli_fetch_assoc($OBJ_PRO_ID);
        // $PRO_ID = implode($ARR_PRO_ID);
        return $ARR_PRO_ID;
    }
    function numeroUsuarios($conexion, $PRO_ID){
        $Select_UsuCargo = "SELECT USU.*, USPR.USPR_ID ,USPR.USPR_CARGO FROM tbl_usuario AS USU 
                                        left JOIN tbl_usuario_proyecto AS USPR 
                                        ON USU.USU_ID = USPR.USU_ID WHERE ((USPR.PRO_ID = '{$PRO_ID}')AND(USPR.USPR_ESTADO = 'activo'))
                                        ORDER BY USPR.USPR_ID ASC";
        $Arr_UsuariosCargo = mysqli_query($conexion, $Select_UsuCargo);
        return $Arr_UsuariosCargo;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <link href="../Diseno/Sistema.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- <script src="../Diseno/Funciones.js"></script> -->
</head>
<body>
    <?php
        include("MenuPrincipal.php");
    ?>

    <div class="body">
        
    <header>
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item derecha">
                <img src="../Imagenes/logo.jpg" class="card-img-top imagen">
            </li>
            <li class="list-group-item centro">
                <div>
                    <label>Sistema de gestión de la calidad</label>
                    <label>Control diario de asistencia en campo</label>
                    <label><strong>Código: </strong>RG-7 .2-09</label>
                    <label><strong>Version: </strong> 05</label>
                </div>
            </li>
            <li class="list-group-item izquierda">
                <div class="card">

                </div>
            </li>
        </ul>
    </header>
    
    <div class="infoBasica">
        <label><strong>Cliente: </strong><?php echo $PRO_CLIENTE ?></label>
        <label><strong>Proyecto: </strong><?php echo $Pro_Nombre ?></label>
        <label><strong>Ubicación: </strong>SACHA</label>
    </div>

    <ul class="list-group list-group-horizontal">
        <li class="list-group-item bIzquierda" style="overflow: auto;">
            <table class="table table-bordered border-dark">
                <tr class="altBase">
                    <td class="PK"><strong>N°</strong></td>
                    <td><strong>Nombre Apellido</strong></td>
                    <td><strong>CI</strong></td>
                    <td><strong>Cargo</strong></td>
                </tr>
                <!--Codigo para generar tabla-->
                <?php
                    $Arr_UsuariosCargo = numeroUsuarios($conexion, $PRO_ID);
                    $contador = 1;
                    while($conjuntoDatos = mysqli_fetch_assoc($Arr_UsuariosCargo)) {
                        echo'
                        <tr class="altura">
                            <td>'.$contador++.'</td>
                            <td>'.$conjuntoDatos['USU_NOMAPE'].'</td>
                            <td>'.$conjuntoDatos['USU_CEDULA'].'</td>
                            <td>'.$conjuntoDatos['USPR_CARGO'].'</td>
                        </tr>';
                    }
                ?>
            </table>
        </li>
        <li class="list-group-item bCentro" style="overflow: auto;">
            <!--Tabla del mes-->
            <table class="table table-bordered border-dark">
                <tr class="altBaseDos">
                    <?php
                        setlocale(LC_TIME,"spanish");
                        echo "<th colspan=".$diaActual.">".ucfirst(strftime('%B'))."</th>";
                    ?>
                    
                </tr>
                <tr class="altBaseDos">
                    <?php
                        for($i = 1; $i <= $diaActual; $i++){
                            echo '<td>'.$i.'</td>';
                        }
                    ?>
                </tr>
                <!--Codigo para generar tabla-->
                <?php
                    $numUsu = numeroUsuarios($conexion, $PRO_ID);
                    while($conjuntoDatos = mysqli_fetch_assoc($numUsu)){
                        echo "<tr>".mostrarAsistencia($conexion, $conjuntoDatos['USPR_ID'],$diaActual,$mesActual,$anioActual)."</tr>";
                        echo "<tr>".mostrarHorasExtra($conexion, $conjuntoDatos['USPR_ID'],$diaActual,$mesActual,$anioActual)."</tr>";
                    }

                    function mostrarHorasExtra($conexion, $Id,$diaActual,$mesActual,$anioActual){
                        for($dia = 1; $dia <= $diaActual; $dia++){
                            $fecha = $anioActual.'-'.$mesActual.'-'.$dia;
                            $Select_HorasExtra = "SELECT HEXTRA_NUMHORAS FROM tbl_horasextra WHERE ((USPR_ID = '{$Id}')AND(HEXTRA_FECHATRABAJO = '{$fecha}'))";
                            $Res_SelectHE = mysqli_query($conexion, $Select_HorasExtra);
                            $DiaHE = mysqli_fetch_assoc($Res_SelectHE);
                            if($DiaHE != NULL){
                                echo '<td class="alturaDoble">'.$DiaHE['HEXTRA_NUMHORAS'].'</td>';
                            }else{
                                echo '<td class="alturaDoble"></td>';
                            }
                        }
                    }
                    function mostrarAsistencia($conexion, $Id, $diaActual, $mesActual, $anioActual){
                        
                        for($dia = 1; $dia <= $diaActual; $dia++){
                            $fecha = $anioActual.'-'.$mesActual.'-'.$dia;
                            $Select_Asistencia = "SELECT ASIS_ID FROM `tbl_asistencia` WHERE ((USPR_ID = '{$Id}')AND(ASIS_FECHA = '{$fecha}')AND(ASIS_VERIFICACION = 1))";
                            $Arr_Asistencia = mysqli_query($conexion, $Select_Asistencia);
                            $Asistencia = mysqli_fetch_assoc($Arr_Asistencia);
                            if($Asistencia == NULL){
                                $Select_ObservacionDia = "SELECT OBS_ID FROM `tbl_asistencia` WHERE ((USPR_ID = '{$Id}')AND(ASIS_FECHA = '{$fecha}'))";
                                $Res_ObservacionDia = mysqli_query($conexion, $Select_ObservacionDia);
                                $Arr_Obs = mysqli_fetch_assoc($Res_ObservacionDia);
                                if($Arr_Obs != NULL){
                                    $Select_CODObs = "SELECT OBS_CODIGO, OBS_COLOR FROM tbl_observacion WHERE OBS_ID = '{$Arr_Obs['OBS_ID']}'";
                                    $Res_Obs = mysqli_query($conexion, $Select_CODObs);
                                    $ArrObsId = mysqli_fetch_assoc($Res_Obs);
                                    if($ArrObsId !=NULL){
                                        echo '<td class="alturaDoble" style="background-color:'.$ArrObsId['OBS_COLOR'].';">'.$ArrObsId['OBS_CODIGO'].'</td>';
                                    }else{
                                        echo '<td class="alturaDoble"></td>';
                                    }
                                }else{
                                    echo '<td class="alturaDoble"></td>';
                                }
                            }else{
                                echo '<td class="alturaDoble">1</td>';
                            }
                            
                        }
                    }
                ?>
                
                
                    
                    
            </table>
        </li>

        <li class="list-group-item bDerecha" style="overflow: auto;">
            <table class="table table-bordered border-dark tDerecha" style="overflow: auto;">
                <tr class="altBase">
                    <td>Total</td>
                    <?php
                        $Select_Obs = "SELECT OBS_CODIGO, OBS_COLOR FROM tbl_observacion";
                        $Arr_Obs = mysqli_query($conexion, $Select_Obs);
                        while($ObsArr = mysqli_fetch_assoc($Arr_Obs)){
                            echo '<td style="background-color:'.$ObsArr['OBS_COLOR'].';">'.$ObsArr['OBS_CODIGO'].'</td>';
                        }
                    ?>
                </tr>
                <!--Codigo para generar tabla-->
                <?php
                    $numUsu = numeroUsuarios($conexion, $PRO_ID);
                    while($conjuntoDatos = mysqli_fetch_assoc($numUsu)){
                        echo "<tr>".
                        mostrarTotal($conexion, $conjuntoDatos['USPR_ID']).
                        mostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],1).
                        mostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],2).
                        mostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],3).
                        mostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],4).
                        mostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],5).
                        mostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],6)
                        ."</tr>";
                    }

                    function mostrarTotal($conexion, $Id){
                        $Select_Asistencia = "SELECT count(*) FROM `tbl_asistencia` WHERE ((USPR_ID = '{$Id}')AND(ASIS_VERIFICACION = 1))";
                        $Res_Asistencia = mysqli_query($conexion, $Select_Asistencia);
                        $ARR_ASIS = mysqli_fetch_assoc($Res_Asistencia);
                        $N_ASIS = implode($ARR_ASIS);

                        $Select_Asistencia = "SELECT HEXTRA_NUMHORAS FROM `tbl_horasextra` WHERE ((USPR_ID = '{$Id}')AND(ASIS_VERIFICACION = 1))";
                        echo '<td class="alturaDoble">'.$N_ASIS.'</td>';
                    }

                    function mostrarObservaciones($conexion, $Id, $OBS_ID){
                        $Select_Asistencia = "SELECT count(*) FROM `tbl_asistencia` WHERE ((USPR_ID = '{$Id}')AND(OBS_ID = '{$OBS_ID}'))";
                        $Res_Asistencia = mysqli_query($conexion, $Select_Asistencia);
                        $ARR_ASIS = mysqli_fetch_assoc($Res_Asistencia);
                        $N_ASIS = implode($ARR_ASIS);
                        echo '<td class="altura">'.$N_ASIS.'</td>';
                    }

                    
                ?>
            </table>
        </li>
    </ul>
    </div>
    <?php
        include("Botones.php");
    ?>

</body>
</html>