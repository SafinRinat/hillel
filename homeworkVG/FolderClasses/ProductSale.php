<?php
namespace FolderClasses;

class ProductLimit extends Product
{
    private $limit;

    public function __construct($name, $price, $limit)
    {
        parent::__construct($name, $price);
        $this->setLimit($limit);
    }

    protected function setLimit($limit)
    {
        $this->limit = $limit;
    }

    public function getProductInfo()
    {
        return sprintf(
            "%s LIMIT: %s",
            parent::getProductInfo(),
            $this->limit
        );
    }
}