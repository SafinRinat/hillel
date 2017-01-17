<?php

namespace MyClasses;

abstract class BaseArticle implements IViewer
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var \DateTime
     */
    protected $datePublished;

    /**
     * @var string
     */
    protected $content;

    protected $price;

    static $counter;

    public function __construct($tit = "", \DateTime $dat = null, $cont = "", $price = 0)
    {
        $this->title = $tit;
        $this->content = $cont;
        $this->price = $price;

        if ($dat == null) {
            $this->datePublished = new \DateTime();
        } else {
            $this->datePublished = $dat;
        }
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function show()
    {
        self::$counter++;

        echo "Title: " . $this->title . "<br />";
        echo "Date published: " . $this->datePublished->format("H:i:s d.m.Y") . "<br />";
        echo "Content: " . $this->content . "<br />";
        echo "Price: " . $this->price . "<br />";
    }

    abstract public function showTitle($titleColor);

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return \DateTime
     */
    public function getDatePublished()
    {
        return $this->datePublished;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }


}