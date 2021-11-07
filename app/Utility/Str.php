<?php

namespace App\Utility;

class Str
{
    public static function stripBeginingSlash($url)
    {
        if (strpos($url, '/') === 0) {
            return substr($url, 1);
        }

        return $url;
    }

    public function hello()
    {

    }
}
