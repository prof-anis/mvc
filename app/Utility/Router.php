<?php

namespace App\Utility;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Utility\Request;

class Router
{
    protected $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function start()
    {
        $this->map();
    }

    public function getCurrentUrl()
    {
        return $this->request->currentUrl();
    }

    public function register()
    {
        return [
            "/post" => PostController::class,
            '/comment' => CommentController::class
        ];
    }

    public function map()
    {
        foreach ($this->register() as $url => $controller) {
            if ($url == $this->getCurrentUrl()) {
                new $controller();
                exit;
            }
        }

        echo "404 error";
    }
}
