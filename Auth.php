<?php
require_once 'Database.php';
require_once 'Usuario.php';

class Auth {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM usuarios WHERE username = :username";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo "Usuario encontrado en la base de datos.<br>";
            echo "Hash de la base de datos: " . $user['password'] . "<br>";
            if (password_verify($password, $user['password'])) {
                echo "¡Contraseña verificada correctamente!<br>";
                return new Usuario($user['id'], $user['username'], $user['password']);
            } else {
                echo "Contraseña incorrecta.<br>";
            }
        } else {
            echo "Usuario no encontrado.<br>";
        }
        // Autenticación fallida
        return false;
    }
}
