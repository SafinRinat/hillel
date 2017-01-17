<?php
/**
 * Created by PhpStorm.
 * User: rinat
 * Date: 04.12.16
 * Time: 10:39
 */
$a = 100;
switch ($a)
{
    case 5:
        echo 'hello';
        echo 'Mike';
    break;
    case 10:
        echo  "Hi";
        echo "Maria";
    break;
    case 90:
    case 100:
        echo 'some message';
    break;

    default:
        echo 'else';
}