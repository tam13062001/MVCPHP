<?php

namespace config;
use PDO;
use PDOException;

session_start();
class config{
    
    private $host = 'free02.123host.vn';
    private $db_name = 'shrsnaop_demo';
    private $username = 'shrsnaop_demo';
    private $password = 'Unefxx2QR8MC7r47dTuj';
    public $pdo;

    public function getConnection() {
        $this->pdo = null;

        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->pdo;
    }
    }

?>

<!-- // $host = 'free02.123host.vn';
// $db = 'shrsnaop_demo';
// $user = 'shrsnaop_demo';
// $pass = 'Unefxx2QR8MC7r47dTuj'; -->