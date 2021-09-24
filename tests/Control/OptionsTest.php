<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Tests\Control;

use Berbeflo\ModifyDump\Control\Options;
use Berbeflo\ModifyDump\Formatter\AccessModifierFormatter;
use Berbeflo\ModifyDump\Formatter\Formatter;
use DateTime;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class OptionsTest extends TestCase
{
    public function testExceptionThrownOnInvalidClass()
    {
        $this->expectException(InvalidArgumentException::class);
        $options = new Options();
        $options->setDefaultFormatter(DateTime::class);
    }

    public function testDefaultFormatter()
    {
        $options = new Options();
        self::assertSame(Formatter::class, $options->getDefaultFormatter());
    }

    public function testSetDefaultFormatter()
    {
        $options = new Options();
        $options->setDefaultFormatter(AccessModifierFormatter::class);
        self::assertSame(AccessModifierFormatter::class, $options->getDefaultFormatter());
    }
}
