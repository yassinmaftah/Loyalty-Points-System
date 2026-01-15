<?php

namespace App\Core;

use PDO;
use PDOException;

class   Database
{
    private $host = "localhost";
    private $dbname = "LoyaltyPointsSystem";
    private $user = "root";
    private $pass = "sqlyassine2025";

    public function connect()
    {
        try
        {
            $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname;", $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }
        catch (PDOException $e)
        {
            die("Connection failed: " . $e->getMessage());
        }
    }
}