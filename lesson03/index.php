<?php
include 'init.php';

$objP = new Article('Tittle of article', '10.12.2016', 'Text');
$objP->show();
echo '<br/>';
$objP::showCounter();

$objEx1 = new News('Some Tittle', '10.12.2016', 'Text');
$objEx1->setShortDescription('Some New Tittle');
$objEx1->show();

echo '<br/>';

$objEx2 = new Publication('Some Publication', '10.12.2016', 'Text');
$objEx2->setAuthor('Some New Tittle');
$objEx2->show();