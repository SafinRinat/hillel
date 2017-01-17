<?php
$age = 27;
$gender = true; //true - m, false = f;

if($age > 15 and $age <= 17)
{
    echo 'hi teenager!';
}
elseif($age >17 and $age < 30 and $gender === false) {
    echo 'hello Miss';
}
elseif($age >= 30 and $gender === false) {
    echo 'hello ms';
}
elseif ($age >= 30 and $gender === true) {
    echo 'hello Seniro';
}
elseif($age > 15 && $gender === false)
{
    echo 'hi you are child and girl';
}