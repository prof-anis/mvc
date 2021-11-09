<?php

namespace App\Http\Controllers;

use App\Utility\Router;

class PostController
{
    public function __construct()
    {
        $app = Router::getInstance();

        $app->start();

        echo "I am in the post controller";
    }

    public function index()
    {

    }
}
