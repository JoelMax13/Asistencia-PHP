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
        include ("../Controladores/CrearConexion.php");
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
        <label><strong>Proyecto: </strong>PLATAFORMA...</label>
        <label><strong>Ubicación: </strong>SACHA</label>
    </div>

    <ul class="list-group list-group-horizontal">
        <li class="list-group-item bIzquierda">
            <table class="table table-bordered border-dark">
                <tr class="altBase">
                    <td class="PK"><strong>ID</strong></td>
                    <td><strong>Nombre Apellido</strong></td>
                    <td><strong>CI</strong></td>
                    <td><strong>Cargo</strong></td>
                </tr>
                <!--Codigo para generar tabla-->
                <tr class="altura">
                    <td>500</td>
                    <td>Francisco Gabriel Estrada Morales</td>
                    <td>1746512461</td>
                    <td>Supervisor movimiento de tierra</td>
                </tr>
                <tr class="altura">
                    <td>501</td>
                    <td>Diaz Parraga Alexander Emanuel</td>
                    <td>1541816148</td>
                    <td>Albañil</td>
                </tr>
                <tr class="altura">
                    <td>502</td>
                    <td>Maldonado Tacuri Alexis Javier</td>
                    <td>1345618946</td>
                    <td>Ayudante de suelda</td>
                </tr>
                <tr class="altura">
                    <td>501</td>
                    <td>Diaz Parraga Alexander Emanuel</td>
                    <td>1541816148</td>
                    <td>Albañil</td>
                </tr>
                <tr class="altura">
                    <td>502</td>
                    <td>Maldonado Tacuri Alexis Javier</td>
                    <td>1345618946</td>
                    <td>Ayudante de suelda</td>
                </tr>
            </table>
        </li>
        <li class="list-group-item bCentro">
            <!--Tabla del mes-->
            <table class="table table-bordered border-dark">
                <tr class="altBaseDos">
                    <th colspan="31">Marzo</th>
                </tr>
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
            <table class="table table-bordered border-dark tDerecha">
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

</body>
</html>