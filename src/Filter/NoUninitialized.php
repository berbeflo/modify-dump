<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Filter;

use ReflectionProperty;

class NoUninitialized implements Filter
{
    public function isAllowed(ReflectionProperty $property, object $context): bool
    {
        $property->setAccessible(true);
        return $property->isInitialized($context);
    }
}
