<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Filter;

use Berbeflo\ModifyDump\Control\DefaultCreateMethod;
use ReflectionProperty;

class NoPassword implements Filter
{
    use DefaultCreateMethod;

    public function isAllowed(ReflectionProperty $property, object $context): bool
    {
        $name = strtolower(str_replace(['-', '_'], ['', ''], $property->getName()));

        return !in_array($name, [
            'password',
            'pw',
            'pass',
        ]);
    }
}
