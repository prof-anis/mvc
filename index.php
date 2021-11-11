<?php

require __DIR__.'/vendor/autoload.php';

use App\Exceptions\InvalidLogicException;
use App\FoobBank;
use App\Utility\Database\QueryBuilder;
use App\Utility\Router;


$db = new QueryBuilder();

/**

 *
 * $db->where("name", "tobi")->where("password" , "pass")->where("email", "tobi@mail.com");
 *
 */

//  $db->table('users')->select(['name', 'email'])->where('id', 10)->limit(5)->orderBy('id', 'DESC')->toSql();

$data =  $db->table('users')
     ->select("*")
     ->limit(5)
     ->orderBy('id', 'DESC')
     ->get();
 
// $db->where('id', 10);
var_dump($data);
exit();

/*$app = Router::getInstance();
$app->start();
*/











/**
 * BUILDER DESIGN PATTERN
 *
 * ORM => Object Relation Map
 *
 *    $this
 *  INSERT INTO users (name, email, password) Values ('name', 'email', 'password')
 *
 * SELECT * FROM users WHERE ygu AND erikfru OR erjkfukw AND eryfkr LIMIT kf ORDERBy jrgfukwe
 */
