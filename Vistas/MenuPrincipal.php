
    <nav class="navbar navbar-expand-lg bg-info fixed-top">
        <div class="container-fluid">
            <img src="../Imagenes/logo-png.png" class="imagenMenu" href="Inicio.php">
            <!-- <a class="navbar-brand" href="Inicio.php">Tectotal</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Inicio.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="CrearUsuario.php">Nuevo Usuario</a>
                </li>
                <?php
                    //Máximo
                    // if(($_SESSION['horaActual']<'12:00:00')&&($_SESSION['horaActual']>'06:00:00')){
                    if($_SESSION['horaActual']<'12:00:00'){
                        $estadoAsistencias='active';
                    }else{
                        $estadoAsistencias='disabled';
                    }
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php echo $estadoAsistencias;?>" id="navbarDropdownAsistencias" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Asistencias
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownAsistencias">
                    <?php
                        verAsistencias($conexion);
                    ?>
                    </ul>
                </li>
                <?php
                    //Mínimo
                    // if(($_SESSION['horaActual']>'16:00:00')&&($_SESSION['horaActual']<'23:59:00')){
                    if($_SESSION['horaActual']<'16:00:00'){
                        $estadoObservaciones='active';
                    }else{
                        $estadoObservaciones='disabled';
                    }
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php echo $estadoObservaciones;?>" id="navbarDropdownAsistencias" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Observaciones
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownAsistencias">
                        <?php
                            verObservaciones($conexion);
                        ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownAsistencias">
                        <?php
                            verInformes($conexion);
                        ?>
                    </ul>
                </li>
                
                </ul>
            </div>
            <span class="navbar-text">
                    <a type="button" class="btn btn-outline-success" aria-current="page" href="Inicio.php">Salir</a>
            </span>
        </div>
    </nav>

<?php
    function verAsistencias($conexion){
        $select = "Select PRO_ID from tbl_acceso where (USU_ID = '{$_SESSION['id']}')";
        $result = mysqli_query($conexion, $select);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $PRO_ID = $row['PRO_ID'];
                $Select_ProId = "Select PRO_NOMBRE from tbl_proyecto where (PRO_ID = '{$PRO_ID}')";
                $OBJ_PRO_NOMBRE = mysqli_query($conexion, $Select_ProId);
                $ARR_PRO_NOMBRE = mysqli_fetch_assoc($OBJ_PRO_NOMBRE);
                $PRO_NOMBRE = implode($ARR_PRO_NOMBRE);
                echo 
                '<li>
                    <a href="Asistencia.php?nombre='.$PRO_NOMBRE.'"class="dropdown-item" name="NomPro">'.$PRO_NOMBRE.'</a>
                </li>';
            }
        } else {
            echo "No tiene accesos";
        }
    }
    function verObservaciones($conexion){
        $select = "Select PRO_ID from tbl_acceso where (USU_ID = '{$_SESSION['id']}')";
        $result = mysqli_query($conexion, $select);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $Select_ProId = "Select PRO_NOMBRE from tbl_proyecto where (PRO_ID = '{$row['PRO_ID']}')";
                $OBJ_PRO_NOMBRE = mysqli_query($conexion, $Select_ProId);
                $ARR_PRO_NOMBRE = mysqli_fetch_assoc($OBJ_PRO_NOMBRE);
                $PRO_NOMBRE = implode($ARR_PRO_NOMBRE);
                echo 
                '<li>
                    <a href="Observaciones.php?nombre='.$PRO_NOMBRE.'"class="dropdown-item" name="NomPro">'.$PRO_NOMBRE.'</a>
                </li>';
            }
        } else {
            echo "No tiene accesos";
        }
    }
    function verInformes($conexion){
        $select = "Select PRO_ID from tbl_acceso where (USU_ID = '{$_SESSION['id']}')";
        $result = mysqli_query($conexion, $select);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $Select_ProId = "Select PRO_NOMBRE from tbl_proyecto where (PRO_ID = '{$row['PRO_ID']}')";
                $OBJ_PRO_NOMBRE = mysqli_query($conexion, $Select_ProId);
                $ARR_PRO_NOMBRE = mysqli_fetch_assoc($OBJ_PRO_NOMBRE);
                $PRO_NOMBRE = implode($ARR_PRO_NOMBRE);
                echo 
                '<li>
                    <a href="Informes.php?nombre='.$PRO_NOMBRE.'"class="dropdown-item" name="NomPro">'.$PRO_NOMBRE.'</a>
                </li>';
            }
        } else {
            echo "No tiene accesos";
        }
    }
?>