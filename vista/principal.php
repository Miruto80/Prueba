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
<title>Bienvenido</title>
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
    </style>
</head>

<body>
    
<div class="container text-center">
        <div class="row">
            <div class="col-md contenido text-center">
                <h1>***Bienvenido***</h1>
            </div>
    </div>

</body>
</html>