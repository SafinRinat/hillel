<?php
$data = [
    "products" => [
        [
            "model" => "FX-35",
            "price" => "85000",
            "currency" => "EUR",
            "manufacturer" => "Infinity"
        ],
        [
            "model" => "FX-35",
            "price" => "85000",
            "currency" => "EUR",
            "manufacturer" => "Infinity"
        ],
        [
            "model" => "FX-35",
            "price" => "85000",
            "currency" => "EUR",
            "manufacturer" => "Infinity"
        ]
    ]
];

$jsonString = json_encode($data);

$dataAr = json_decode($jsonString, true);

var_dump($dataAr);