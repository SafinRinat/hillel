<?php
namespace FolderClasses;

class ProductPeriod extends BaseProduct
{
    /**
     * @var \DateTime
     */
    private $begDate;
    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * ProductPeriod constructor.
     * @param $name
     * @param $price
     * @param $begDate
     * @param $endDate
     */
    public function __construct($name, $price, $begDate, $endDate)
    {
        parent::__construct($name, $price);
        $this->setBegDate($begDate);
        $this->setEndDate($endDate);
    }

    /**
     * @param $begDate
     * @return mixed
     */
    protected function setBegDate($begDate)
    {
        return $this->begDate = $begDate;
    }

    /**
     * @return  $begDate
     */
    public function getBegDate()
    {
        return $this->begDate;
    }

    /**
     * @param $endDate
     * @return mixed
     */
    protected function setEndDate($endDate)
    {
        return $this->endDate = $endDate;
    }


    /**
     * @return  $begDate
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @return string
     */
    public function getProductInfo()
    {
        return sprintf(
            "%s <div>BEG DATE : %s</div> <div>END DATE : %s</div>",
            parent::getProductInfo(),
            $this->begDate,
            $this->endDate
        );
    }
}