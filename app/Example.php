<?php

namespace App;

class Example
{
    public function __construct($apikey)
    {
        $this->apikey = $apikey;
    }
    
    public function handle()
    {
        die('it works');
    }
}