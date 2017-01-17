<?php

interface IStudent
{
    public function setName();
    public function getName();

    public function setGroup();
    public function getGroup();
}

class SomeClass
{
    public function foo(IStudent $student)
    {

    }
}

class MyClass implements IStudent
{

}