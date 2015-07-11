# json-files

Helper classes for loading and iterating json files.


## Install

Use composer:

```shell
composer require jehoshua02/json-files
```


## Usage

Given the following directory structure:

```
+ SomeClass.php
+ SomeClass.test.php
+ SomeClass.test.data/
|--+ someMethod/
|----+ simple.json
|----+ complex.json
```


### Iterator

In `SomeClass.test.php`:

1. Bring in the iterator with `use`.
2. Return the iterator from data provider.

```php
<?php

use \Stoutie\JsonFiles; /* [1] */

class SomeClassTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider someMethodDataProvider
     */
    public function testSomeMethod(/* ... args ... */)
    {
        /* ... test ... */
    }

    public function someMethodDataProvider()
    {
        return new JsonFiles\Iterator(__FILE__); /* [2] */
    }
}
```

The loader and iterator will replace `.php` on the end of the path with `.data`.
This allows a very concise syntax of passing in `__FILE__` and enables the
convention of placing test data in `SomeClass.test.data`, which matches the
name of the test file.

Although the primary use case the iterator was designed for was as a data
provider in unit tests, other than the path replacement and data directory
convention, it is otherwise generic and can be used to iterate on json files
in any context.


### Loader

```php
<?php

$jsonLoader = new JsonFiles\Loader(__FILE__);
$data = $jsonLoader->load('someMethod/simple');
```

Again, by convention, `.php` at the end of path will be replaced with `.data`,
but any path can be passed in and the loader is rather generic.
