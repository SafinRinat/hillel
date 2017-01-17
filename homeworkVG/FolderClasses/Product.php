<?php
namespace FolderClasses;

class Product
{
    private $id;
    private $name;
    private $price;
    private static $count = 0;

    public function __construct($name, $price)
    {
        self::$count++;
        $this->setId(self::$count);
        $this->setName($name);
        $this->setPrice($price);
    }

    protected function setId($id)
    {
        $this->id = $id;
    }

    protected function setName($name)
    {
        $this->name = $name;
    }

    protected function setPrice($price)
    {
        $this->price = $price;
    }

    public function getCount()
    {
        return self::$count;
    }

    public function getProductInfo()
    {
        return sprintf(
            "ID: %s NAME: %s PRICE: %s",
            $this->id,
            $this->name,
            $this->price
        );
    }
}