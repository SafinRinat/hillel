<?php
class Products
{

    /**
     * @var array
     */
    protected $brands;


    /**
     * @var array all items
     */
    protected $models;

    /**
     * @var string
     */
    protected $id_manufacturies;

    /**
     * @var integer
     */
    protected $countProducts;

    /**
     * @var array spec device
     */
    protected $attributes;

    /**
     * @var string
     */
    protected $short_description;

    /**
     * @var string
     */
    protected $description;


    /**
     * @var double
     */
    protected $price;


    public function __construct($brands, $models)
    {
        $this->getModels($brands, $models);
    }

    public function getModels($brands, $models)
    {
        foreach ($brands as $val)
        {
            foreach ($models[$val] as $key => $value)
            {
                $currentItemBrand =
                    "<div class='brand'>Название бренда: " . $val . "</div>
                    <div class='model'>Модель: " . $key . ": </div>";

                foreach ($value['MemorySize'] as $prod => $details)
                {
                    if($details['count'] !== 0) {
                        $memorySize =  "<div class='memory'>Объем памяти: " . $prod . "</div>";
                        $price =  "<div class='price'>Цена устройства: " . $details['price'] . '$</div>';
                        $count = "<div class='count-available'>В наличие устройств: " . $details['count'] . "</div><br />";
                        echo $currentItemBrand . $memorySize . $price . $count;
                    }
                }
            }
        }
    }
}