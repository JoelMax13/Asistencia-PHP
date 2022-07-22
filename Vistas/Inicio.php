<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tectotal</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <link href="../Diseno/Sistema.css" type="text/css" rel="stylesheet">
</head>
<body>
    <?php
        require("../Controladores/CrearConexion.php");
        require("MenuPrincipal.php");
    ?>

    <div class="body">
        <div class="container">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="http://www.tectotal.com.ec/imagenes/intro(Personalizado).png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://institutodeformacionydesarrollo.org/images/joomlashine/sample/homepage/news_1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://unisalia.com/wp-content/uploads/2020/04/ingenieria_de_petroleos_1_opt.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script> -->
    </div>
</body>
</html>