<?php
    include ("../Controladores/CrearConexion.php");
    include ("../Controladores/Funciones.php");
    //application/vnd.openxmlformats-officedocument.spreadsheetml.sheet en vez -> application/vnd.ms-excel
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8");
    header("Content-Disposition: attachment; filename=datos.xls");
    $PRO_ID = $_GET['id'];
    $diaActual = date('d');
    $mesActual = date('m');
    $anioActual = date('Y');
    $contador = 1;
?>
<table>
    <thead>
        <tr>
            <?php
                setlocale(LC_TIME,"spanish");
                $num = $diaActual + 11;
                echo "<th colspan=".$num.">".ucfirst(strftime('%B'))."</th>";
            ?>
        </tr>
        <tr>
            <th>N°</th>
            <th>Nombre Apellido</th>
            <th>CI</th>
            <th>Cargo</th>
            <?php
                for($i = 1; $i <= $diaActual; $i++){
                    echo '<th>'.$i.'</th>';
                }
                echo '<th>Total</th>';
                $Select_Obs = "SELECT OBS_CODIGO, OBS_COLOR FROM tbl_observacion";
                $Arr_Obs = mysqli_query($conexion, $Select_Obs);
                while($ObsArr = mysqli_fetch_assoc($Arr_Obs)){
                    echo '<th style="background-color:'.$ObsArr['OBS_COLOR'].';">'.$ObsArr['OBS_CODIGO'].'</th>';
                }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
            // TablaUsuarios($conexion, $PRO_ID);
            $Arr_UsuariosCargo = GetUsuariosInformacion($conexion, $PRO_ID);
            while($conjuntoDatos = mysqli_fetch_assoc($Arr_UsuariosCargo)) {
                echo'
                <tr class="altura">
                    <td roswpan="2">'.$contador++.'</td>
                    <td roswpan="2">'.$conjuntoDatos['USU_NOMAPE'].'</td>
                    <td roswpan="2">'.$conjuntoDatos['USU_CEDULA'].'</td>
                    <td roswpan="2">'.$conjuntoDatos['USPR_CARGO'].'</td>';
                    MostrarAsistencia($conexion, $conjuntoDatos['USPR_ID'],$diaActual,$mesActual,$anioActual);
                    $TOTAL_ASIS = MostrarTotalAsistencia($conexion, $conjuntoDatos['USPR_ID'], $diaActual, $mesActual, $anioActual);
                    //Descanso
                    $TOTAL_D = MostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],1, $diaActual, $mesActual, $anioActual);
                    //Faltas Justificadas
                    $TOTAL_FJ = MostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],2, $diaActual, $mesActual, $anioActual);
                    //Faltas injustificadas
                    $TOTAL_FI = MostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],3, $diaActual, $mesActual, $anioActual);
                    //Jornada nocturna
                    $TOTAL_JN = MostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],4, $diaActual, $mesActual, $anioActual);
                    //Atraso
                    $TOTAL_AT = MostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],5, $diaActual, $mesActual, $anioActual);
                    //Licencia sin goce de sueldo -> Días sin asistir y sin paga
                    $TOTAL_LQ = MostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],6, $diaActual, $mesActual, $anioActual);

                    echo '<td>'.$TOTAL_ASIS.'</td>
                        <td>'.$TOTAL_D.'</td>
                        <td>'.$TOTAL_FJ.'</td>
                        <td>'.$TOTAL_FI.'</td>
                        <td>'.$TOTAL_JN.'</td>
                        <td>'.$TOTAL_AT.'</td>
                        <td>'.$TOTAL_LQ.'</td>
                    </tr><tr>
                    <td roswpan="2"></td>
                    <td roswpan="2"></td>
                    <td roswpan="2"></td>
                    <td roswpan="2"></td>';
                    MostrarHorasExtra($conexion, $conjuntoDatos['USPR_ID'],$diaActual,$mesActual,$anioActual);
                    $TOTAL_HE = MostrarTotalHorasExtra($conexion, $conjuntoDatos['USPR_ID'], $diaActual, $mesActual, $anioActual);
                    echo '<td>'.$TOTAL_HE.'</td></tr>';
            }
        ?>
    </tbody>
</table>