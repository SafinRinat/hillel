<?php

//$data = file_get_contents(__DIR__ . "/cars.xml");
//$xml = new \SimpleXMLElement($data);

$xml = simplexml_load_file(__DIR__ . "/cars.xml");

foreach ($xml->cars->car as $item)
{
    echo "<b>" . $item->attributes()->manufacturer . "<b>";
    echo " " . $item->model . " . Price ";
    echo $item->price . " " . $item->currency;
    echo "<br />";
}