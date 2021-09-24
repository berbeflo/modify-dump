<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Tests\Control;

use Berbeflo\ModifyDump\Tests\Class\AddFilterClass;
use Berbeflo\ModifyDump\Tests\Class\AddStatisticClass;
use Berbeflo\ModifyDump\Tests\Class\AllButWithNoDump;
use Berbeflo\ModifyDump\Tests\Class\ChangeDefaultFormatterClass;
use Berbeflo\ModifyDump\Tests\Class\DefaultBehaviourClass;
use Berbeflo\ModifyDump\Tests\Class\NoPasswordAndNoPublicClass;
use Berbeflo\ModifyDump\Tests\Class\OnlyInitializedNonStaticPublicClass;
use PHPUnit\Framework\TestCase;

class ModifyDumpTest extends TestCase
{

    /**
     * @dataProvider behaviourProvider
     */
    public function testBehaviour(string $className, array $expectedArray)
    {
        $object = new $className();
        self::assertEquals($expectedArray, $object->__debugInfo());
    }

    public function behaviourProvider(): array
    {
        return [
            [
                DefaultBehaviourClass::class,
                ['testString' => 'output'],
            ],
            [
                ChangeDefaultFormatterClass::class,
                ['#testString' => 'output'],
            ],
            [
                AddStatisticClass::class,
                ['__statistics' => ['property-count' => 2]],
            ],
            [
                AddFilterClass::class,
                ['test' => 4, 'testString' => 'output'],
            ],
            [
                OnlyInitializedNonStaticPublicClass::class,
                ['testE' => 5],
            ],
            [
                AllButWithNoDump::class,
                ['testB' => 2],
            ],
            [
                NoPasswordAndNoPublicClass::class,
                ['username' => 'not-secret'],
            ],
        ];
    }
}
