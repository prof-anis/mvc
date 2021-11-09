<?php

namespace App;

class MyCustomFoodBank extends FoobBank
{
    public static $hello = 'hello herr';

    public function __construct()
    {
        echo self::$hello;
    }

    public static function hello()
    {
        return "just greeting you here";
    }
}
