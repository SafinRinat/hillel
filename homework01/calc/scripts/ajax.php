<?php
/**
 * Created by PhpStorm.
 * User: rinat
 * Date: 05.12.16
 * Time: 1:24
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$result = ['error' => false, 'result' => '', 'multiplication' => ''];

if(isset($_REQUEST['numOne']) && isset($_REQUEST['numTwo']))
{
    $num1 = intval($_REQUEST['numOne']);
    $num2 = intval($_REQUEST['numTwo']);
    $method = $_REQUEST['method'];

    if($method === '*')
    {
        $result['result'] = $num1 * $num2;
    }
    elseif ($method === '/')
    {
        if($num1 === 0 || $num2 === 0)
        {
            $result['result'] = 'На ноль делить нельзя';
        }
        else
        {
            $result['result'] = $num1 / $num2;
        }
    }
    elseif ($method === '+')
    {
        $result['result'] = $num1 + $num2;
    }
    elseif ($method === '+')
    {
        $result['result'] = $num1 + $num2;
    }
    elseif ($method === '-')
    {
        $result['result'] = $num1 - $num2;
    }
    else
    {
        echo $result['result'] = 'Error operation';
    }

    if($num1 === 0 && $num2 === 0)
    {
        $result['result'] = 'Для получения результата необходимо указать оба числа';
    }

    echo json_encode($result);
}
elseif(isset($_REQUEST['enter_number']) && $_REQUEST['enter_number'] !== '')
{
    if(is_numeric($_REQUEST['enter_number']))
    {
        $enter_number = intval($_REQUEST['enter_number']);
        $totalCount = 9;
        $currentCount = 1;
        if($enter_number !== 0)
        {
            $result = [
                'multiplication' => []
            ];

            for($currentCount; $currentCount <= $totalCount; $currentCount++)
            {
                array_push($result['multiplication'], [$currentCount, $enter_number * $currentCount]);
            }
            //в случае открытия скрипта выводим на экран
            if(isset($_REQUEST['getcheck']) && is_bool(($_REQUEST['getcheck']) === true))
            {

                echo 'Результат умножения введеннго Вами числа "' . $enter_number . '" - на таблицу умножения равен:'. "<br />";

                foreach($result['multiplication'] as $index)
                {
                    $arrCounter = 0;
                    echo $enter_number . " x " . $index[0] . ' = '. $index[1] . '<br />';
                }
            }
            else
            {
                echo json_encode($result);
            }
        }
        else
        {
            $result['error'] = 'При умножение на ноль будет ноль!';
            echo json_encode($result);
        }
    }
    else
    {
        $result['error'] = 'Введите число!';
        echo json_encode($result);
    }
}
else
{
    $result['error'] = 'Отсутсвуют данные для расчета.';
    echo json_encode($result);

}