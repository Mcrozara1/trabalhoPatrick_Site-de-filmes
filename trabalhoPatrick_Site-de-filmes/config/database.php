<?php
class DatabaseConnection {
    private static $instance = null;
    private $pdo;
    
    private $host = "localhost";
    private $dbname = "plataforma_filmes";
    private $username = "root";
    private $password = "";
    
    private function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}

$db = DatabaseConnection::getInstance()->getConnection();
?>