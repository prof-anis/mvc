<?php

require __DIR__.'/vendor/autoload.php';

use App\Exceptions\InvalidLogicException;
use App\Utility\Router;
use App\Model\Databsee;

$app = Router::getInstance();
$app->start();


