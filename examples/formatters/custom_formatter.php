<?php

declare(strict_types=1);

use Berbeflo\ModifyDump\Attribute\Dump;
use Berbeflo\ModifyDump\Formatter\Formatter;
use Berbeflo\ModifyDump\Trait\ModifiedDump;

require_once(__DIR__ . '/../../vendor/autoload.php');

class ShowNameAsValue extends Formatter
{
    public function getValue(): mixed
    {
        return $this->property->getName();
    }
}

class Test
{
    use ModifiedDump;

    #[Dump(ShowNameAsValue::class)]
    private $a = 1;
}

var_dump(new Test());
