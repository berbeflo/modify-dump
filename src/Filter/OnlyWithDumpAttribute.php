<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Filter;

use ReflectionProperty;
use Berbeflo\ModifyDump\Attribute\Dump;
use Berbeflo\ModifyDump\Control\DefaultCreateMethod;

class OnlyWithDumpAttribute implements Filter
{
    use DefaultCreateMethod;

    public function isAllowed(ReflectionProperty $property, object $context): bool
    {
        return count($property->getAttributes(Dump::class)) > 0;
    }
}
