<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Statistic;

use ReflectionClass;

class PropertyCount implements Statistic
{
    public function createStatistic(ReflectionClass $class, object $context): mixed
    {
        return count($class->getProperties());
    }

    public function getStatisticIdentifier(): string
    {
        return 'property-count';
    }
}
