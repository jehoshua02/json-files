<?php

namespace Stoutie\JsonFiles;

class Loader
{
    protected $path;

    /**
     * Construct method.
     * @param string $path Path to load json files from. .php will be replaced
     * with .data which is handy when using in unit tests to load colocated data.
     */
    public function __construct($path)
    {
        $this->path = preg_replace('/.php$/', '.data', $path);
    }

    /**
     * Load data from json file.
     * @param  string $name Name of json file less path and extension.
     * @return array Json decoded data stored in file.
     */
    public function load($name)
    {
        $file = $this->path . '/' . $name . '.json';
        $data = json_decode(file_get_contents($file), true);
        return $data;
    }
}
