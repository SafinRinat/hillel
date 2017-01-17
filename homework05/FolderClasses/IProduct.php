<?php
namespace FolderClasses;

interface IProduct
{
    /**
     * @param $id
     * @return mixed
     */
    public function setItemID($id);

    /**
     * @param $name
     * @return mixed
     */
    public function setName($name);

    /**
     * @param $price
     * @return mixed
     */
    public function setPrice($price);

    /**
     * @return mixed
     */
    public function getProductInfo();
}