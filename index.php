<?php

require __DIR__.'/vendor/autoload.php';

use App\Exceptions\InvalidLogicException;
use App\FoobBank;
use App\Utility\QueryBuilder;
use App\Utility\Router;


$db = new QueryBuilder();

// $sql = $db->table('users')->insert([
//     "name" => "tobi",
//     "email" => "tobexkee@gmail.com",
//     "password" => "hello hello",
//     "date" => "today"
// ])->toSql();

//  $db->table('users')->select(['name', 'email'])->where('id', 10)->limit(5)->orderBy('id', 'DESC')->toSql();

 $db->table('users')->select(['name', 'email'])->where('id', 10)->setvalue();
 
// $db->where('id', 10);
 echo $db->toSql();


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
