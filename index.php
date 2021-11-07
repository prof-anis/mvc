<?php

require __DIR__.'/vendor/autoload.php';

use App\Utility\Router;

$app = Router::getInstance();

$app->start();

