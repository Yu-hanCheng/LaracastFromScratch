<?php

namespace App;

class Example
{
    protected $foo;
    
    public function go()
    {
        dd("it works");
    }

    public function __construct($foo)
    {
        $this->foo = $foo;
    }
}