<?php
namespace App\Model;

class Config 
{
protected $dbHost = 'localhost';
protected $dbusername = 'root';
protected $dbname = 'new_work';
protected $dbpassword = '';


protected function setdbhost ($value)
{
 $this->dbHost = $value;

}

public function getdbhost ()
{
    return $this->dbHost;
}

protected function setdbUsername ($value)
{

 $this->dbusername = $value;

}

public function getdbusername ()
{
   return $this->dbusername;
}


protected function setdbname ($value)
{
    $this->dbname = $value;
}

public function getdbname ()
{
   return $this->dbname;
}

protected function setdbpassword ($value)
{
   $this->dbpassword = $value;
}

public function getdbpassword ()
{
    $this->dbpassword;
}

}







?>