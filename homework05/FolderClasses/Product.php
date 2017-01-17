<?php
namespace FolderClasses;

class Product extends BaseProduct
{

    public function __construct($name, $price)
    {
        parent::__construct($name,$price);
    }
}