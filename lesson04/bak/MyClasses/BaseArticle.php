<?php
abstract class BaseArticle implements IViewer
{
    private $short_descriptin;

    private $status;

    public function __construct()
    {

    }

    public function __sleep()
    {
        // TODO: Implement __sleep() method.
    }

    public function  __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    //Magic method
    public function __toString()
    {
        // TODO: Implement __toString() method.
    }

    //base php method
    public function jsonSerialize()
    {

    }
}