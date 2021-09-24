<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Tests\Class;

use Berbeflo\ModifyDump\Attribute\AddStatistic;
use Berbeflo\ModifyDump\Statistic\PropertyCount;
use Berbeflo\ModifyDump\Trait\ModifiedDump;

#[AddStatistic(PropertyCount::class)]
class AddStatisticClass
{
    use ModifiedDump;

    private int $test = 4;
    protected string $testString = 'output';
}
