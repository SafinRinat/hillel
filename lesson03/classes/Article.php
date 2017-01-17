<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Article {

    private $title;
    private $dataPublished;
    protected $content;

    static $counter;

    public function __construct($tit = "", $data = "", $cont = "")
    {
        $this->title = $tit;
        $this->dataPublished = $data;
        $this->content = $cont;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo '-- DESTRUCT --';
        echo '<br />';
    }

    public  function show()
    {
        self::$counter++;

        echo 'Title :' . $this->title . "<br />";
        echo 'Data :' . $this->dataPublished . "<br />";
        echo 'Content :' . $this->content . "<br />";
    }


    public static function showCounter()
    {
        echo "Counter : " . self::$counter;
    }
}