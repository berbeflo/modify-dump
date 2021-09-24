<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Statistic;

use Berbeflo\ModifyDump\Control\DefaultCreateMethod;
use ReflectionClass;

class PropertyCount implements Statistic
{
    use DefaultCreateMethod;

    public function createStatistic(ReflectionClass $class, object $context): mixed
    {
        return count($class->getProperties());
    }

    public function getStatisticIdentifier(): string
    {
        return 'property-count';
    }
}
