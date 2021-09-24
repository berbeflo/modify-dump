<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Tests\Attribute;

use Berbeflo\ModifyDump\Attribute\AddFilter;
use Berbeflo\ModifyDump\Filter\NoPublic;
use DateTime;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class AddFilterTest extends TestCase
{
    public function testExceptionThrownOnInvalidClass()
    {
        $this->expectException(InvalidArgumentException::class);
        $addFilter = new AddFilter(DateTime::class);
        $addFilter->createFilter();
    }

    public function testCorrectClassProvided()
    {
        $addFilter = new AddFilter(NoPublic::class);
        self::assertSame(NoPublic::class, $addFilter->createFilter()::class);
    }
}
