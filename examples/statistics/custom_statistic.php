<?php

declare(strict_types=1);

use Berbeflo\ModifyDump\Attribute\AddStatistic;
use Berbeflo\ModifyDump\Statistic\Statistic;
use Berbeflo\ModifyDump\Trait\ModifiedDump;

require_once(__DIR__ . '/../../vendor/autoload.php');

class PrivatePropertyCount implements Statistic
{
    public function createStatistic(ReflectionClass $class, object $context): mixed
    {
        return count($class->getProperties(ReflectionProperty::IS_PRIVATE));
    }

    public function getStatisticIdentifier(): string
    {
        return 'private-property-count';
    }
}

#[AddStatistic(PrivatePropertyCount::class)]
class Test
{
    use ModifiedDump;

    private $a = 1;
    protected $b = 2;
    private $c = 3;
}

var_dump(new Test());
