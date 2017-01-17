<?php
/**
 * Created by PhpStorm.
 * User: rinat
 * Date: 04.12.16
 * Time: 10:43
 */
$ar = [1,2,3,4,5,6,7,8,9,10];
$iter = 0;

for($iter; $iter <= 10; $iter++)
{
    echo $ar[$iter];
    echo "<br>";
}


for($iter; $iter <= 10; $iter = $iter + 2)
{//каждый второй элемент
    echo $ar[$iter];
    echo "<br>";
}