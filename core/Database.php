<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private $dbHost;
    private $dbPort;
    private $dbName;
    private $username;
    private $password;

    public $conn;

    private function connection()
    {
        try {
            return new PDO(
                "mysql:host=" . $this->dbHost . ";port=" . $this->dbPort . ";dbname=" . $this->dbName, $this->username, $this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        } catch (PDOException $exception) {
            exit("Connection error: " . $exception->getMessage() . '.');
        }
    }
    public function __construct()
    {
        $this->dbHost = $_ENV['DB_HOST'];
        $this->dbPort = $_ENV['DB_PORT'];
        $this->dbName = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->conn = $this->connection();
    }
}
