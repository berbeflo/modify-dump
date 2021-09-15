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
- Add support for class statistics

## Usage
### Installation
`composer require berbeflo/modify-dump`
### Example
```php
<?php
declare(strict_types=1);

use Berbeflo\ModifyDump\Attribute\Dump;
use Berbeflo\ModifyDump\Attribute\Option;
use Berbeflo\ModifyDump\Filter\NoPrivate;
use Berbeflo\ModifyDump\Trait\ModifiedDump;
use Berbeflo\ModifyDump\Attribute\AddFilter;
use Berbeflo\ModifyDump\Filter\OnlyWithDumpAttribute;
use Berbeflo\ModifyDump\Formatter\Formatter;
use Berbeflo\ModifyDump\Formatter\AccessModifierFormatter;

require_once('vendor/autoload.php');

#[Option('default-formatter', AccessModifierFormatter::class)]
#[AddFilter(NoPrivate::class)]
#[AddFilter(OnlyWithDumpAttribute::class)]
class Test
{
    use ModifiedDump;

    #[Dump]
    private string $a = "test";
    protected int $b;
    #[Dump]
    public int | string $c = 5;
    #[Dump(Formatter::class)]
    private static $d;
    #[Dump(Formatter::class)]
    protected int | string $e;
}

var_dump(new Test());
/*
object(Test)#3 (2) {
  ["+c"]=>
  int(5)
  ["e"]=>
  object(Berbeflo\ModifyDump\State\Uninitialized)#6 (0) {
  }
}
*/
```
