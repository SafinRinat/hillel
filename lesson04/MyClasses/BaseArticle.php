<?php

namespace MyClasses;

abstract class BaseArticle implements IViewer
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $datePublished;

    /**
     * @var string
     */
    protected $content;

    static $counter;

    public function __construct($tit = "", $dat = "", $cont = "")
    {
        $this->title = $tit;
        $this->datePublished = $dat;
        $this->content = $cont;
    }

    public function show()
    {
        self::$counter++;

        echo "Title: " . $this->title . "<br />";
        echo "Date published: " . $this->datePublished . "<br />";
        echo "Content: " . $this->content . "<br />";
    }

    abstract public function showTitle($titleColor);
}