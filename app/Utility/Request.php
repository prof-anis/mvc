<?php

namespace App\Utility;

class Request
{
    public function currentUrl()
    {
        return Str::stripBeginingSlash($_SERVER['REQUEST_URI']);
    }

}
