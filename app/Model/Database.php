<?php
namespace App\Model;
use App\model\Config;

class Database 
{

    protected $startedDB = false;
    protected static $connection;
    protected $config;
    protected $dbconnect;

   private function __construct () 

    {
        // if( $this->connectDB()){
        //     echo'good ';
        // }
        // else{
        //    die('error in the connection');
        // }
        
        try {
            !$this->connectDB();
        }
         catch ( \Throwable $e) {
            echo 'the is an error in your connection';
        }
     }

    public static function createInstance ()
    {
        if( self::$connection instanceof Database) {
           return  self::$connection;  
        } else {
            self::$connection = new Database;
            return self::$connection;
        }
       
    }

    public function connectDB ()
    {  
      $this->config = new Config;
       $this->dbconnect =  mysqli_connect($this->config->getdbhost(), $this->config->getdbusername(), $this->config->getdbpassword(), $this->config->getdbname());
       return $this->dbconnect;
    }

    public function hasStarted ()
    {
        if ($this->startedDB == true ) {
        throw new \Exception('the database is already running');

        }
         $this->startedDB =  true;
    }

}











?>