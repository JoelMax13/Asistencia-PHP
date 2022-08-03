
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
        $Pro_Nombre = $_GET['nombre'];
        $ARR_PRO = GetProyecto($conexion, $Pro_Nombre);
        $PRO_ID = $ARR_PRO['PRO_ID'];
        $PRO_CLIENTE = $ARR_PRO['PRO_CLIENTE'];
        $diaActual = date('d');
        $mesActual = date('m');
        $anioActual = date('Y');
    ?>

    <div class="body" id="body">
        
    <header class="header">
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
        <li class="list-group-item bIzquierda">
            <table class="table table-bordered border-dark">
                <tr class="altBase">
                    <td class="PK"><strong>N°</strong></td>
                    <td><strong>Nombre Apellido</strong></td>
                    <td><strong>CI</strong></td>
                    <td><strong>Cargo</strong></td>
                </tr>
                <!--Codigo para generar tabla-->
                <?php
                    TablaUsuarios($conexion, $PRO_ID);
                ?>
            </table>
        </li>
        <li class="list-group-item bCentro">
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
                    TablaInformacion($conexion, $PRO_ID, $diaActual, $mesActual, $anioActual);
                ?>
                
                
                    
                    
            </table>
        </li>

        <li class="list-group-item bDerecha">
            <table class="table table-bordered border-dark tDerecha" style="overflow: auto;">
                <tr class="altBase">
                    <td>Total</td>
                    <?php
                        MostrarListaObservaciones($conexion);
                    ?>
                </tr>
                <!--Codigo para generar tabla-->
                <?php
                    TablaObservaciones($conexion, $PRO_ID, $diaActual, $mesActual, $anioActual);
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