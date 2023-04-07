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
    $Pro_Nombre = $_GET['nombre'];
    $PRO_ID = GetIdProyecto($conexion, $Pro_Nombre);
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
                        GetUsuariosAsistencia($conexion, $PRO_ID);
                    ?>
                </ul>
                <button type="submit" class="btn btn-success BtnFinProc">Registrar</button>
            </div>
        </form>
    </div>
</body>
</html>