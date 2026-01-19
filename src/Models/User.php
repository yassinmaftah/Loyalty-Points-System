<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class User
{
    private $db;
    private $id;
    private $name;
    private $email;
    private $password_hash;
    private $total_points;

    public function __construct(){$this->db = new Database();}

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getEmail() { return $this->email; }
    public function getPasswordHash() { return $this->password_hash; }
    public function getTotalPoints() { return $this->total_points; }
    public function setId($id) { $this->id = $id; }
    public function setName($name) { $this->name = $name; }
    public function setEmail($email) { $this->email = $email; }
    public function setPasswordHash($password) { $this->password_hash = $password; }
    public function setTotalPoints($points) { $this->total_points = $points; }

    public function register($name, $email, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password_hash, total_points) VALUES (?, ?, ?, 0)";
        $db = $this->db->connect();
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([$name, $email, $hash]);
        if ($result) {
            $this->id = $db->lastInsertId();
            return true;}
        return false;
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            $this->id = $user['id'];
            $this->name = $user['name'];
            $this->email = $user['email'];
            $this->total_points = $user['total_points'];
            return $user;
        }
        return false;
    }
}