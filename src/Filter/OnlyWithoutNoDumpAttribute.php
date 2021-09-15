<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Filter;

use ReflectionProperty;
use Berbeflo\ModifyDump\Attribute\NoDump;

class OnlyWithoutNoDumpAttribute implements Filter
{
    public function isAllowed(ReflectionProperty $property, object $context): bool
    {
        return count($property->getAttributes(NoDump::class)) === 0;
    }
}
