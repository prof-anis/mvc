<?php

require __DIR__.'/vendor/autoload.php';

use App\Exceptions\InvalidLogicException;
use App\Utility\Router;

$app = Router::getInstance();

$app->start();

