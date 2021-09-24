<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Tests\Attribute;

use Berbeflo\ModifyDump\Attribute\Dump;
use Berbeflo\ModifyDump\Control\Options;
use Berbeflo\ModifyDump\Formatter\AccessModifierFormatter;
use Berbeflo\ModifyDump\Formatter\Formatter;
use DateTime;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionProperty;

class DumpTest extends TestCase
{
    private $test = 2;
    public function testExceptionThrownOnInvalidClass()
    {
        $this->expectException(InvalidArgumentException::class);
        $dump = new Dump(DateTime::class);
        $dump->createFormatter(new Options(), new ReflectionProperty(__CLASS__, 'test'), $this);
    }

    public function testCorrectClassProvided()
    {
        $dump = new Dump(AccessModifierFormatter::class);
        $dumpObject = $dump->createFormatter(new Options(), new ReflectionProperty(__CLASS__, 'test'), $this);
        self::assertSame(AccessModifierFormatter::class, $dumpObject::class);
    }

    public function testDefaultFormatter()
    {
        $dump = new Dump();
        $dumpObject = $dump->createFormatter(new Options(), new ReflectionProperty(__CLASS__, 'test'), $this);
        self::assertSame(Formatter::class, $dumpObject::class);
    }

    public function testDefaultFormatterOverwrite()
    {
        $dump = new Dump();
        $options = new Options();
        $options->setDefaultFormatter(AccessModifierFormatter::class);
        $dumpObject = $dump->createFormatter($options, new ReflectionProperty(__CLASS__, 'test'), $this);
        self::assertSame(AccessModifierFormatter::class, $dumpObject::class);
    }
}
