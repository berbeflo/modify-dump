<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Tests\Formatter;

use Berbeflo\ModifyDump\Formatter\AccessModifierFormatter;
use PHPUnit\Framework\TestCase;
use ReflectionProperty;

class AccessModifierFormatterTest extends TestCase
{
    private $testPrivate;
    protected $testProtected;
    public $testPublic;
    private static $testStaticPrivate;
    protected static $testStaticProtected;
    public static $testStaticPublic;

    /**
     * @dataProvider modifierProvider
     */
    public function testIdentifier(string $property, string $modifier)
    {
        $formatter = new AccessModifierFormatter(new ReflectionProperty(__CLASS__, $property), $this);
        $this->assertSame($modifier . $property, $formatter->getIdentifier());
    }

    public function modifierProvider(): array
    {
        return [
            ['testPrivate', '-'],
            ['testProtected', '#'],
            ['testPublic', '+'],
            ['testStaticPrivate', '-'],
            ['testStaticProtected', '#'],
            ['testStaticPublic', '+'],
        ];
    }
}
