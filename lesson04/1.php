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
    public function setName()
    {
        // TODO: Implement setName() method.
    }

    public function getName()
    {
        // TODO: Implement getName() method.
    }

    public function setGroup()
    {
        // TODO: Implement setGroup() method.
    }

    public function getGroup()
    {
        // TODO: Implement getGroup() method.
    }

}

$someObj = new MyClass();

$o = new SomeClass();
$o->foo($someObj);