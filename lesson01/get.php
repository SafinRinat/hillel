<?php
/**
 * Created by PhpStorm.
 * User: rinat
 * Date: 04.12.16
 * Time: 11:15
 */

//index.php?var1=values

// сначала идет название скрипта имя файла, далее идет вопрос название переменной присваивание значение переменной
// такая передача данных называется  GET передачейданных.


$age = intval($_GET['age']);//суперглобальный массив GET
$gender = boolval($_GET['gender']);

var_dump($age);
var_dump($gender);
if($age < 15){
    echo 'hi child';
}
if($age > 15 and $age <= 17)
{
    echo 'hi teenager!';
}
elseif($age > 17 and $age < 30 and $gender === false) {
    echo 'hello Miss';
}
elseif($age >= 18 and $gender === true) {
    echo 'hello Mr';
}
elseif ($age > 30 and $gender === false) {
    echo 'hello woman';
}
elseif ($age > 30 and $gender === true) {
    echo 'hello Senior';
}
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="form.html">back to form</a>
</body>
</html>
