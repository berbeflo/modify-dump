- [Modify Dump](#modify-dump)
  - [Motivation](#motivation)
  - [How it works](#how-it-works)
  - [Usage](#usage)
    - [Installation](#installation)
    - [First example](#first-example)
    - [Further examples](#further-examples)
  - [Features](#features)
    - [Filters](#filters)
    - [Formatters](#formatters)
    - [Statistics](#statistics)
    - [Extendibility](#extendibility)
    - [Not restricted to var_dump](#not-restricted-to-var_dump)


# Modify Dump
Enables easy modification of `var_dump` output with Attributes, that were introduced in PHP 8.

## Motivation
I just wanted to play around with Attributes and this library was the first use-case that came into mind.

## How it works
PHP has a bunch of so called magic methods. These are object (or class) methods that get called under certain circumstances. Most of the time you'll come into touch with `__construct()`, which is called on object instantiation.  
One of the less known magic methods is [__debugInfo()][phpdoc_debugInfo] which is called on calling `var_dump()` on an object.  
This library provides a [Trait][phpdoc_traits] that overrides `__debugInfo()` and makes some magic based on the [Attributes][phpdoc_attributes] for the class and it's properties.

## Usage
### Installation
`composer require berbeflo/modify-dump`
### First example
Use the Trait `ModifiedDump` and tell it which properties to show:
```php
<?php

declare(strict_types=1);

use Berbeflo\ModifyDump\Attribute\Dump;
use Berbeflo\ModifyDump\Trait\ModifiedDump;

require_once('vendor/autoload.php');

class Test
{
    use ModifiedDump;

    #[Dump]
    private string $a = "test";
    protected int $b;
    #[Dump]
    public int | string $c = 5;
}

var_dump(new Test());
```

The corresponding output:
``` 
object(Test)#3 (3) {
  ["a"]=>
  string(4) "test"
  ["b"]=>
  object(Berbeflo\ModifyDump\State\Uninitialized)#9 (0) {
  }
  ["c"]=>
  int(5)
}
```

### Further examples
Coming soon...

## Features
### Filters
Filters allow to exclude properties, e.g. private properties without the burden to mark every property that should not be returned.  
The default filter **excludes all** properties that have **no** `Dump` Attribute.
### Formatters
Formatters allow to modify the displayed content of a property.
### Statistics
Statistics allow to add class/object statistics to the output.
### Extendibility
It's easy to add new Formatters, Filters and Statistics.
### Not restricted to var_dump
While the delivered trait overrides `__debugInfo()`, the logic is decoupled from this method. So it'd be easy to use this library to e.g. write a simple `toArray()` method.

[phpdoc_debugInfo]: https://www.php.net/manual/en/language.oop5.magic.php#object.debuginfo
[phpdoc_traits]: https://www.php.net/manual/en/language.oop5.traits.php
[phpdoc_attributes]: https://www.php.net/manual/en/language.attributes.overview.php
