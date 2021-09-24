<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Tests\Attribute;

use Berbeflo\ModifyDump\Attribute\AddStatistic;
use Berbeflo\ModifyDump\Statistic\PropertyCount;
use DateTime;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class AddStatisticTest extends TestCase
{
    public function testExceptionThrownOnInvalidClass()
    {
        $this->expectException(InvalidArgumentException::class);
        $addStatistic = new AddStatistic(DateTime::class);
        $addStatistic->createStatisicObject();
    }

    public function testCorrectClassProvided()
    {
        $addStatistic = new AddStatistic(PropertyCount::class);
        self::assertSame(PropertyCount::class, $addStatistic->createStatisicObject()::class);
    }
}
