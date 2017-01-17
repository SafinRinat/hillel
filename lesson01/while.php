<?php
/**
 * Created by PhpStorm.
 * User: rinat
 * Date: 04.12.16
 * Time: 10:50
 */
$ar = [1,2,3,4,5,6,7,8,9,10];
$iter = 0;
$isStart = true;
//while($iter <= 10)
//{
//    echo $iter;
//    echo "<br>";
//    $iter++;
//}

while($isStart)
{
    echo $iter;
    echo "<br>";
    if($iter === 10)
    {
        $isStart = false;// конец цикла
    }

    $iter++;
}