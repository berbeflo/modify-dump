<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Filter;

use Berbeflo\ModifyDump\Control\DefaultCreateMethod;
use ReflectionProperty;

class NoUninitialized implements Filter
{
    use DefaultCreateMethod;

    public function isAllowed(ReflectionProperty $property, object $context): bool
    {
        $property->setAccessible(true);
        return $property->isInitialized($context);
    }
}
