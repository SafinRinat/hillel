<?php

use MyClasses\News;
use MyClasses\Article;
use MyClasses\Publication;
use MyClasses\SmallORM;
use MyClasses\ArticleWrongFieldsException;

if ($_SERVER["REQUEST_METHOD"] !== "GET" or $_SERVER["REQUEST_METHOD"] == "POST") {
    exit();
}


//$str = "Column-name1|Column-name2|Column-name3";
//echo $str . "<br />";
//$res1 = explode("|", $str);
//
//foreach ($res1 as $column)
//{
//    $res = explode("-", $column);
//    echo $res[1] . ";";
//}



include "Init.php";

$date = new \DateTime();
$date->setDate(2016, 2, 1);

$art = new Article("Title of article", (new \DateTime())->setDate(2016, 1, 2), "asdasdasdasd", 120);
$art->show();

$orm = new SmallORM("mysql:dbname=school;host=127.0.0.1", "root", "q1w2e3r4");
try {
    $orm->saveArticle($art);
} catch (\InvalidArgumentException $ex) {
    echo "<b>Ув. клиент! Ошибка при вводе. Данные не сохранились, повторите ввод.<br />" . $ex->getMessage() . "</b>";
}
catch (ArticleWrongFieldsException $ex)
{
    $errors = $ex->getErrors();
    echo "You have a lots of errors: <br />";
    foreach ($errors as $error) {
        echo $error . "<br />";
    }
}


echo "<br />";

$date2 = new \DateTime();

$news1 = new News("Some title", $date2, "Text");
$news1->setShortDescription("Some new title!");
$news1->showTitle("red");
//$news1->show();

$date3 = new \DateTime();
$date3->setDate(2010, 5, 20);
$pub = new Publication("Publication title", $date3, "Some publication text content!");
$pub->setAuthor("John Smith");
//$pub->show();

//Article::showCounter();