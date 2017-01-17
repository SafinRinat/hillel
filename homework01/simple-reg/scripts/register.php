<?php
/**
 * Created by PhpStorm.
 * User: rinat
 * Date: 08.12.16
 * Time: 1:29
 */
if(isset($_GET['email']) && isset($_GET['password']) && isset($_GET['rpassword']))
{
    $email = $_GET['email'];
    $pass = $_GET['password'];
    $rpass = $_GET['rpassword'];
    $phone = $_GET['phone'];
    $city = $_GET['city'];
    $result = ['error' => '', 'msg' => [], 'data' => []];

    if(!empty($email) && !empty($pass) && !empty($rpass))
    {
        if($pass !== $rpass)
        {
            $result['error'] = 'Пароли не совпадают';
        }

        if(empty($phone))
        {
            $phone = 'Поле "Phone" не заполнено!';
        }

        if(empty($city))
        {
            $city .= 'Поле "City" не заполнено!';
        }

        $result['data'] = [
            'Email' => $email,
            'Phone' => $phone,
            'City' => $city,
        ];

    }
    else
    {
        $result['error'] = 'Заполните обязательные поля формы регистрации!';
    }


    if(!empty($result['error']))
    {
        echo $result['error'];
    }
    else
    {
        foreach ($result['data'] as $key => $value)
        {
            echo $key . ' : ' . $value . '<br />';
        }
    }
}
else {
    echo 'Отсутсвуют входящие данные!';
}?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
</head>
<body>
<div>
    <a href="../index.html">back to form</a>
</div>
</body>
</html>