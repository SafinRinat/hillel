<?php
if ($_SERVER["REQUEST_METHOD"] !== "GET" or $_SERVER["REQUEST_METHOD"] == "POST") {
    exit();
}
//Гидраторы библиотеки для хайлоада
class Student {
    private $firstName;
    private $lastName;

    public function __construct()
    {
        echo "Constructor is run !!!";
    }
}
//ReflectionClass механизм для изменения доступа к методам и переменным класса
$ref = new \ReflectionClass(Student::class);
$o = $ref->newInstanceWithoutConstructor();

{
    $prop->setAccessible(true);
    $prop->setValue($o, "some name");
}

include "Init.php";