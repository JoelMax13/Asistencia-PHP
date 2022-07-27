<?php
    include ("../Controladores/CrearConexion.php");
    $Pro_Nombre = $_GET['nombre'];
    $PRO_ID = ObtenerIdProyecto($conexion, $Pro_Nombre);
    
    function ObtenerIdProyecto($conexion, $proyecto){
        //Obtener Id Proyecto
        $Select_ProId = "Select PRO_ID from tbl_proyecto where (PRO_NOMBRE = '{$proyecto}')";
        $OBJ_PRO_ID = mysqli_query($conexion, $Select_ProId);
        $ARR_PRO_ID = mysqli_fetch_assoc($OBJ_PRO_ID);
        $PRO_ID = implode($ARR_PRO_ID);
        return $PRO_ID;
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
        <label><strong>Cliente: </strong>PETROECUADOR</label>
        <label><strong>Proyecto: </strong><?php echo $Pro_Nombre ?></label>
        <label><strong>Ubicación: </strong>SACHA</label>
    </div>

    <ul class="list-group list-group-horizontal">
        <li class="list-group-item bIzquierda" style="overflow: auto;">
            <table class="table table-bordered border-dark">
                <tr class="altBase">
                    <td class="PK"><strong>ID</strong></td>
                    <td><strong>Nombre Apellido</strong></td>
                    <td><strong>CI</strong></td>
                    <td><strong>Cargo</strong></td>
                </tr>
                <!--Codigo para generar tabla-->
                <?php
                    $Select_UsuCargo = "SELECT USU.*, USPR.USPR_ID ,USPR.USPR_CARGO FROM tbl_usuario AS USU 
                                        left JOIN tbl_usuario_proyecto AS USPR 
                                        ON USU.USU_ID = USPR.USU_ID WHERE USPR.PRO_ID = '{$PRO_ID}'
                                        ORDER BY USPR.USPR_ID ASC";
                    $Arr_UsuariosCargo = mysqli_query($conexion, $Select_UsuCargo);
                    while($conjuntoDatos = mysqli_fetch_assoc($Arr_UsuariosCargo)) {
                        echo'
                        <tr class="altura">
                            <td>'.$conjuntoDatos['USPR_ID'].'</td>
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
                    <th colspan="31">Marzo</th>
                </tr>
                <?php
                    $Select_UsuVerificacion = "SELECT USU.*, USPR.USPR_ID ,USPR.USPR_CARGO FROM tbl_usuario AS USU 
                                        left JOIN tbl_usuario_proyecto AS USPR 
                                        ON USU.USU_ID = USPR.USU_ID WHERE USPR.PRO_ID = '{$PRO_ID}'
                                        ORDER BY USPR.USPR_ID ASC";
                    $Arr_UsuariosCargo = mysqli_query($conexion, $Select_UsuCargo);
                ?>
                <tr class="altBaseDos">
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                    <td>13</td>
                    <td>14</td>
                    <td>15</td>
                    <td>16</td>
                    <td>17</td>
                    <td>18</td>
                    <td>19</td>
                    <td>20</td>
                    <td>21</td>
                    <td>22</td>
                    <td>23</td>
                    <td>24</td>
                    <td>25</td>
                    <td>26</td>
                    <td>27</td>
                    <td>28</td>
                    <td>29</td>
                    <td>30</td>
                    <td>31</td>
                </tr>
                <!--Codigo para generar tabla-->
                <tr class="altura">
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                </tr>
                <tr class="altura">
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                </tr>
                <tr class="altura">
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                </tr>
                <tr class="altura">
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                </tr>
                <tr class="altura">
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                </tr>
            </table>
        </li>

        <li class="list-group-item bDerecha">
            <table class="table table-bordered border-dark tDerecha" style="overflow: auto;">
                <tr class="altBase">
                    <td>Total</td>
                    <td style="background-color: rgb(7, 250, 7);">JN</td>
                    <td style="background-color: rgb(250, 173, 7);">DSJ</td>
                    <td style="background-color: rgb(246, 250, 7);">D</td>
                    <td style="background-color: rgb(250, 193, 7);">FI</td>
                    <td style="background-color: rgb(250, 7, 7);">LQ</td>
                </tr>
                <!--Codigo para generar tabla-->
                <tr class="altura">
                    <td>19</td>
                    <td>1</td>
                    <td>0</td>
                    <td>2</td>
                    <td>10</td>
                    <td>0</td>
                </tr>
                <tr class="altura">
                    <td>19</td>
                    <td>1</td>
                    <td>0</td>
                    <td>2</td>
                    <td>10</td>
                    <td>0</td>
                </tr>
                <tr class="altura">
                    <td>19</td>
                    <td>1</td>
                    <td>0</td>
                    <td>2</td>
                    <td>10</td>
                    <td>0</td>
                </tr>
                <tr class="altura">
                    <td>19</td>
                    <td>1</td>
                    <td>0</td>
                    <td>2</td>
                    <td>10</td>
                    <td>0</td>
                </tr>
                <tr class="altura">
                    <td>19</td>
                    <td>1</td>
                    <td>0</td>
                    <td>2</td>
                    <td>10</td>
                    <td>0</td>
                </tr>
            </table>
        </li>
    </ul>
    </div>
    <?php
        include("Botones.php");
    ?>

</body>
</html>