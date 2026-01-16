<?php

namespace App\Models;
use App\Core\Database;
use PDO;


class User
{
    private $db;
    public function __construct() 
    {
        $obj_db = new Database();
        $database = $obj_db->connect();
        $this->db = $database;
    }
    public function login($email, $password)
    {
        $database = $this->db;
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $database->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password_hash']))
            return $user;
        return 0;
    }
    public function register($username, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, password_hash, name) VALUES (?,?,?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$email,$hashedPassword, $username]);
    }

    public function UpdateRewards($userID, $rewards)
    {
        $database = $this->db;
        $sql = "UPDATE users set total_points = total_points + ?
        WHERE id = ?";

        $stmt = $database->prepare($sql);
        if ($stmt->execute([$rewards, $userID]))
            return true;
        return false;
    }
}
