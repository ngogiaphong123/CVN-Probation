<?php

namespace Src\Model;

use Core\Database;
use PDO;

class User
{
    private Database $db;
    private string $table = 'users';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function get(): false|array
    {
        $sql = "SELECT * FROM {$this->table}";
        $query = $this->db->conn->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $query = $this->db->conn->prepare($sql);
        $parameters = ['id' => $id];
        $query->execute($parameters);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)";
        $query = $this->db->conn->prepare($sql);
        $parameters = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => $data['password']
        ];
        $query->execute($parameters);

        return $this->getById($this->db->conn->lastInsertId());
    }

    public function update($data, $id)
    {
        $sql = "UPDATE {$this->table} SET first_name = :first_name, last_name = :last_name, email = :email, password = :password WHERE id = :id";
        $query = $this->db->conn->prepare($sql);
        $parameters = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'id' => $id
        ];
        $query->execute($parameters);

        return $this->getById($id);
    }
}
