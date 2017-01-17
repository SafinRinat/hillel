<?php
namespace FolderClasses;

class ProductPeriod extends Product
{
    private $begDate;
    private $endDate;

    public function __construct($name, $price, $begDate, $endDate)
    {
        parent::__construct($name, $price);
        $this->setBegDate($begDate);
        $this->setEndDate($endDate);
    }

    protected function setBegDate($begDate)
    {
        $this->begDate = $begDate;
    }

    protected function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    public function getProductInfo()
    {
        return sprintf(
            "%s BEG DATE: %s END DATE: %s",
            parent::getProductInfo(),
            $this->begDate,
            $this->endDate
        );
    }
}