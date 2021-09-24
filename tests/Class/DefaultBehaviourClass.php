<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Tests\Class;

use Berbeflo\ModifyDump\Attribute\Dump;
use Berbeflo\ModifyDump\Trait\ModifiedDump;

class DefaultBehaviourClass
{
    use ModifiedDump;

    private int $test = 4;
    #[Dump]
    protected string $testString = 'output';
}
