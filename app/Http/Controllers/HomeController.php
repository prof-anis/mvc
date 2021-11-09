<?php
namespace App\Http\Controllers;
use App\Model\Database;

class HomeController
{
   protected $database;
    public function __construct()
    { 
      $this->databse = Database::createInstance();
      $this->databse->hasStarted();
      echo 'home page';
    }
 
    public function index()
    {

    }
}
