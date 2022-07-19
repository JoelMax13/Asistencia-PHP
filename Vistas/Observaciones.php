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
        include ("../Controladores/CrearConexion.php");
        include ("MenuPrincipal.php");
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
        </label>
    </div>
    <form action="../Controladores/RegistrarObservaciones.php" method="POST">
        <div class="container O_container">
            <!-- Mostrar Lista de personas -->
            <ul>
                <li class="mb-3 row">
                    <label class="col-sm-4 col-form-label"><strong>Nombres y apellidos</strong></label>
                    <label class="col-sm-4"><strong>Comentario</strong></label>
                    <label class="col-sm-4"><strong>Observación</strong></label>
                </li>
                <li class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Luis Andrés Naranjo Rodriguez</label>
                    <div class="col-sm-3">
                        <!-- ***************************************************************************** -->
                        <select class="form-select">
                            <option value="">---</option>
                            <option value="">Descanso de jornada</option>
                            <option value="">Falta justificada</option>
                            <option value="">Falta injustificada</option>
                            <option value="">Jornada nocturna</option>
                            <option value="">Días sobre jornada</option>
                            <option value="">Liquidación</option>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <!-- <textarea class="form-control" aria-label="With textarea"></textarea> -->
                        <input class="form-control"></input>
                    </div>
                </li>
                <li class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Luis Andrés Naranjo Rodriguez</label>
                    <div class="col-sm-3">
                    <select class="form-select">
                            <option value="">---</option>
                            <option value="">Descanso de jornada</option>
                            <option value="">Falta justificada</option>
                            <option value="">Falta injustificada</option>
                            <option value="">Jornada nocturna</option>
                            <option value="">Días sobre jornada</option>
                            <option value="">Liquidación</option>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <!-- <textarea class="form-control" aria-label="With textarea"></textarea> -->
                        <input class="form-control"></input>
                    </div>
                </li>
            </ul>
            <button type="submit" class="btn btn-success BtnFinProc">Guardar</button>
        </div>
    </form>
    </div>
</body>

</html>