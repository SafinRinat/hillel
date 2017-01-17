<?php

include "Init.php";

$art = new Article("Title of article", "01.02.2016", "Some article text");
$art->show();

echo "<br />";

$news1 = new News("Some title", "10.12.2015", "Text");
$news1->setShortDescription("Some new title!");
$news1->show();

echo "<br />";

$pub = new Publication("Publication title", "20.05.2010", "Some publication text content!");
$pub->setAuthor("John Smith");
$pub->show();

Article::showCounter();