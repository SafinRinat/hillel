<?php
namespace FolderClasses;

class ProductSale extends BaseProduct
{
    /**
     * @var integer
     */
    private $count = false;

    /**
     * @var integer
     */
    private $stock = 'out of stock';

    /**
     * ProductSale constructor.
     * @param string $name
     * @param float $price
     * @param integer $limit
     */
    public function __construct($name, $price, $count)
    {
        parent::__construct($name, $price);
        $this->setCount($count);
        $this->checkEvent();
    }

    /**
     * @param $count integer
     */
    protected function setCount($count)
    {
        return $this->count = $count;
    }

    /**
    * @param $count integer
    */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param $limit integer
     */
    protected function checkEvent()
    {
        if($this->count >= 0 || $this->count !== false)
        {
            return $this->stock = 'in stock';
        }
    }

    /**
     * @return string
     */
    public function getProductInfo()
    {
        return sprintf(
            "%s <div>Items : %s</div>",
            parent::getProductInfo(),
            $this->stock
        );
    }
}