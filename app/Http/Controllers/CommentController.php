<?php

namespace App\Http\Controllers;

use App\Utility\Router;

class CommentController
{
    public function __construct()
    {
        $app = Router::getInstance();

        $app->start();
    }

    public function index()
    {

    }
}
