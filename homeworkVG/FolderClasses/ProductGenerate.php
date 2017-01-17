<?php

class ProductGenerate
{
    private $data = [];

    public function __construct()
    {
        $this->execute();
    }

    public function getData()
    {
        return $this->data;
    }

    private function execute()
    {
        $this->generateEntities(rand(1, 50), false, false);
        $this->generateEntities(rand(1, 50), true, false);
        $this->generateEntities(rand(1, 50), false, true);
    }

    private function addEntity($entity)
    {
        $this->data[] = $entity;
    }

    private function generateEntities(
        $countRecords,
        $isLimit,
        $isDate
    ) {
        for ($i = 0; $i < $countRecords; $i++) {
            $this->addEntity(
                $this->fillEntity($isLimit, $isDate)
            );
        }
    }

    private function fillEntity($isLimit, $isDate)
    {
        $entity = [
            'name'  => 'Product #' . uniqid("PR"),
            'price' => number_format((rand(1, 100) / 10), 2, ".", " ")
        ];
        if ($isLimit) {
            $entity['limit'] = rand(1, 100);
        }
        if ($isDate) {
            $time = time();
            $entity['begdate'] = date('Y-m-d', rand($time - 10000000, $time - 5000000));
            $entity['enddate'] = date('Y-m-d', rand($time - 4999999, $time));
        }

        return $entity;
    }
}