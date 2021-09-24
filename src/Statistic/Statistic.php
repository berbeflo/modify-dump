<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Statistic;

use Berbeflo\ModifyDump\Control\CreateInterface;
use ReflectionClass;

interface Statistic extends CreateInterface
{
    public function createStatistic(ReflectionClass $class, object $context): mixed;
    public function getStatisticIdentifier(): string;
}
