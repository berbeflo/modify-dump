<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Filter;

use ReflectionProperty;
use Berbeflo\ModifyDump\Attribute\Dump;

class OnlyWithDumpAttribute implements Filter
{
    public function isAllowed(ReflectionProperty $property, object $context) : bool
    {
        return count($property->getAttributes(Dump::class)) > 0;
    }
}
