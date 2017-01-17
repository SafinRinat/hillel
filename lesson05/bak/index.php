<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Datetime();
use MyClasses\News;
use MyClasses\Article;
use MyClasses\Publication;

include "Init.php";
//$someDate = new \DateTime();
//$someDate->setDate(2002,5,1);
//$someDate->setTime(4,30,5);
//echo $someDate->format('H:m:i d.y.m');
//echo "<pre>";
//var_dump($someDate);

//$date1 = new \DateTime();
//$date2 = new \DateTime();
//
//$date1->setDate(2015, 01, 20);
//$date1->setTime(5, 30);
//
//$date2->setDate(2015,01,20);
//$date2->setTime(1, 5);
//
//$result = $date1->diff($date2); // проверить разницу
//
//echo $result->format("%Y %m %d %H %i %s");

//вывод ошибок в том виде к в тором нужно
//function myErrorHandler($erron, $errstr, $errfile, $errline)
//{
//    echo "<b style='color: red;'>PHP ERROR!</b>" . $errstr;
//}
//set_error_handler('myErrorHandler', E_ALL); // передаем стринг (ссылку на объект)

//class MyExaption extends \Exception
//{
//
//}
//
//
//
//
//try
//{
//    $a = -50;
//    $b = 5;
//
//    if($b == 0)
//    {
//        $ex = new \InvalidArgumentException();
//        throw $ex;
//    }
//
//    if($a < 0)
//    {
//        $ex2 = new \Exception('Variable A must be positive!');
//        throw $ex2;
//    }
//    $res = $a / $b;
//
//    if($res > 10)
//    {
//        $ex3 = new WrongResultExaption("Result shouldn't be more 10");
//        throw $ex3;
//    }
//
//    try
//    {
//        //..
//    }catch (\Exception $ex)
//    {
//        throw $ex;
//    }
//}
//catch (\InvalidArgumentException $ex)
//{
////    echo $ex->getMessage(); //встроенный метод в базовый класс Exaption
//    echo "Your argumnt is wrong! Please check and repeat!";
//}
//catch (\WrongResultException $ex)
//{
//   echo "Our exception. Messenge: " . $ex->getMessage();
//}
//catch (\Exception $ex)
//{
//    echo "Some general error: " . $ex->getMessage();
//}
//finally
//{
//    echo "<br/> END";
//}

//$ex = new \Exception(E_ALL);
//
//throw $ex;


//function myExeptionHandler($ex)
//{
//    echo "<pre>";
//    var_dump($ex);
//}
//
//set_exception_handler('myExeptionHandler');
//
//
//throw new \Error('самый верхний класс вывода ошибок, нельзя наследовать!!!');

//Старый формат:
//mysqli_connect();
//mysql_query();

//$connect = mysqli();
try
{
    $pdo = new PDO("mysql:dbname=school;host=127.0.0.1", "root", '');

//    $sqlite = new PDO("sqlite:/tmp/school.sq3");
}
catch (\PDOException $ex)
{
    echo 'Sorry, site error';
    exit();
}

//$sql = "select * from article";
$articleId = intval(1);

$sql = "select * from article where id = :article_id";
$sth->bindParam(':article_id', $articleId, PDO::PARAM_INT);
$sth = $pdo->prepare($sql);
if($sth === false)
{
    $ex =  new \Exception("Can't  prepare sql query!");
    throw $ex;
}

$sth->execute();

$data = $sth->fetchAll(PDO::FETCH_ASSOC);

echo "Количество статей: " . count($data) . "<br />";

foreach ($data as $item)
{
    echo "<b>" . $item['date_published'] . " " . $item['title'] . "</b><br />";
}




die();




$date = new \DateTime();
$date->setDate(2016, 2, 1);
$art = new Article("Title of article", $date, "Some article text");
$art->show();

echo "<br />";
$date2 = new \DateTime();
$news1 = new News("Some title", $date2, "Text");
$news1->setShortDescription("Some new title!");
$news1->showTitle("red");
$news1->show();

$someText = serialize($news1);
echo "Serialize data: " . $someText . "<br />";

$o = unserialize($someText);
echo "<pre>";
var_dump($o);


$date3 = new \DateTime();
$date3->setDate(2010, 5, 20);
$pub = new Publication("Publication title", $date3, "Some publication text content!");
$pub->setAuthor("John Smith");
$pub->show();

Article::showCounter();