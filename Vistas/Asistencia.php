<?php
    include ("../Controladores/CrearConexion.php");
    $Pro_Nombre = $_GET['nombre'];
    $PRO_ID = ObtenerIdProyecto($conexion, $Pro_Nombre);
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
</head>

<body>
<?php
    
    include ("MenuPrincipal.php");
?>
    <div class="body">
        <div>
            <h1>Asistencias</h1>
            <label class="infoBasic">
                <strong>Fecha:</strong>
                <?php
                    echo $_SESSION['fechaActual'];
                ?>
            </label>
            <label class="infoBasic">
                <strong>Personal a cargo:</strong>
                <?php
                    echo $_SESSION['registrador'];  
                ?>
            </label>
        </div>
        <hr>
        <form action="../Controladores/RegistrarAsistencia.php" method="POST">
            <input type="text" name="proyecto" value="<?php echo $PRO_ID;?>" hidden>
            <div class="container A_container">
                <!-- Mostrar Lista de personas -->
                <ul>
                    <?php
                        $Select_UsuariosProyecto = "SELECT USPR.USPR_ID, USU_NOMAPE FROM `tbl_usuario` as USU 
                        LEFT JOIN tbl_usuario_proyecto as USPR 
                        ON (USU.USU_ID = USPR.USU_ID) WHERE ((USPR.PRO_ID = '{$PRO_ID}')AND(USPR_ESTADO = 'activo')); ";
                        $Arr_UsuariosProyecto = mysqli_query($conexion, $Select_UsuariosProyecto);
                        if (mysqli_num_rows($Arr_UsuariosProyecto) > 0) {
                            while($conjuntoDatos = mysqli_fetch_assoc($Arr_UsuariosProyecto)) {
                                $USPR_ID = $conjuntoDatos['USPR_ID'];
                                $USU_NOMAPE = $conjuntoDatos['USU_NOMAPE'];
                                VerificarAsistencia($conexion, $USPR_ID, $USU_NOMAPE);
                            }
                        } else {
                            echo "0 results";
                        }
                    ?>
                </ul>
                <button type="submit" class="btn btn-success BtnFinProc">Registrar</button>
            </div>
        </form>
    </div>
</body>
<?php
    function ObtenerIdProyecto($conexion, $proyecto){
        //Obtener Id Proyecto
        $Select_ProId = "Select PRO_ID from tbl_proyecto where (PRO_NOMBRE = '{$proyecto}')";
        $OBJ_PRO_ID = mysqli_query($conexion, $Select_ProId);
        $ARR_PRO_ID = mysqli_fetch_assoc($OBJ_PRO_ID);
        $PRO_ID = implode($ARR_PRO_ID);
        return $PRO_ID;
    }
    function VerificarAsistencia($conexion, $UsPr_ID, $USU_NOMAPE){
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
?>

</html>