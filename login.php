<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once 'Auth.php';
        require_once 'Database.php'; // Aunque ya se incluye en Auth.php, no hay problema en incluirlo aquí también
        require_once 'Usuario.php';  // Aunque ya se incluye en Auth.php, no hay problema en incluirlo aquí también

        $auth = new Auth();
        $user = $auth->login($_POST['username'], $_POST['password']);
        
        if ($user) {
            echo "¡Bienvenido, " . htmlspecialchars($user->getUsername()) . "!";
        } else {
            echo "Nombre de usuario o contraseña incorrectos.";
        }
    }
    ?>
    <form method="POST" action="login.php">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>
