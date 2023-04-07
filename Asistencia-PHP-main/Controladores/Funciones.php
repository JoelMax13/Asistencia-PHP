<?php
    $btnObservaciones = "hidden";
    //MENÚ
    function GetProyectosDeUsuario($conexion, $pagina){
        $select = "Select PRO_ID from tbl_acceso where (USU_ID = '{$_SESSION['id']}')";
        $result = mysqli_query($conexion, $select);

        if (mysqli_num_rows($result) > 0) {
            while($Lista = mysqli_fetch_assoc($result)) {
                $Select_ProId = "Select PRO_NOMBRE from tbl_proyecto where (PRO_ID = '{$Lista['PRO_ID']}')";
                $OBJ_PRO_NOMBRE = mysqli_query($conexion, $Select_ProId);
                $ARR_PRO_NOMBRE = mysqli_fetch_assoc($OBJ_PRO_NOMBRE);
                $PRO_NOMBRE = implode($ARR_PRO_NOMBRE);
                echo 
                '<li>
                    <a href="'.$pagina.'?nombre='.$PRO_NOMBRE.'"class="dropdown-item" name="NomPro">'.$PRO_NOMBRE.'</a>
                </li>';
            }
        } else {
            echo "No tiene accesos";
        }
    }

    //CREAR USUARIO
    function GetProyectos($conexion){
        $Select_Pro_Nombre = "Select PRO_NOMBRE from TBL_PROYECTO;";
        $Pro_Nombre = mysqli_query($conexion, $Select_Pro_Nombre);

        if (mysqli_num_rows($Pro_Nombre) > 0) {
            while($Lista = mysqli_fetch_assoc($Pro_Nombre)) {
                echo 
                '<option>'.$Lista["PRO_NOMBRE"].'</option>';
            }
        }
    }

    //ASISTENCIA, OBSERVACIONES E INFORMES
    function GetIdProyecto($conexion, $proyecto){
        //Obtener Id Proyecto
        $Select_ProId = "Select PRO_ID from tbl_proyecto where (PRO_NOMBRE = '{$proyecto}')";
        $OBJ_PRO_ID = mysqli_query($conexion, $Select_ProId);
        $ARR_PRO_ID = mysqli_fetch_assoc($OBJ_PRO_ID);
        $PRO_ID = implode($ARR_PRO_ID);
        return $PRO_ID;
    }

    function GetUsuarios($conexion, $PRO_ID){
        $Select_UsuariosProyecto = "SELECT USPR.USPR_ID, USU_NOMAPE FROM `tbl_usuario` as USU 
                                    LEFT JOIN tbl_usuario_proyecto as USPR 
                                    ON (USU.USU_ID = USPR.USU_ID) 
                                    WHERE ((USPR.PRO_ID = '{$PRO_ID}')AND(USPR_ESTADO = 'activo')); ";
        $Arr_UsuariosProyecto = mysqli_query($conexion, $Select_UsuariosProyecto);
        return $Arr_UsuariosProyecto;
    }

    //ASISTENCIA
    function GetUsuariosAsistencia($conexion, $PRO_ID){
        $Arreglo = GetUsuarios($conexion, $PRO_ID);
        if (mysqli_num_rows($Arreglo) > 0) {
            while($conjuntoDatos = mysqli_fetch_assoc($Arreglo)) {
                VerificarAsistenciaManana($conexion, $conjuntoDatos['USPR_ID'], $conjuntoDatos['USU_NOMAPE']);
            }
        } else {
            echo "No hay usuarios en este proyecto";
        }
    }

    function VerificarAsistenciaManana($conexion, $UsPr_ID, $USU_NOMAPE){
        $Select_ConRegistro = "SELECT USPR_ID FROM tbl_asistencia 
                                WHERE ((USPR_ID = '{$UsPr_ID}')AND(ASIS_FECHA = '{$_SESSION['fechaActual']}')AND(ASIS_VERIFICACION = 1)); ";
        $RegistradoConAsis = mysqli_query($conexion, $Select_ConRegistro);
        $Registrado = mysqli_fetch_assoc($RegistradoConAsis);
        if($Registrado == NULL){
            echo 
            '<li class="mb-3 row">
                <label class="col-sm-5 col-form-label">'.$USU_NOMAPE.'</label>
                <div class="col-sm-7">
                    <select name="valor'.$UsPr_ID.'" class="form-select">
                        <option value="0">Ausente</option>
                        <option value="1">Presente</option>
                    </select>
                </div>
            </li>';
        }
    }

    //Observaciones
    function GetUsuariosObservaciones($conexion, $PRO_ID){
        $Arreglo = GetUsuarios($conexion, $PRO_ID);
        if (mysqli_num_rows($Arreglo) > 0) {
            while($conjuntoDatos = mysqli_fetch_assoc($Arreglo)) {
                VerificarAsistenciaTarde($conexion, $conjuntoDatos['USPR_ID'], $conjuntoDatos['USU_NOMAPE']);
            }
        } else {
            echo "No existen personas en este proyecto";
        }
    }

    function VerificarAsistenciaTarde($conexion, $UsPr_ID, $USU_NOMAPE){
        $Select_ConRegistro = "SELECT ASIS_ID, USPR_ID, OBS_ID FROM tbl_asistencia 
                                WHERE ((USPR_ID = '{$UsPr_ID}')AND(ASIS_FECHA = '{$_SESSION['fechaActual']}')AND(ASIS_VERIFICACION = 0)); ";
        $RegistradoConAsis = mysqli_query($conexion, $Select_ConRegistro);
        $Registrado = mysqli_fetch_assoc($RegistradoConAsis);//Codigo repetido
        if(($Registrado != NULL)&&($Registrado['OBS_ID'] == NULL)){
            echo 
            '<li class="mb-3 row">
                <label class="col-sm-4 col-form-label">'.$USU_NOMAPE.'</label>
                <div class="col-sm-3"> 
                        <select class="form-select" name="sel'.$Registrado['ASIS_ID'].'">';
            GetListaObservaciones($conexion);
            echo '</select>
                    </div>
                    <div class="col-sm-5">
                        <input name="obs'.$Registrado['ASIS_ID'].'" class="form-control"></input>
                    </div>
            </li>';
            $GLOBALS['btnObservaciones'] = "";
        }
    }

    function GetListaObservaciones($conexion){
        $Select_Observaciones = "Select OBS_ID, OBS_COMENTARIO from tbl_observacion";
        $result = mysqli_query($conexion, $Select_Observaciones);
        while($elemento = mysqli_fetch_assoc($result)) {
            echo 
            '<option value="'.$elemento['OBS_ID'].'">'
                .$elemento['OBS_COMENTARIO'].
            '</option>';
        }
    }

    //Horas Extra
    function GetUsuariosHorasExtra($conexion, $PRO_ID){
        $Select_UsuariosProyecto = "SELECT USPR.USPR_ID, USU_NOMAPE FROM `tbl_usuario` as USU 
                                    LEFT JOIN tbl_usuario_proyecto as USPR 
                                    ON (USU.USU_ID = USPR.USU_ID) WHERE ((USPR.PRO_ID = '{$PRO_ID}')AND(USPR_ESTADO = 'activo')); ";
        $Arr_UsuariosProyecto = mysqli_query($conexion, $Select_UsuariosProyecto);
        while($conjuntoDatos = mysqli_fetch_assoc($Arr_UsuariosProyecto)) {
            echo
            '<Option value='.$conjuntoDatos["USPR_ID"].'>'.$conjuntoDatos['USU_NOMAPE'].'</Option>';
        }
    }

    //Informes
    function GetProyecto($conexion, $proyecto){
        $Select_ProId = "Select PRO_ID, PRO_CLIENTE from tbl_proyecto where (PRO_NOMBRE = '{$proyecto}')";
        $OBJ_PRO_ID = mysqli_query($conexion, $Select_ProId);
        $ARR_PRO_ID = mysqli_fetch_assoc($OBJ_PRO_ID);
        return $ARR_PRO_ID;
    }

    function GetUsuariosInformacion($conexion, $PRO_ID){
        $Select_UsuCargo = "SELECT USU.*, USPR.USPR_ID ,USPR.USPR_CARGO FROM tbl_usuario AS USU 
                                        left JOIN tbl_usuario_proyecto AS USPR 
                                        ON USU.USU_ID = USPR.USU_ID WHERE ((USPR.PRO_ID = '{$PRO_ID}')AND(USPR.USPR_ESTADO = 'activo'))
                                        ORDER BY USPR.USPR_ID ASC";
        $Arr_UsuariosCargo = mysqli_query($conexion, $Select_UsuCargo);
        return $Arr_UsuariosCargo;
    }

    function TablaUsuarios($conexion, $PRO_ID){
        $Arr_UsuariosCargo = GetUsuariosInformacion($conexion, $PRO_ID);
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
    }

    function TablaInformacion($conexion, $PRO_ID,$diaActual,$mesActual,$anioActual){
        $numUsu = GetUsuariosInformacion($conexion, $PRO_ID);
        while($conjuntoDatos = mysqli_fetch_assoc($numUsu)){
            echo "<tr>".MostrarAsistencia($conexion, $conjuntoDatos['USPR_ID'],$diaActual,$mesActual,$anioActual)."</tr>";
            echo "<tr>".MostrarHorasExtra($conexion, $conjuntoDatos['USPR_ID'],$diaActual,$mesActual,$anioActual)."</tr>";
        }
    }

    function MostrarAsistencia($conexion, $Id, $diaActual, $mesActual, $anioActual){
                        
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
    function MostrarHorasExtra($conexion, $Id,$diaActual,$mesActual,$anioActual){
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
    function MostrarListaObservaciones($conexion){
        $Select_Obs = "SELECT OBS_CODIGO, OBS_COLOR FROM tbl_observacion";
        $Arr_Obs = mysqli_query($conexion, $Select_Obs);
        while($ObsArr = mysqli_fetch_assoc($Arr_Obs)){
            echo '<td style="background-color:'.$ObsArr['OBS_COLOR'].';">'.$ObsArr['OBS_CODIGO'].'</td>';
        }
    }

    function TablaObservaciones($conexion, $PRO_ID,$diaActual,$mesActual,$anioActual){
        $numUsu = GetUsuariosInformacion($conexion, $PRO_ID);
        while($conjuntoDatos = mysqli_fetch_assoc($numUsu)){
            $TOTAL_ASIS = MostrarTotalAsistencia($conexion, $conjuntoDatos['USPR_ID'], $diaActual, $mesActual, $anioActual);
            $TOTAL_D = MostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],0, $diaActual, $mesActual, $anioActual);
            $TOTAL_FJ = MostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],1, $diaActual, $mesActual, $anioActual);
            $TOTAL_FI = MostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],2, $diaActual, $mesActual, $anioActual);
            $TOTAL_JN = MostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],3, $diaActual, $mesActual, $anioActual);
            $TOTAL_AT = MostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],4, $diaActual, $mesActual, $anioActual);
            $TOTAL_LQ = MostrarObservaciones($conexion, $conjuntoDatos['USPR_ID'],5, $diaActual, $mesActual, $anioActual);
            $TOTAL_HE = MostrarTotalHorasExtra($conexion, $conjuntoDatos['USPR_ID'], $diaActual, $mesActual, $anioActual);
            echo "<tr>
            <td class='alturaDoble'>".$TOTAL_ASIS."</td>
            <td rowspan='2'>".$TOTAL_D."</td>
            <td rowspan='2'>".$TOTAL_FJ."</td>
            <td rowspan='2'>".$TOTAL_FI."</td>
            <td rowspan='2'>".$TOTAL_JN."</td>
            <td rowspan='2'>".$TOTAL_AT."</td>
            <td rowspan='2'>".$TOTAL_LQ."</td>
            </tr><tr>
            <td class='alturaDoble'>".$TOTAL_HE."</td>
            </tr>";
        }
    }

    function MostrarTotalAsistencia($conexion, $Id, $diaActual, $mesActual, $anioActual){
        $N_ASIS = 0;
        for($dia = 1; $dia <= $diaActual; $dia++){
            $fecha = $anioActual.'-'.$mesActual.'-'.$dia;
            $Select_Asistencia = "SELECT count(*) FROM `tbl_asistencia` 
                                WHERE ((USPR_ID = '{$Id}')AND(ASIS_VERIFICACION = 1) AND (ASIS_FECHA = '$fecha'))";
            $Res_Asistencia = mysqli_query($conexion, $Select_Asistencia);
            $ARR_ASIS = mysqli_fetch_assoc($Res_Asistencia);
            $Num_ASIS = implode($ARR_ASIS);
            if($Num_ASIS == 1){
                $N_ASIS++;
            }
        }
        return $N_ASIS;
    }

    function MostrarTotalHorasExtra($conexion, $Id, $diaActual, $mesActual, $anioActual){
        $N_HEXTRA = 0;
        for($dia = 1; $dia <= $diaActual; $dia++){
            $fecha = $anioActual.'-'.$mesActual.'-'.$dia;
            $Select_HorasExtra = "SELECT HEXTRA_NUMHORAS FROM `tbl_horasextra` 
                                    WHERE ((USPR_ID = '{$Id}')AND(HEXTRA_FECHATRABAJO = '$fecha'))";
            $Res_HorasExtra = mysqli_query($conexion, $Select_HorasExtra);
            $ARR_HEXTRA = mysqli_fetch_assoc($Res_HorasExtra);
            if($ARR_HEXTRA != NULL){
                $N_HEXTRA += $ARR_HEXTRA['HEXTRA_NUMHORAS'];
            }
        }
        return $N_HEXTRA;
    }

    function MostrarObservaciones($conexion, $Id, $OBS_ID, $diaActual, $mesActual, $anioActual){
        $N_OBS = 0;
        for($dia = 1; $dia <= $diaActual; $dia++){
            $fecha = $anioActual.'-'.$mesActual.'-'.$dia;
            $Select_Observacion = "SELECT count(*) FROM `tbl_asistencia` WHERE ((USPR_ID = '{$Id}')AND(OBS_ID = '{$OBS_ID}')AND(ASIS_FECHA = '$fecha'))";
            $Res_Observacion = mysqli_query($conexion, $Select_Observacion);
            $ARR_OBS = mysqli_fetch_assoc($Res_Observacion);
            $Num_OBS = implode($ARR_OBS);
            if($Num_OBS == 1){
                $N_OBS++;
            }
        }
        return $N_OBS;
    }
?>