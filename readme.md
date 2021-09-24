- [1. Modify Dump](#1-modify-dump)
  - [1.1. Motivation](#11-motivation)
  - [1.2. How it works](#12-how-it-works)
  - [1.3. Usage](#13-usage)
    - [1.3.1. Installation](#131-installation)
    - [1.3.2. First example](#132-first-example)
    - [1.3.3. Further examples](#133-further-examples)
  - [1.4. Features](#14-features)
    - [1.4.1. Filters](#141-filters)
    - [1.4.2. Formatters](#142-formatters)
    - [1.4.3. Statistics](#143-statistics)
    - [1.4.4. Extendibility](#144-extendibility)
    - [1.4.5. Not restricted to var_dump](#145-not-restricted-to-var_dump)
- [2. Navigation](#2-navigation)


# 1. Modify Dump
Enables easy modification of `var_dump` output with Attributes, that were introduced in PHP 8.

## 1.1. Motivation
I just wanted to play around with Attributes and this library was the first use-case that came into mind.

## 1.2. How it works
PHP has a bunch of so called magic methods. These are object (or class) methods that get called under certain circumstances. Most of the time you'll come into touch with `__construct()`, which is called on object instantiation.  
One of the less known magic methods is [__debugInfo()][phpdoc_debugInfo] which is called on calling `var_dump()` on an object.  
This library provides a [Trait][phpdoc_traits] that overrides `__debugInfo()` and makes some magic based on the [Attributes][phpdoc_attributes] for the class and it's properties.

## 1.3. Usage
### 1.3.1. Installation
`composer require berbeflo/modify-dump`
### 1.3.2. First example
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

### 1.3.3. Further examples
Have a look at the examples folder!

## 1.4. Features
### 1.4.1. Filters
Filters allow to exclude properties, e.g. private properties without the burden to mark every property that should not be returned.  
The default filter **excludes all** properties that have **no** `Dump` Attribute.
### 1.4.2. Formatters
Formatters allow to modify the displayed content of a property.
### 1.4.3. Statistics
Statistics allow to add class/object statistics to the output.
### 1.4.4. Extendibility
It's easy to add new Formatters, Filters and Statistics.
### 1.4.5. Not restricted to var_dump
While the delivered trait overrides `__debugInfo()`, the logic is decoupled from this method. So it'd be easy to use this library to e.g. write a simple `toArray()` method.

# 2. Navigation
- [Filters](documentation/filters.md)
- [Formatters](documentation/formatters.md)
- [Statistics](documentation/statistics.md)



[phpdoc_debugInfo]: https://www.php.net/manual/en/language.oop5.magic.php#object.debuginfo
[phpdoc_traits]: https://www.php.net/manual/en/language.oop5.traits.php
[phpdoc_attributes]: https://www.php.net/manual/en/language.attributes.overview.php
