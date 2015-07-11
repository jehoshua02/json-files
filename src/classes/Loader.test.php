<?php

use \Stoutie\JsonFiles\Loader;

class LoaderTest extends PHPUnit_Framework_TestCase
{
    public function testLoad()
    {
        $path = preg_replace('/.php$/', '.data', __FILE__);
        $jsonFiles = new Loader($path);
        $actual = $jsonFiles->load('whatever');
        $expected = [
            "monkey" => "banana",
            "bool" => true,
            "id" => 1,
        ];
        $this->assertEquals($expected, $actual);
    }

    public function testLoadPathFromFile()
    {
        $jsonFiles = new Loader(__FILE__);
        $actual = $jsonFiles->load('whatever');
        $expected = [
            "monkey" => "banana",
            "bool" => true,
            "id" => 1,
        ];
        $this->assertEquals($expected, $actual);
    }
}
