<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_REQUEST['enter_number']) && $_REQUEST['enter_number'] !== '' && is_numeric($_REQUEST['enter_number']))
{
    $enter_number = intval($_REQUEST['enter_number']);
    $currentCount  = 1;

    echo 'Умножение вашего числа от 1 до 9 равняется: <br />';

    for($currentCount; $currentCount <= 9; $currentCount++)
    {
        echo $enter_number . ' x ' . $currentCount . ' = ' . $enter_number * $currentCount . '<br />';
    }
}
else {
    echo 'Переменная enter_number должна быть числом!';
}