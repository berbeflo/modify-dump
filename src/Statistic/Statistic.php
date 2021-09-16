<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Statistic;

use ReflectionClass;

interface Statistic
{
    public function createStatistic(ReflectionClass $class, object $context): mixed;
    public function getStatisticIdentifier(): string;
}
