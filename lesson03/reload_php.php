<?php

class A {
    public function foo()
    {
        echo  'Class A PARENT';
    }
}

class B extends A {
    public function foo()
    {
        parrent::foo();
        echo "Class B extend A foo() </br>";
        echo "Var value = " ;
    }
}

$b = new B();
$b->foo();