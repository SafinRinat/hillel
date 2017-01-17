<?php
/**
 * Created by PhpStorm.
 * User: rinat
 * Date: 04.12.16
 * Time: 11:37
 */
//arg2, arg3  значение по умолчанию, если не передается значение в аргументах, то 1,
// иначе то значение котрое передаем при вызове функции
function sayAge($arg1, $arg2, $arg = 1, $arg3 = 3)
{
    return $arg1 + $arg2;
}

$result = sayAge(2, 5);
if(isset($result))
{
    echo $result;
    echo "<br />";
}

$age = intval($_GET['age']);//суперглобальный массив GET
$gender = boolval($_GET['gender']);

$res = sayHello($age, $gender);
echo $res;
echo '<br />';
function sayHello($age, $gender)
{
    if($age < 15){
        return 'hi child';
    }
    if($age > 15 and $age <= 17)
    {
        return 'hi teenager!';
    }
    elseif($age > 17 and $age < 30 and $gender === false) {
        return 'hello Miss';
    }
    elseif($age >= 18 and $gender === true) {
        return 'hello Mr';
    }
    elseif ($age > 30 and $gender === false) {
        return 'hello woman';
    }
    elseif ($age > 30 and $gender === true) {
        return 'hello Senior';
    }
}


//глобал можно использовать
// но в нутри функции глобал нельзя так делают дебилы
global $a;
$a = 10;

function foo($a)
{

    echo $a;
}


//вложенные функции - не использутся => name spases


function foo1()
{
    function bar()
    {
        echo 'hello';
    }
}

//вызывается родительсякая функция потом вложенная иначе ошибка
foo1();
bar();
