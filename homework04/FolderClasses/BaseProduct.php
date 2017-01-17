<?php
namespace FolderClasses;

abstract class BaseProduct implements IProduct
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var double
     */
    protected $price;

    /**
     * @var int
     */
     private static $counter = 0;

    /**
     * BaseProduct constructor.
     * @param $name string
     * @param $price float
     */
    public function __construct($name, $price)
    {
        self::$counter++;
        $this->id = $this->setItemID(self::$counter);
        $this->name = $this->setName($name);
        $this->price = $this->setPrice($price);
    }

    /**
     * @param $id
     */
    public function setItemID($id)
    {
        return $this->id  = $id;
    }

    /**
     * @param $name string
     */
    public function setName($name)
    {
        return $this->name  = $name;
    }

    /**
     * @param $price double
     */
    public function setPrice($price)
    {
        return $this->price  = $price;
    }

    protected function getCounter()
    {
        return self::$counter;
    }

    /**
     * @return string
     */
    public function getProductInfo()
    {
        return sprintf(
            '<div>ID: %s: Name : %s </div> <div>Price : %s </div>',
            $this->id,
            $this->name,
            $this->price
        );
    }

}