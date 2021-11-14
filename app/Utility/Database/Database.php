<?php

namespace App\Utility\Database;

class Database
{
    private static $instance;

    private  $connection;
    private $conn;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance instanceof Database) {
            return self::$instance;
        } else {
            self::$instance = new Database;

            self::$instance->connection = new \mysqli('localhost', 'root', '', 'new_work');

            if (!self::$instance->connection) {

                throw new \Exception("Could not connect to database");
            }

            return self::$instance;
        }
    }
 
    public function query ($sql)
    {    
        if ($this->connection->query($sql)) {
           return $this->conn = $this->connection->query($sql);
        }else {
            echo "error in connection ";
            throw new \Exception($this->connection->connect_error);
        }

    }

    public function fetch()
    {
     return $this->conn->fetch_assoc();
    }
}
