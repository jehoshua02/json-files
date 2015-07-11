<?php

namespace Stoutie\JsonFiles;

class Iterator extends \IteratorIterator
{
    /**
     * Construct method.
     * @param string $path Path to load json files from. .php will be replaced
     * with .data which is handy when using in unit tests to load colocated data.
     */
    public function __construct($path)
    {
        $path = preg_replace('/.php$/', '.data', $path);
        parent::__construct(new \GlobIterator($path . '/*.json'));
    }

    /**
     * Overrides IteratorIterator::current to provide file loading and json decoding.
     * @return array Decoded json data.
     */
    public function current()
    {
        $content = file_get_contents(parent::current());
        $data = json_decode($content, true);
        return $data;
    }
}
