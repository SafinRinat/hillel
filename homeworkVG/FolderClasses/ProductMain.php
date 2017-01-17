<?php

class ProductMain
{
    private $products = [];
    private $productGenerate = null;

    public function getResult($separator = "\n")
    {
        $result = [];
        $products = $this->getProducts();
        foreach ($products as $product) {
            $result[] = $product->getProductInfo();
        }

        return implode($separator, $result);
    }

    public function setDataToClasses()
    {
        $entities = $this->getRandomData();
        foreach ($entities as $entity) {
            if (isset($entity['limit'])) {
                $this->addProducts(new ProductLimit(
                    $entity['name'],
                    $entity['price'],
                    $entity['limit']
                ));
            }
            elseif (isset($entity['begdate']) && isset($entity['begdate'])) {
                $this->addProducts(new ProductPeriod(
                    $entity['name'],
                    $entity['price'],
                    $entity['begdate'],
                    $entity['enddate']
                ));
            }
            else {
                $this->addProducts(new Product($entity['name'], $entity['price']));
            }
        }
    }

    private function addProducts($cmd)
    {
        $this->products[] = $cmd;
    }

    private function getProducts()
    {
        return $this->products;
    }

    private function getRandomData()
    {
        if (!$this->getProductGenerate()) {
            return [];
        }

        return $this->getProductGenerate()->getData();
    }

    private function getProductGenerate()
    {
        if (!$this->productGenerate) {
            $this->productGenerate = new ProductGenerate();
        }

        return $this->productGenerate;
    }
}