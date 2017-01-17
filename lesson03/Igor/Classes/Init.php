<?php

function __autoload($cn)
{
    $classFileName = "classes/" . $cn . ".php";
    require_once $classFileName;
}