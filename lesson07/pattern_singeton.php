<?php
/**
 *
 * Паттерны проектирования
 * 1. Singleton
 *
 */
class SmallORM
{
    private static $instance;

    public $var;
    //запрет переопределения конструктора
    private function __construct()
    {
    }
    //запрет клонирования класса
    public function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance()
    {
        if(self::$instance == null)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

$orm = SmallORM::getInstance();
$orm->var = 'Some text !!!!';

unset($orm);

$abc = SmallORM::getInstance();

$b = SmallORM::getInstance();

$c = SmallORM::getInstance();
