<?php

use \Stoutie\JsonFiles\Iterator;

class IteratorTest extends PHPUnit_Framework_TestCase
{
    public function testIterator()
    {
        $path = preg_replace('/.php$/', '.data', __FILE__);
        $iterator = new Iterator($path);
        $actual = [];
        foreach ($iterator as $data) {
            $actual[] = $data;
        }
        $expected = [ ["one" => 1], ["three" => 3], ["two" => 2] ];
        $this->assertEquals($expected, $actual);
    }

    public function testIteratorPathFromFile()
    {
        $iterator = new Iterator(__FILE__);
        $actual = [];
        foreach ($iterator as $data) {
            $actual[] = $data;
        }
        $expected = [ ["one" => 1], ["three" => 3], ["two" => 2] ];
        $this->assertEquals($expected, $actual);
    }
}
