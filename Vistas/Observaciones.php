<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Observaciones</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="../Diseno/Sistema.css" type="text/css" rel="stylesheet">
</head>

<body>
    <?php
        include ("MenuPrincipal.php");
        $Pro_Nombre = $_GET['nombre'];
        $PRO_ID = GetIdProyecto($conexion, $Pro_Nombre);
    ?>

    <div class="body">
    <div>
        <h1>Observaciones</h1>
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
    <form action="../Controladores/RegistrarObservaciones.php" method="POST">
    <input type="text" name="proyecto" value="<?php echo $PRO_ID;?>" hidden>
        <div class="container O_container">
            <!-- Mostrar Lista de personas -->
            <ul>
                <li class="mb-3 row">
                    <label class="col-sm-4 col-form-label"><strong>Nombres y apellidos</strong></label>
                    <label class="col-sm-4"><strong>Comentario</strong></label>
                    <label class="col-sm-4"><strong>Observación</strong></label>
                </li>
                    <?php
                        GetUsuariosObservaciones($conexion, $PRO_ID);
                    ?>
                
            </ul>
            <button type="submit" class="btn btn-success BtnFinProc"<?php echo $btnObservaciones; ?>>Guardar</button>
        </div>
    </form>
    </div>
</body>
</html>