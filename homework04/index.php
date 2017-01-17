<?php
/**
 * Задача №1.
 * Самостоятельно разработать
 * 3 обычных класса которые описывают:
 * 1. Товар
 * 2. Акционный товар (на который действует акция до момента его полной распродажи)
 * 3. Акционный товар (на который действует временная акция. В период С и ПО)
 *    В задаче обязательно должно использоваться: минимум 1 магический метод (конструктор),
 *    наследование.
 *     Использование остального функционала ООП на свое усмотрение.
 *Создать 3 массива (для каждого класса), где каждый массив будет состоять из 5-ти обьектов.
 * Вывести информацию о товарх на экран с использованием цикла foreach.
 *
 * Задача №2.
 * Написать класс у которого будет минимум 1 метод. Задача метода(ов) вывести на экран всю информацию о товаре.
 * Было бы хорошо использовать статическое свойство класса для вывода порядкового номера товара.
 *
 */
//Домашка в этот раз будет не большая:
// 1. Добавить к классам namespace.
// 2. Переделать функцию __autoload
//3. Добавить абстрактный класс и вынести туда общую функциональность остальных классов.
//4. К классу с акционными товарами (где акция действует по времени) добавить константу (до какого числа действует акция на товар).
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use FolderClasses\Product;
use FolderClasses\ProductSale;
use FolderClasses\ProductPeriod;

require_once 'init.php';

$product1 = new Product('Product 1', '22.13');
$product2 = new Product('Product 2', '15.19');
$product3 = new Product('Product 3', '55.11');
$product4 = new Product('Product 4', '18.18');
$product5 = new Product('Product 5', '88.77');

$productSale1 = new ProductSale('ProductSale 1', '124.421', 10);
$productSale2 = new ProductSale('ProductSale 2', '22.55', 5);
$productSale3 = new ProductSale('ProductSale 3', '4.14', 1);
$productSale4 = new ProductSale('ProductSale 4', '78.1', 10);
$productSale5 = new ProductSale('ProductSale 5', '86.18', 10);

$prodPeriod1 = new ProductPeriod('ProductPeriod 1', '44.44', "2016-12-07", "2016-12-31");
$prodPeriod2 = new ProductPeriod('ProductPeriod 2', '55.55', "2016-12-13", "2016-12-31");
$prodPeriod3 = new ProductPeriod('ProductPeriod 3', '11.22', "2016-12-16", "2016-12-31");
$prodPeriod4 = new ProductPeriod('ProductPeriod 4', '13.13', "2016-12-12", "2016-12-31");
$prodPeriod5 = new ProductPeriod('ProductPeriod 5', '67.76', "2016-12-21", "2016-12-31");

//$prodSale = new Product();
//$prodSaleLimit = new Product();

$productList = [
    $product1,
    $product2,
    $product3,
    $product4,
    $product5,
    $productSale1,
    $productSale2,
    $productSale3,
    $productSale4,
    $productSale5,
    $prodPeriod1,
    $prodPeriod2,
    $prodPeriod3,
    $prodPeriod4,
    $prodPeriod5
];

foreach ($productList as $product) {
    echo $product->getProductInfo() . "<br />\n";
}