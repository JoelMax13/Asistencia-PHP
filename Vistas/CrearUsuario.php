<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../Diseno/Sistema.css" type="text/css" rel="stylesheet">
</head>

<body>
    <nav>
        <h1>Registrar Nuevo Usuario</h1>
    </nav>
    <form action="../Controladores/RegistrarUsuario.php" method="POST">
        <div class="container C_U_container">
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label C_U_label">Cedula: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="Cedula"></input>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label C_U_label">Nombres Apellidos:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="NombresApellidos"/>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label C_U_label">Teléfono:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="Telf"/>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label C_U_label">Cargo:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="Cargo"/>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label C_U_label">Jornada:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="Jornada"/>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label C_U_label">Proyecto:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="Proyecto"/>
                </div>
            </div>
            <button type="submit" class="btn btn-success BtnFinProc">Crear Usuario Nuevo</button>
        </div>
    </form>
</body>

</html>