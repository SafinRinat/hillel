<?php
class ProductsSale extends Products
{
    protected $limit = 'sale';
    public function __construct($brands, $models)
    {
        parent::__construct($brands, $models);
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
                    if(isset($details['count']) && $details['count'] !== 0) {
                        if(isset($details['sale_status']) && $details['sale_status'] === $this->limit)
                        {
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
}