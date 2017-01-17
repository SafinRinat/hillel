<?php
/**
 * Created by PhpStorm.
 * User: rinat
 * Date: 05.12.16
 * Time: 4:08
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_REQUEST['email']) && isset($_REQUEST['password']) && isset($_REQUEST['rpassword']))
{
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['password'];
    $rpass = $_REQUEST['rpassword'];
    $phone = $_REQUEST['phone'];
    $city = $_REQUEST['city'];
    $result = ['error' => '', 'msg' => '', 'data' => []];

    if(!empty($email) && !empty($pass) && !empty($rpass))
    {
        if($pass !== $rpass)
        {
            $result['error'] = 'Пароли не совпадают';
        }

        $result['data'] = [
            'userEmail' => $email,
            'userPassword' => $pass,
            'repeatPassword' => $rpass,
            'phone' => $phone,
            'city' => $city,
        ];
    }
    else
    {
        $result['error'] = 'Заполните обязательные поля формы регистрации!';
    }

    if(isset($_REQUEST['getcheck']) && boolval($_REQUEST['getcheck']) === true)
    {//Enter with $_GET data
        unset($result['msg']);
        unset($result['error']);

        foreach($result['data'] as $key => $value)
        {
            echo 'Название поля : ' . $key ."<br />";
            echo 'Значение поля : ' . $value ."<br />";
            echo "<br />";
        }
    }
    else
    {//Enter without $_GET data
        echo json_encode($result);
    }
}
else
{
    echo 'Отсутсвуют входящие данные!';
}