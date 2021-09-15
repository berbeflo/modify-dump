<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Filter;

use ReflectionProperty;

interface Filter
{
    public function isAllowed(ReflectionProperty $property, object $context) : bool;
}
