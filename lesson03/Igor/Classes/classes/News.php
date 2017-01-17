<?php

class News extends Article
{
    private $short_description;

    public function __construct($tit = "", $dat = "", $cont = "", $sd = "")
    {
        parent::__construct($tit, $dat, $cont);
        $this->short_description = $sd;
    }

    public function show()
    {
        parent::show(); // полиморфизм
        echo "Short description: " . $this->short_description . "<br />";
    }

    public function getShortDescription()
    {
        return $this->short_description;
    }

    public function setShortDescription($sd)
    {
        $this->short_description = $sd;
    }
}