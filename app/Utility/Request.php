<?php

namespace App\Utility;

class Request
{
    public function currentUrl()
    {
        return $_SERVER['REQUEST_URI'];
    }
}
