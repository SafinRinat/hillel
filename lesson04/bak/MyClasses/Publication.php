<?php

class Publication extends Article
{
    private $authorName;

    public function setAuthor($author)
    {
        $this->authorName = $author;
    }

    public function getAuthor()
    {
        return $this->authorName;
    }

    public function show()
    {
        parent::show();
        echo "Author name: " . $this->getAuthor() . "<br />";
    }
}