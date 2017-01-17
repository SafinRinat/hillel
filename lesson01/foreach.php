<?php
/**
 * Created by PhpStorm.
 * User: rinat
 * Date: 04.12.16
 * Time: 10:58
 */

$ar = [1,2,3,4,5,6,7,8,9,10];
$iter = 0;

foreach ($ar as $index => $arrIten)
{
    echo $index;
    echo '<br>';
}


$arr2 = [
    1,
    50 => 20,
    3,
    4,
    5,
    6,
    7,
    8,
    9,
    10
];

foreach ($arr2 as $index => $arrIten)
{
    echo $index;
    echo '<br>';
}



$arrName = [
    'presedent' => [
        'fist_name' => 'John',
        'last_name' => "Smith",
        'birthday' => '10.05.1975'
    ],
    'student' => [
        'fist_name' => 'Sarach',
        'last_name' => "Mikle",
        'birthday' => '23.12.1991'
    ],
    'teacher' => [
        'fist_name' => 'James',
        'last_name' => "Mikie",
        'birthday' => '07.01.2001'
    ]
];

foreach($arrName as $index => $arIten)
{
    echo 'Index : ' . $index ."<br />";
    echo 'Full name: ' . $arrName[$index]['first_name'] . $arrName[$index]['last_name'] .'<br />';
    echo 'Birthday:' . $arrName[$index]['birthday'] . '<br /><br />';
}