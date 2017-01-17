<?php

use MyClasses\News;
use MyClasses\Article;
use MyClasses\Publication;
use MyClasses\SmallORM;

include "Init.php";

$date = new \DateTime();
$date->setDate(2016, 2, 1);

$art = new Article("Title of article", $date, "Some article text");
//$art->show();

$orm = new SmallORM("mysql:dbname=school;host=127.0.0.1", "root", "");
//$orm->saveArticle($art);
$article = $orm->getArticleById(11);
$article->show();

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