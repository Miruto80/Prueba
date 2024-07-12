<html>

<head>
    <title>Taekyon</title>
    <link rel="shorcut icon" type="image/x-icon" href="img/logo taekyon.png">
    <link rel="stylesheet" href="css/nav.css">
    <?php require_once("comunes/framework.php"); ?>

<body>
    <?php require_once('comunes/nav.php'); ?>
    <!-- Clase container todo debe ir dentro de contenedor -->
    <style>
        body {
            background-image: url('img/fondo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            color: white;
            font-family: Arial, sans-serif;
        }

    

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .row {
            background-color: rgba(0, 0, 0, 0.384);
            border-radius: 25px;
        }

        .figure img {
            width: 40%;
            height: auto;
        }
    </style>
    </head>

    <body>

        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="text-center">
                        <h1 class="display-4 mt-2">Bienvenido</h1>
                        <figure class="figure">
                            <img src="img/logo.png" alt="Logo">
                        </figure>
                        <h3 class="text-warning"><b>"FORMANDO CAMPEONES PARA LA VIDA"</b></h3>
                        <h5 class="text-warning"><b>Fundado en 1983.</b></h5>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>