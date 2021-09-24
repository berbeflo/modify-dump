<?php

declare(strict_types=1);

use Berbeflo\ModifyDump\Attribute\AddFilter;
use Berbeflo\ModifyDump\Control\DefaultCreateMethod;
use Berbeflo\ModifyDump\Filter\Filter;
use Berbeflo\ModifyDump\Trait\ModifiedDump;

require_once(__DIR__ . '/../../vendor/autoload.php');

class OnlyUninitialized implements Filter
{
    use DefaultCreateMethod;

    public function isAllowed(ReflectionProperty $property, object $context): bool
    {
        $property->setAccessible(true);
        return !$property->isInitialized($context);
    }
}

#[AddFilter(OnlyUninitialized::class)]
class Test
{
    use ModifiedDump;

    private $a = 1;
    private $b;
    private int $c;
}

var_dump(new Test());
