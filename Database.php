<?php
class Database {
    private $host = 'db';  // Nombre del servicio en Docker Compose
    private $dbname = 'mi_base_de_datos';
    private $username = 'root';
    private $password = 'root_password';
    private $pdo;

    public function __construct() {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }

    public function getPDO() {
        return $this->pdo;
    }
}
