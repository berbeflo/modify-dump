<?php

declare(strict_types=1);

use Berbeflo\ModifyDump\Attribute\AddStatistic;
use Berbeflo\ModifyDump\Statistic\PropertyCount;
use Berbeflo\ModifyDump\Trait\ModifiedDump;

require_once(__DIR__ . '/../../vendor/autoload.php');

#[AddStatistic(PropertyCount::class)]
class Test
{
    use ModifiedDump;

    private $a = 1;
    private $b = 2;
    private $c = 3;
}

var_dump(new Test());
