<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Filter;

use ReflectionProperty;

class NoProtected implements Filter
{
    public function isAllowed(ReflectionProperty $property, object $context) : bool
    {
        return !$property->isProtected();
    }
}
