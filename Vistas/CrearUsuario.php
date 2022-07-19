<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    
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
        require("MenuPrincipal.php");
    ?>

    <div class="body">
        <div>
            <h1>Registrar Nuevo Usuario</h1>
        </div>
        <form action="../Controladores/RegistrarUsuario.php" method="POST">
        <!-- <form action="" method="POST"> -->
            <div class="container C_U_container">
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label C_U_label">Cedula: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="Cedula" maxlength="10" minlength="10" required/>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label C_U_label">Nombres Apellidos:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="NombresApellidos" required/>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label C_U_label">Teléfono:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="Telf" maxlength="10" minlength="10" required/>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label C_U_label">Cargo:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="Cargo" required/>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label C_U_label">Jornada:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="Jornada" maxlength="30" minlength="5" required/>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label C_U_label">Proyecto:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="Proyecto" required/>
                    </div>
                </div>
                <button type="submit" name="C_U_enviar" class="btn btn-success BtnFinProc">Crear Usuario Nuevo</button>
            </div>
        </form>
    </div>
</body>
</html>