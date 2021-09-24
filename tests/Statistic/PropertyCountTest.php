<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Tests\Statistic;

use Berbeflo\ModifyDump\Statistic\PropertyCount;
use Berbeflo\ModifyDump\Tests\Class\PropertyCountClass;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class PropertyCountTest extends TestCase
{
    public function testIdentifier()
    {
        $propertyCount = PropertyCount::create();
        self::assertSame('property-count', $propertyCount->getStatisticIdentifier());
    }

    public function testCount()
    {
        $countedClass = new PropertyCountClass();
        $propertyCount = PropertyCount::create();
        self::assertSame(3, $propertyCount->createStatistic(new ReflectionClass($countedClass), $countedClass));
    }
}
