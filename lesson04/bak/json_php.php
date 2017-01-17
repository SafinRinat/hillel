<?php

$a = [
    'name' => "John",
    'age' => "23",
    'cars' => [
        'Toyota',
        'BMW'
    ],
];

$jsonText = json_encode($a);

echo $jsonText;

$someArray = json_decode($jsonText, true);
echo '<br /> <pre>';
var_dump($someArray);
echo '</pre>';