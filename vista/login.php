<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_login.css">
    <title>Iniciar sesion</title>
</head>
<?php
require_once("comunes/framewor.php");
?>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <button>Iniciar sesion</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1>Iniciar sesión</h1>
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Contraseña">
                <button class="ingresar-b">Ingresar</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>¡Bienvenido al sistema de la Taekyon!</h1>
                    <p>Ingresa los respectivos datos para ingresar al sistema actual de nuestra academia.</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>