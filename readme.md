# Modify Dump
Enables easy modification of `var_dump` output with php8 Attributes

## Motivation
I just wanted to play around with Attributes and this library was the first use-case that came into mind

## ToDos
### Documentation
Yeah...

### CI and Stuff
- Use phpcs to enforce code style (PSR-12)
- Some test cases
- Github-Runners

### Functionality
- Add more Formatters
- Allow definition of default formatter for a class
- Allow definition of filters to e.g. auto-exclude uninitialized properties

## Usage
### Installation
`composer require berbeflo/modify-dump`
### Example
```php
<?php
declare(strict_types=1);

use Berbeflo\ModifyDump\Attribute\Dump;
use Berbeflo\ModifyDump\Trait\ModifiedDump;

require_once(__DIR__ . '/../vendor/autoload.php');

class Test
{
    use ModifiedDump;

    #[Dump]
    private string $a = "test";
    protected int $b;
    #[Dump]
    public int | string $c = 5;
    private $d;
    #[Dump]
    protected int | string $e;
}

var_dump(new Test());
/*
object(Test)#3 (3) {
  ["a"]=>
  string(4) "test"
  ["c"]=>
  int(5)
  ["e"]=>
  object(Berbeflo\ModifyDump\Formatter\Uninitialized)#7 (0) {
  }
}
*/
```