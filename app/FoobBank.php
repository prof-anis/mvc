<?php

namespace App;

class FoobBank
{
    private $food;
    private $drink;
    private $meat;
    private $fruit;
    private $soup;
    public static $hello = 'hello';


    public function __construct()
    {

    }

    public static function hello()
    {
        return self::$hello;
    }

    public function addMeal($food)
    {
        $this->food = $food;

        return $this;
    }

    public function addDrink($drink)
    {
        $this->drink = $drink;

        return $this;
    }

    public function addMeat($meat)
    {
        $this->meat = $meat;

        return $this;
    }

    public function addFruit($fruit)
    {
        $this->fruit = $fruit;

        return $this;
    }

    public function addSoup($soup)
    {
        $this->soup = $soup;

        return $this;
    }

    public function total()
    {
        $total = 0;

        if ($this->food) {
            $total += 30;
        }

        if ($this->drink) {
            $total += 20;
        }

        if ($this->meat) {
            $total += 10;
        }

        if ($this->fruit) {
            $total += 10;
        }

        if ($this->soup) {
            $total += 10;
        }

        return $total;
    }
}
