<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Filter;

use Berbeflo\ModifyDump\Control\CreateInterface;
use ReflectionProperty;

interface Filter extends CreateInterface
{
    public function isAllowed(ReflectionProperty $property, object $context): bool;
}
