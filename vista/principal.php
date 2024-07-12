<html>
    <head>
        <title>Taekyon</title>
        <link rel="shorcut icon" type="image/x-icon" href="img/logo taekyon.png">
        <link rel="stylesheet" href="css/nav.css">
    </head>
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
        .contenido {
            text-align: center;
            padding: 50px;
            opacity: 0;
            animation: fadeIn 10s forwards;
        }
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
        .row{
            background-color: rgba(0, 0, 0, 0.384);
            border-radius: 25px;
        }
        
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-70">
                <div class="text-center">
                    <h1 class="display-4">Bienvenido</h1>
                    <p class="font-weight-bold" class="lead">Gracias por visitarnos.</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>