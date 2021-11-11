<?php

namespace App\Utility\Database;

class Database
{
    private static $instance;

    private  $connection;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance instanceof Database) {
            return self::$instance;
        } else {
            self::$instance = new Database;

            self::$instance->connection = new \mysqli('localhost', 'root', '', 'amat');

            if (!self::$instance->connection) {

                throw new \Exception("Could not connect to database");
            }

            return self::$instance;
        }
    }

    public function query($sql)
    {
        if ($this->connection->query($sql)) {
            return true;
        }

        throw new \Exception($this->connection->connect_error);
    }

    public function fetch()
    {
        return $this->connection->fetch_assoc();
    }
}
