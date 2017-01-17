<?php
use FolderClasses\Product;
use FolderClasses\ProductSale;
use FolderClasses\ProductSaleLimit;

require_once 'index.php';
require_once 'db\f_db.php';

//$clAllList = new Product();

//$ar1 = [
//    new SomeClass(….),
//    new SomeClass(….),
//    new SomeClass(….),           …
//];
//1. Добавить к классам namespace.
//2. Переделать функцию __autoload
//3. Добавить абстрактный класс и вынести туда общую функциональность остальных классов.
//4. К классу с акционными товарами (где акция действует по времени) добавить константу (до какого числа действует акция на товар).

$products = [
    new Product("Product 1", "10.05"),
    new Product("Product 2", "11.05"),
    new Product("Product 3", "12.05"),
    new Product("Product 4", "13.05"),
    new Product("Product 5", "14.05"),
    new ProductLimit("Product 6", "20.01", 10),
    new ProductLimit("Product 7", "21.01", 20),
    new ProductLimit("Product 8", "22.01", 30),
    new ProductLimit("Product 9", "23.01", 40),
    new ProductLimit("Product 10", "24.01", 50),
    new ProductPeriod("Product 11", "30.77", "2016-12-01", "2016-12-31"),
    new ProductPeriod("Product 12", "30.77", "2016-12-02", "2016-12-31"),
    new ProductPeriod("Product 13", "30.77", "2016-12-03", "2016-12-31"),
    new ProductPeriod("Product 14", "30.77", "2016-12-04", "2016-12-31"),
    new ProductPeriod("Product 15", "30.77", "2016-12-05", "2016-12-31"),
];

foreach ($products as $product) {
    echo $product->getProductInfo(), " ALL COUNT: ", $product->getCount(), "\n";
}

//ID: 1 NAME: Product 1 PRICE: 10.05 ALL COUNT: 15
//ID: 2 NAME: Product 2 PRICE: 11.05 ALL COUNT: 15
//ID: 3 NAME: Product 3 PRICE: 12.05 ALL COUNT: 15
//ID: 4 NAME: Product 4 PRICE: 13.05 ALL COUNT: 15
//ID: 5 NAME: Product 5 PRICE: 14.05 ALL COUNT: 15
//ID: 6 NAME: Product 6 PRICE: 20.01 LIMIT: 10 ALL COUNT: 15
//ID: 7 NAME: Product 7 PRICE: 21.01 LIMIT: 20 ALL COUNT: 15
//ID: 8 NAME: Product 8 PRICE: 22.01 LIMIT: 30 ALL COUNT: 15
//ID: 9 NAME: Product 9 PRICE: 23.01 LIMIT: 40 ALL COUNT: 15
//ID: 10 NAME: Product 10 PRICE: 24.01 LIMIT: 50 ALL COUNT: 15
//ID: 11 NAME: Product 11 PRICE: 30.77 BEG DATE: 2016-12-01 END DATE: 2016-12-31 ALL COUNT: 15
//ID: 12 NAME: Product 12 PRICE: 30.77 BEG DATE: 2016-12-02 END DATE: 2016-12-31 ALL COUNT: 15
//ID: 13 NAME: Product 13 PRICE: 30.77 BEG DATE: 2016-12-03 END DATE: 2016-12-31 ALL COUNT: 15
//ID: 14 NAME: Product 14 PRICE: 30.77 BEG DATE: 2016-12-04 END DATE: 2016-12-31 ALL COUNT: 15
//ID: 15 NAME: Product 15 PRICE: 30.77 BEG DATE: 2016-12-05 END DATE: 2016-12-31 ALL COUNT: 15