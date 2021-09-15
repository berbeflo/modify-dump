<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Statistic;

use ReflectionProperty;

interface Statistic
{
    public function createStatistic(ReflectionProperty $property, object $context): mixed;
}
