    <?php
    include ("../Controladores/CrearConexion.php");
    include ("../Controladores/Funciones.php");
    ?>
    <nav class="navbar navbar-expand-lg bg-info fixed-top" id="menuPrincipal">
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
                    if(($_SESSION['horaActual']<'12:00:00')&&($_SESSION['horaActual']>'06:00:00')){
                    // if($_SESSION['horaActual']>'12:00:00'){
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
                        $pagina = "Asistencia.php";
                        GetProyectosDeUsuario($conexion, $pagina);
                    ?>
                    </ul>
                </li>
                <?php
                    //Mínimo
                    if(($_SESSION['horaActual']>'16:00:00')&&($_SESSION['horaActual']<'23:59:00')){
                    // if($_SESSION['horaActual']<'16:00:00'){
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
                            $pagina = "Observaciones.php";
                            GetProyectosDeUsuario($conexion, $pagina);
                        ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Horas Extra
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownAsistencias">
                        <?php
                            $pagina = "HorasExtra.php";
                            GetProyectosDeUsuario($conexion, $pagina);
                        ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownAsistencias">
                        <?php
                            $pagina = "Informes.php";
                            GetProyectosDeUsuario($conexion, $pagina);
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