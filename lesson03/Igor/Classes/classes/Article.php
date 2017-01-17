<?php

class Article
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

    public static function showCounter()
    {
        echo "Counter: " . self::$counter . "<br />";
    }
}