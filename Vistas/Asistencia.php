<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../Diseno/Sistema.css" type="text/css" rel="stylesheet">
</head>

<body>
    <nav>
        <h1>Asistencia registrada por: </h1>
        <p>
            Fecha:
            <?php
                echo "prueba";
            ?>
        </p>
    </nav>
    <form action="Controladores/RegistrarAsistencia.php" method="POST">
        <div class="container">
            <!-- Mostrar Lista de personas -->
            <ul>
                <li class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Luis Andrés Naranjo Rodriguez</label>
                    <div class="col-sm-6">
                        <select class="form-select">
                            <option value="1">Presente</option>
                            <option value="0">Ausente</option>
                        </select>
                    </div>
                </li>
                <li class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Luis Andrés Naranjo Rodriguez</label>
                    <div class="col-sm-6">
                        <select class="form-select">
                            <option value="1">Presente</option>
                            <option value="0">Ausente</option>
                        </select>
                    </div>
                </li>
            </ul>
            <button type="submit" class="btn btn-success BtnFinProc">Registrar</button>
        </div>
    </form>
</body>

</html>