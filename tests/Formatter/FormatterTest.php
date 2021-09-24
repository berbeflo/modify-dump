<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Tests\Formatter;

use Berbeflo\ModifyDump\Formatter\Formatter;
use Berbeflo\ModifyDump\State\Uninitialized;
use PHPUnit\Framework\TestCase;
use ReflectionProperty;

class FormatterTest extends TestCase
{
    private $testValue = 5;
    private int $testUninitialized;

    public function testValue()
    {
        $formatter = new Formatter(new ReflectionProperty(__CLASS__, 'testValue'), $this);
        $this->assertSame($this->testValue, $formatter->getValue());
    }

    public function testUnitialized()
    {
        $formatter = new Formatter(new ReflectionProperty(__CLASS__, 'testUninitialized'), $this);
        $this->assertSame(Uninitialized::class, $formatter->getValue()::class);
    }

    public function testIdentifier()
    {
        $formatter = new Formatter(new ReflectionProperty(__CLASS__, 'testValue'), $this);
        $this->assertSame('testValue', $formatter->getIdentifier());
    }
}
