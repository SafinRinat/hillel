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

    public function __construct($tit = "", \DateTime $dat = null, $cont = "")
    {
        $this->title = $tit;
        $this->datePublished = $dat;
        $this->content = $cont;
    }

    public function show()
    {
        self::$counter++;

        echo "Title: " . $this->title . "<br />";
        echo "Date published: " . $this->datePublished->format('H:i;s Y.m.d') . "<br />";
        echo "Content: " . $this->content . "<br />";
    }

    abstract public function showTitle($titleColor);
}