<?php
namespace FolderClasses;

class ProductPeriod extends BaseProduct
{
    /**
     * @var \DateTime
     */
    private $begDate = false;
    /**
     * @var \DateTime
     */
    private $endDate = false;

    /**
     * @cons string
     */
    const END_EVENT_DATE = '2017.01.31';
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
        $this->setEndDate($endDate, self::END_EVENT_DATE);
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
    protected function setEndDate($endDate, $const_end_event)
    {
        if(strtotime($const_end_event) < strtotime($endDate))
        {
            // период проведения акции закончился
//            return 'Event is end';
        }
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