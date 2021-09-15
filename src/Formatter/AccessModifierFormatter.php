<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Formatter;

use ReflectionProperty;

class AccessModifierFormatter extends Formatter
{
    public function getIdentifier() : string
    {
        $modifier = match ($this->property->getModifiers() & ~ReflectionProperty::IS_STATIC) {
            ReflectionProperty::IS_PUBLIC => '+',
            ReflectionProperty::IS_PROTECTED => '#',
            ReflectionProperty::IS_PRIVATE => '-',
        };
        return $modifier . $this->property->getName();
    }
}
