<?php

namespace MyClasses;

class ArticleWrongFieldsException extends \Exception
{
    private $errors = [];

    public function __construct(array $errors)
    {
        parent::__construct();
        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}