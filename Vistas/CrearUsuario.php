<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia</title>
    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="Index.css"> -->
    <link href="../Diseño/Sistema.css" type="text/css" rel="stylesheet">
</head>
<body>
<form action="Registrar" method="POST">
    <div>
    <label class="RegDerecha">Cedula:</label>
    <Input type="text" class="RegIzquierda" name="Cedula"></Input>
    </div>
    <div>
    <label class="RegDerecha">Nombres Apellidos:</label>
    <Input type="text" class="RegIzquierda" name="NombresApellidos"></Input>
    </div>
    <div>
    <label class="RegDerecha">Teléfono:</label>
    <Input type="text" class="RegIzquierda" name="Telf"></Input>
    </div>
    <div>
    <label class="RegDerecha">Cargo:</label>
    <Input type="text" class="RegIzquierda" name="Cargo"></Input>
    </div>
    <div>
    <label class="RegDerecha">Jornada:</label>
    <Input type="text" class="RegIzquierda" name="Jornada"></Input>
    </div>
    <div>
    <label class="RegDerecha">Proyecto:</label>
    <Input type="text" class="RegIzquierda" name="Proyecto"></Input>
    </div>
</form>
</body>
</html>