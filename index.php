<?php

require __DIR__.'/vendor/autoload.php';

use App\Exceptions\InvalidLogicException;
use App\FoobBank;
use App\Utility\Database\QueryBuilder;
use App\Utility\Router;


$db = new QueryBuilder();




// you call the update like this 
$db->table('user')->update(['username', 'david'])->where('id', '=', '2')->startQuery();

//  while the delete like this

 $db->table('user')->where('id', '=', '1')->delete();

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
