<?php

namespace App\Utility;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Utility\Request;
use App\Utility\Str;

class Router
{
    protected $request;

    public static $helloWord = "hello world";

    public $simpleGuy = 'Simple guy';

    public static $instance;

    public $hasStarted = false;

    private function __construct()
    {
        $this->request = new Request();
    }

    public static function getInstance()
    {
        if (Router::$instance instanceof Router) {

            return Router::$instance;
        } else {

            Router::$instance = new Router();

            return Router::$instance;
        }
    }

    public function start()
    {
        if ($this->hasStarted == true) {
            throw new \Exception('Router already running');
        }

        $this->hasStarted = true;
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
            'comment' => CommentController::class
        ];
    }

    public function map()
    {
        foreach ($this->register() as $url => $controller) {
            if (Str::stripBeginingSlash($url) == $this->getCurrentUrl()) {
                new $controller();
                exit;
            }
        }

        echo "404 error";
    }
}
