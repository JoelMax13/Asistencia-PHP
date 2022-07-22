<?php
    include ("../Controladores/CrearConexion.php");
    function ObtenerIdProyecto($conexion, $proyecto){
        //Obtener Id Proyecto
        $Select_ProId = "Select PRO_ID from tbl_proyecto where (PRO_NOMBRE = '{$proyecto}')";
        $OBJ_PRO_ID = mysqli_query($conexion, $Select_ProId);
        $ARR_PRO_ID = mysqli_fetch_assoc($OBJ_PRO_ID);
        $PRO_ID = implode($ARR_PRO_ID);
        return $PRO_ID;
    }


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
            <h1>Asistencia registrada por: </h1>
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
            <div class="container A_container">
                <!-- Mostrar Lista de personas -->
                <ul>

                    <?php
                        $select = "SELECT USU_NOMAPE FROM `tbl_usuario` as USU 
                                    LEFT JOIN tbl_usuario_proyecto as USPR 
                                    ON (USU.USU_ID = USPR.USU_ID) WHERE (USPR.PRO_ID = '{$PRO_ID}'); ";
                        $result = mysqli_query($conexion, $select);

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                echo 
                                '<li class="mb-3 row">
                                    <label class="col-sm-5 col-form-label">'.$row["USU_NOMAPE"].'</label>
                                    <div class="col-sm-7">
                                        <select class="form-select">
                                            <option value="1">Presente</option>
                                            <option value="0">Ausente</option>
                                        </select>
                                    </div>
                                </li>';
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

</html>