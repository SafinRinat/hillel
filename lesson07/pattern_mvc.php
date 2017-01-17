<?php

/**
 *  Нельзя изменятьбизнес логику во View и Контроллере
 */
class Model
{
    public function sum($x, $y)
    {
        return $x + $y;
    }

    public function multiple2($result)
    {
        return $result * 2;
    }

}

class View
{
    public function showResult($result)
    {
        echo "<b>Result</b>" . $result . "!</br>";
    }
}

class Controller
{
    public function doing()
    {
        $m = new Model();
        $v = new View();

        $result = $m->sum(5, 10);
        $result = $m->multiple2($result);
        $v->showResult($result);

    }
}

class ErrorController
{

}
// classexist
// metodexist