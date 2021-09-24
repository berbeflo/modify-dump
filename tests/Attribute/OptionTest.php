<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Tests\Attribute;

use Berbeflo\ModifyDump\Attribute\Option;
use PHPUnit\Framework\TestCase;

class OptionTest extends TestCase
{
    public function testIdentifier()
    {
        $identifier = 'test';
        $value = 5;
        $option = new Option($identifier, $value);
        self::assertSame($option->getIdentifier(), $identifier);
    }

    public function testValue()
    {
        $identifier = 'test';
        $value = 5;
        $option = new Option($identifier, $value);
        self::assertSame($option->getValue(), $value);
    }
}
