<?php
function __autoload($cn)
{
    $classFileName = "FolderClasses/" . $cn . ".php";
    require_once $classFileName;
}